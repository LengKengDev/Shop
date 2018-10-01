# Web Shop | PHP Web Application

# Installation

* Framework: Laravel 5.6

## System required
- CentOS 7
- Apache 2.4.x
- PHP
    - Version: >= 7.2
    - OpenSSL PHP Extension
    - PDO PHP Extension
    - Mbstring PHP Extension
    - Tokenizer PHP Extension
    - XML PHP Extension
    - Mysqlnd Driver
- Mysql 5.7
- NodeJS
    - Version: >= 8.0.0
    - Yarn global package
- Composer 1.6.x
- Imagemagick 6.9.x

## Setup environment

### NodeJS

* NVM 

```bash
$ curl -o- https://raw.githubusercontent.com/creationix/nvm/v0.33.8/install.sh | bash
$ nvm --version
```
* NodeJS

```bash
$ nvm install 8.0.0
$ node -v
```
    
* Yarn

```bash
$ npm install -g yarn
$ yarn --version
```
    
### Composer

```bash
$ sudo curl -sS https://getcomposer.org/installer | php
$ mv composer.phar /usr/local/bin/composer
$ composer -version
```

### Imagemagick

```bash
$ sudo yum install ImageMagick ImageMagick-devel
$ convert -version
```
    
## Project Guide

### Install

```bash
$ git clone https://github.com/LengKengDev/Shop.git
$ cd web
$ composer install
$ yarn
$ npm run dev
$ cp .env.excample .env
$ chown apache:apache storage
$ cd public && ln -s ../storage/app/storage storage
```
* Configure apache server to be the correct `public` folder of the project

### Run

* Configure the correct `.env` file: database, mail, debug ..

```bash
$ php artisan migrate
$ php artisan db:seed
```

## Contributors

* Le Vinh Thien | [levinhthien.bka@gmail.com](levinhthien.bka@gmail.com), [thienlv1@runsustem.net](thienlv1@runsustem.net)

## License

The MIT License (MIT). Please see [License File](./LICENSE) for more information.

## Copyright © 2018 LengKengDev. All rights reserved.
