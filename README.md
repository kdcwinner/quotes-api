# Quotes-api
This repository is used to get quotes.
In this project there is a quotes table and all api quotes stores in that table. 

# Create an application with a composer

composer create-project laravel/laravel conveyancer-quote-project

# To install laravel dependancy use below command

composer install


# Rename .env-example file to .env

# Set up your database setting in .env file

DB_DATABASE=<database_name>

DB_USERNAME=<database_username>

DB_PASSWORD=<database_password>

# To migrate database use below command

php artisan migrate

# To start server use below command

php artisan serve

# To create dummy users for testing use below

http://localhost:8000/create-dummy-users

# How to test quotes functionality

Open postman and use below instructions

http://localhost:8000/api/login

send keys email and password as request, take email from users table and password as 123456

as a response you will get access_token

now open new tab of postman 

http://localhost:8000/api/qoutes

send request params 

access_token key and access_token which got response from login api

select Headers as Authorization and add value as access_token got from login api

as a response you will get 5 different quotes, you can check it in the quotes database table.

# To Testing code use below command

php artisan test





