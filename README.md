# jpit2

A project for JPIT2 at school.

### Details

- Spec [here](https://docs.google.com/spreadsheets/d/1zKF-ncEAsqOzxUUS-hna7WYB2SYGaonA3xstNhMjMds/edit?usp=sharing)

### Develop

- Project structure: `app`, `assets`, root files
- `app`: stores all the php folders/files
- `css`, `js`: stores bootstrap and a custom css file, add any custom style in `css/styles.css`
- `assets`: stores 'built-in' images, audio files
- `.env`: stores private keys, don't add to git, ask the lead dev for it
- `index.php`: used for the run command, should be the starting point of the app, pointing to the main page
- `db.sql`: contains all the tables to recreate somewhere else

### Running the project

- This project is currently not deployed (localhost)
- Use `php -S localhost:8000` (or different port) in the Terminal inside the project root
