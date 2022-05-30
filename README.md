# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/9.x/#installation)

Clone the repository

    git clone git@github.com:PZ-webdev/rent-cars.git

Switch to the repo folder

    cd rent-cars

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Run the database migrations (**Set the database connection in .env before migrating**)

    php artisan migrate

Run the database seeder and you're done.

    php artisan db:seed

Start the local development server.

    php artisan serve

You can now access the server at http://localhost:8000.
