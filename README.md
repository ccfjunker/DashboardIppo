# DashboardIppo

This repo is compatible with php 7

Install dependencies:

```
apt install php phpunit php-gd php-zip mariadb-server php-mysql
```

Install composer:

```
curl -sS https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer
sudo chmod +x /usr/local/bin/composer
```

Install php packages

```
composer update
```

Configure Database

```
sudo systemctl enable mariadb
sudo systemctl start mariadb

mysql # replace user, passwrd and permissions below to adjust your needs
> CREATE USER 'user'@'localhost' IDENTIFIED BY 'password';
> GRANT ALL ON *.* TO 'user'@'localhost' WITH GRANT OPTION;
> quit;

cp .env.example .env
vim .env # configure DB connection
php artisan migrate
```

Generate key

```
php artisan key:generate
```

Launch server

```
php artisan serve --host=0.0.0.0 --port=8080
```
