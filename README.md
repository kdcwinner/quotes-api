# quotes-api
This repository is used to get quotes. 

# Create an application with a composer

composer create-project laravel/laravel conveyancer-quote-project

# To install laravel dependancy use below command

composer install


# rename .env-example file to .env

# Set up your database setting in .env file

DB_DATABASE=<database_name>

DB_USERNAME=<database_username>

DB_PASSWORD=<database_password>

# To migrate database use below command

php artisan migrate

# To start serve use below command

php artisan serve

# To create dummy users for testing use below

http://localhost:8000/create-dummy-users