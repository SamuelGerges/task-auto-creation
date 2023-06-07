<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>
## Quick Installation

    git clone git@github.com:SamuelGerges/task-auto-creation.git
    cd SD_Project/

### Composer

    composer install
    composer update

### For Environment Variable Create

    cp .env.example .env

### create database

### For Migration table in database

    php artisan migrate
    php artisan db:seed

### Server ON ```url: http://127.0.0.1:8000/```

    php artisan serve
    url localhost:8000/login  for login 
    url localhost:8000/register  for register

### Usage Package

    Sanctum Package for api

### Usage Skills  in Blog Project

    Repositry Design Pattern .
    Service Container .

### About Task

you can 
user can make a register and login by email and password .

Login Form : the Scenario will be as follows
- if user tries to enter his password 3 times wrong, an error message should say try again after 30 sec.
- if he tries again with a correct password for sure pass him, otherwise, the account should be blocked.
- A user cannot be logged in on more than two devices at the same time, so he cannot log in on a third device.
- after login, homepage is existed list from users
- 
