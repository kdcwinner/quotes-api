# quotes-api
This repository is used to get quotes. 

Create an application with a composer

composer create-project laravel/laravel conveyancer-quote-project

Set up your database setting in .env file


# To install laravel dependancy use below command

composer install

# To authorization functionality use below commands

composer require laravel/ui

php artisan ui vue --auth

npm install 

npm run dev


# To create access_tokens table use the below command

php artisan make:migration create_access_tokens_table

#In the database/migrations/create_access_tokens_table.php

	public function up()
    {
        Schema::create('access_tokens', function (Blueprint $table) {
            $table->id();
            $table->string('access_token');
            $table->unsignedInteger('user_id');
            $table->timestamps();
        });
    }


php artisan make:model AccessToken

#In the app/Models/AccessToken.php

protected $table = 'access_tokens';

protected $fillable = ['access_token', 'user_id'];


#In the database/migrations/create_quotes_table.php

	public function up()
    {
        Schema::create('quotes', function (Blueprint $table) {
            $table->id();
            $table->string('quotes');
            $table->timestamps();
        });
    }

# To migrate database use below command

php artisan migrate