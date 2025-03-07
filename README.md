# Setup 

Clone the repo 

# Backend setup
Run `composer install` will install dependancies 

Run `cp .env.example .env` at backend root

Run `php artisan key:generate` to set the application key



## DB local or docker 

For local Make sure you have a mysql database setup locally and that the connection is correct in the env file
Run `php artisan migrate --seed`

For docker you can do the following with laravel sail 

Run `php artisan sail:install` and select mysql as the install 

Note: `sail` is an alias for `./vendor/bin/sail`

Run `sail art migrate --seed`



## Running the application

To get the application running you can use `composer run dev` for local installs 

## OR

Run `./vendor/bin/sail up -d` which will start the service and will ship with the database preconfigured



# Frontend setup

Run `npm install`

Make a new .env file with the contents from .env.example

Set your backend url

To serve the application run `npm run dev` 
