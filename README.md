# PHP TODOLIST MySQL

A personal learning repository containing case study examples of To-Do List applications with PHP Object-Oriented Programming and MySQL.

## Course Reference

- Platform: [Udemy](https://www.udemy.com/)
- Course: [Pemrograman PHP : Pemula sampai Mahir](https://www.udemy.com/share/103VNo3@SX3XE5s-vl3yh7cNf7wvdnK4D9trHFV5j-CvHRO9x3vTf6avFmakZH5br4GVmiYw1Q==/) - Section 7: Studi Kasus PHP MySQL - Aplikasi Todolist
- Instructor: [Programmer Zaman Now](https://www.udemy.com/user/eko-kurniawan/)
- Certificate of Completion: [Certificate](https://www.udemy.com/certificate/UC-05fcc852-ed04-4ddf-865a-89ac182cded3/)

## Requirements

- PHP CLI (not required when using Docker)
- MySQL (not required when using Docker)
- Docker (optional)
- Database Client (e.g. MySQL Workbench, HeidiSQL, Navicat Lite, etc.)

## Usage

- **Manual Setup**
    1. Start the MySQL server and open your database client.
    2. Create a new database (e.g. `belajar_php`).
    3. Execute the SQL files at `database/migrations/` to create the database tables.
    4. Configure the MySQL connection parameters (`$database`, `$username`, and `$password`) in `Config/Database.php`:

        ```php
        public static function getConnection(): PDO
        {
            $host = 'db';
            $port = '3306';
            $database = 'belajar_php';
            $username = '<username>';
            $password = '<yourpassword>';

            return new PDO("mysql:host=$host:$port;dbname=$database", $username, $password);
        }
        ```

    5. Run the application from the project directory:

        ```bash
         php App.php
        ```

- **Using Docker**
    1. Start the Docker containers from the project directory:

        ```bash
        docker compose up -d
        ```

    2. Open your database client and connect to the MySQL container using the following credentials (password is empty):

        ```bash
        Host: 127.0.0.1
        Port: 3306
        Username: root
        Password:
        ```

    3. Create a new database (e.g. `belajar_php`)
    4. Execute the SQL files at `database/migrations/` to create the database tables
    5. Open a terminal inside the web container:

        ```bash
        docker compose exec web bash
        ```

    6. Run the application:

        ```bash
        php App.php
        ```
