<?php
include 'globals.php';

class DatabaseManager {
  private static DatabaseManager|null $instance = null;
  private PDO $conn;
  private $host = 'jpit-billgd-aiven.h.aivencloud.com';
  private $database_name = 'jpit';
  private $port = '13387';
  private array $allowed_query_types = ['SELECT', 'INSERT', 'UPDATE', 'DELETE', 'CALL', 'ALTER'];

  private function __construct() {
    if (empty(Globals::$aiven_username)) {
      Globals::init();
    }

    if (self::$instance != null) {
      throw new Exception("DatabaseManager instance already exists");
    }

    $aiven_username = Globals::$aiven_username;
    $aiven_password = Globals::$aiven_password;

    $uri = "mysql://{$aiven_username}:{$aiven_password}@{$this->host}:{$this->port}/{$this->database_name}?ssl-mode=REQUIRED";
    $fields = parse_url($uri);

    // build the DSN including SSL settings
    $conn_string = "mysql:";
    $conn_string .= "host=" . $fields["host"];
    $conn_string .= ";port=" . $fields["port"];
    $conn_string .= ";dbname={$this->database_name}";
    $conn_string .= ";sslmode=verify-ca;sslrootcert=ca.pem";

    $this->conn = new PDO($conn_string, $fields["user"], $fields["pass"]);
  }

  static function instance() {
    if (!self::$instance) {
      self::$instance = new DatabaseManager();
    }
    return self::$instance;
  }

  // https://www.php.net/manual/en/function.mysql-real-escape-string.php#101248
  static function mysql_escape(string|array $in): string|array {
    if (is_array($in)) {
      return array_map(__METHOD__, $in);
    }

    if (!empty($in) && is_string($in)) {
      return str_replace(
        search: ['\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'],
        replace: ['\\', "\0", "\n", "\r", "'", '"', "\x1a"],
        subject: $in,
      );
    }
    return $in;
  }

  function get_version(): string {
    return $this->conn->query("SELECT version()")->fetch()[0];
  }

  function get_last_id(): int {
    return $this->conn->lastInsertId();
  }

  /**
   * Wraps the PDO query calls in a single function.
   * @param string $query_string The query string to execute, can use `:param_name` for named parameters (requires param list), or plain query string (empty param list).
   * @param array $params The parameters to bind to the query string, `'param_name' => 'param_value'`.
   */
  function query(string $query_string, array $param_map = []): PDOStatement {
    if (!$this->starts_with(
      str: $query_string,
      search_strings: $this->allowed_query_types,
      case_sensitive: false,
    )) {
      throw new Exception("Invalid query string, must start with " . implode(", ", $this->allowed_query_types));
    }

    // filter all token starts with `:`
    $named_params = array_filter(
      preg_split("/[\s\(,]/", $query_string),
      fn($token) => str_starts_with($token, ':'),
    );

    $named_params_count = count($named_params);
    if ($named_params_count === 0) {
      $param_map = [];
    }
    $provided_params_count = count($param_map);

    if ($named_params_count !== $provided_params_count) {
      throw new Exception(
        "Named parameters count does not match provided parameters count.<br>
        Query: {$query_string}<br>
        Named parameters ({$named_params_count}): " . implode('|', $named_params) . "<br>
        Provided parameters ({$provided_params_count}): " . implode('|', array_keys($param_map)) . "<br>"
      );
    }

    $stmt = $this->conn->prepare($query_string);
    $stmt->execute($param_map);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    return $stmt;
  }

  private function starts_with(string $str, array $search_strings, bool $case_sensitive = true): bool {
    if (!$case_sensitive) {
      $str = strtolower($str);
      $search_strings = array_map(fn($s) => strtolower($s), $search_strings);
    }
    foreach ($search_strings as $search_string) {
      if (str_starts_with($str, $search_string)) {
        return true;
      }
    }
    return false;
  }
}