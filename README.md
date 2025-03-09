# Webzen Secure Login Portal

## Server Requirements

PHP version 8.1 or higher is required, with the following extensions installed:

- [intl](http://php.net/manual/en/intl.requirements.php)
- [mbstring](http://php.net/manual/en/mbstring.installation.php)

> [!WARNING]
> - The end of life date for PHP 7.4 was November 28, 2022.
> - The end of life date for PHP 8.0 was November 26, 2023.
> - If you are still using PHP 7.4 or 8.0, you should upgrade immediately.
> - The end of life date for PHP 8.1 will be December 31, 2025.

Additionally, make sure that the following extensions are enabled in your PHP:

- json (enabled by default - don't turn it off)
- [mysqlnd](http://php.net/manual/en/mysqlnd.install.php) if you plan to use MySQL
- [libcurl](http://php.net/manual/en/curl.requirements.php) if you plan to use the HTTP\CURLRequest library


## Database Setup and Configuration

*Run the following SQL script to setup and configure the database. Database server must run on the port number 3306.*
*If it is needed to change these configurations, edit the .env file in the root folder.*

```sql
create database if not exists spiritx character set = 'utf8mb4' collate = 'utf8mb4_general_ci';

grant all privileges on spiritx.* to 'dbuser'@'%' identified by password '*B0155F6F58E532260B9D1FEA278B5872D90431EE';

use spiritx;
```

*Then run the following command inside the root directory.*

```sh
php spark migrate
```

## Run the server

*Issue the following command inside the root directory.*

```sh
php spark serve
```