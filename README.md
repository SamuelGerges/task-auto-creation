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

### video Of task 
    https://youtu.be/5_9GCw9B96U

### postman 
    Auto Creations.postman_collection.json

### Usage Skills  in Blog Project

    Repositry Design Pattern .
    Service Container .

### About Task

user can make a register and login by email and password .

features : 
- if user tries to enter his password 3 times wrong, an error message should say try again after 30 sec.
- if he tries again with a correct password for sure pass him, otherwise, the account should be blocked.
- if user is blocked , then try to access of homepage ,the system will be rejects it.
- A user cannot be logged in on more than two devices at the same time, so he cannot log in on a third device.
- after login, homepage is existed list from users
- list of user that registered in the system .

End points of Api 
- user can register.
- user can login .
- user can logout
- user can arrive in home page
- admin can change the status of the user if it was blocked or no.

