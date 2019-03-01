## About Mechanic

Mechanic is a web application based on PHP and Laravel framework and it's most suitable for mechanic workshops to automate the booking procedure and keep evidence of all repaired cars.

## Features

* Create or edit existing pages
* Login/Register
* Booking system
* Car panel with service history

## Server requirements


* PHP >= 7.1.3
* Composer
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension
* Ctype PHP Extension
* JSON PHP Extension
* BCMath PHP Extension

## Installation instructions

- Clone Mechanic git project to your local folder

        git clone http://git.quantox.tech/miomir.pesic/mechanic.git  *folder/name*

- Run composer install

        composer install

- Make .env file from .env.example
- Generate laravel application key
        
        php artisan key:generate
        
- Run database migration and seeds

        php artisan migrate --seed

- Your application is deployed and you are good to go.
