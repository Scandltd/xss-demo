# XSS Demo Site

**Author**: Ilya Navitsky, Scand Ltd., Minsk 2020

## Description

This is a simple site for demonstrating basics of [Cross-Site Scripting (XSS)](https://owasp.org/www-community/attacks/xss/) attacks. Allows to perform [stored](https://owasp.org/www-community/attacks/xss/#stored-xss-attacks), [reflected](https://owasp.org/www-community/attacks/xss/#reflected-xss-attacks) and [DOM-based](https://owasp.org/www-community/attacks/DOM_Based_XSS) XSS attacks and theirs combinations.

Made on PHP micro-framework [Lumen](https://lumen.laravel.com/).

## Server Requirements

- [PHP](https://www.php.net/) 7.2 or above
  - OpenSSL PHP Extension
  - PDO PHP Extension
  - Mbstring PHP Extension
- [Composer](https://getcomposer.org/)
- A database:
  - MySQL
  - Postgres
  - SQLite
  - SQL Server

## Installation and configuration

1. Install dependencies via composer:  
`composer install`
2. Copy `.env.sample` file to `.env` and configure it (see [Lumen Configuration Documentation](https://lumen.laravel.com/docs/7.x/configuration) for details).
3. Run migrations:  
`php artisan migrate`
4. (optional) Import sample data from the file `database/samples/comments.csv` into `comment` table.
5. The simplest way to run app is to run built-in PHP development server:  
`php -S localhost:8000 -t public`