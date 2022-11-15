# Coding test
## Installation
- Clone the repo
  ```
  $ git clone https://github.com/yasirmusthafapp/emirates.git directory-name
  ```
- change directory
  ```
  $ cd directory-name
  ```
- Run composer install (install composer beforehand)
  ```
  $ composer install
  ```
- Copy sample `env` file and change configuration according to your need in ".env" file and create Database
  ```
  $ cp .env.example .env
  ```
- Generate appliction key
  ```
  $ php artisan key:generate
  ```
- Create database tables 
  ```
  $ php artisan migrate
  ```
- Start development server
  ```
  $ php artisan serve
  ```
- Run in the browser: [http://localhost:8000](http://localhost:8000)
