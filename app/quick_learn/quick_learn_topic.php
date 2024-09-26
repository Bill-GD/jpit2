<?php
include '../helpers/helper.php';
include '../helpers/ui.php';
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <?= Helper::import_styles() ?>
    <title>Dropdown Menu Example</title>
  </head>
  <body class="quick_learn_detail">
    <header>
      <nav>
        <a class="nav-link" href="home.html">模擬試験</a>
        <a class="nav-link" href="about.html">個人辞書</a>
        <a class="nav-link" href="services.html">オープン辞書 専門用語</a>
        <a class="nav-link" href="contact.html">よく使われるフレーズ</a>
        <div class="user-logo" onclick="toggleDropdown(event)">
          <img src="https://example.com/user-icon.png" alt="User Logo" />
          <div class="dropdown" id="userDropdown">
            <a href="profile.html">会社概要</a>
            <a href="settings.html">設定</a>
            <a href="logout.html">ログアウト</a>
          </div>
        </div>
      </nav>
    </header>

    <main>
      <div class="search-container">
        <section class="text-bar">
          <a href="link1.html" class="text-link">一般的な言葉：車 </a>

        </section>
        <input type="text" class="search-field" placeholder="検索..." id="searchField" />
        <!-- Backend can add an event listener here to handle search queries -->
      </div>
      <section class="grid-container">
        <div class="grid-item" onclick="playSound('path/to/audio1.mp3')">
          <div class="item-details">
            <div class="item-text">
              <b>こんにちは！</b>
              <p style="margin-top: 5px;">•Xin chào!</p>
            </div>
            <div class="nghia">
              <p style="margin-top: 28px;margin-left: -1px;">•シンチャオ!</p>
            </div>
            <span class="material-icons speaker-icon">volume_up</span>
          </div>
        </div>
        <div class="grid-item" onclick="playSound('path/to/audio2.mp3')">
          <div class="item-details">
            <div class="item-text">
              <b>お元気ですか?！</b>
              <p style="margin-top: 5px;">• Bạn khỏe không?</p>
            </div>
            <div class="nghia">
              <p style="margin-top: 28px;margin-left: -1px;">•パンクエコン?</p>
            </div>
            <span class="material-icons speaker-icon">volume_up</span>
          </div>
        </div>
        <div class="grid-item" onclick="playSound('path/to/audio2.mp3')">
          <div class="item-details">
            <div class="item-text">
              <b>どこから来ましたか?</b>
              <p style="margin-top: 5px;">• Bạn đến từ đâu??</p>
            </div>
            <div class="nghia">
              <p style="margin-top: 28px;margin-left: -1px;">•バンデントゥダ?</p>
            </div>
            <span class="material-icons speaker-icon">volume_up</span>
          </div>
        </div>
        <div class="grid-item" onclick="playSound('path/to/audio2.mp3')">
          <div class="item-details">
            <div class="item-text">
              <b>私は日本から来ました。</b>
              <p style="margin-top: 5px;">• Tôi đến từ Nhật Bản</p>
            </div>
            <div class="nghia">
              <p style="margin-top: 28px;margin-left: -1px;">•トイデントゥニャットパン</p>
            </div>
            <span class="material-icons speaker-icon">volume_up</span>
          </div>
        </div>
        <div class="grid-item" onclick="playSound('path/to/audio2.mp3')">
          <div class="item-details">
            <div class="item-text">
              <b>もありがとう!</b>
              <p style="margin-top: 5px;">• Cảm ơn!</p>
            </div>
            <div class="nghia">
              <p style="margin-top: 28px;margin-left: -1px;">•カームオン!</p>
            </div>
            <span class="material-icons speaker-icon">volume_up</span>
          </div>
        </div>
      </section>
      <div class="scroll-buttons">
        <button class="scroll-arrow left-arrow" onclick="scrollLeft()">
          &#9664; <!-- Left arrow -->
        </button>
        <button class="scroll-arrow right-arrow" onclick="scrollRight()">
          &#9654; <!-- Right arrow -->
        </button>
      </div>
      <audio id="audioPlayer" src=""></audio>
    </main>

    <script src="script.js"></script>
  </body>
</html>