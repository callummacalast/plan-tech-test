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


# Brief overview 

This project is built with Laravel and React.

Backend architecture makes use of design patterns to ensure scaleable code. I make use of DTOs to transfer data around the backend application from the entry point of a request to the presentation of the data. I have filtered the videos based on the live flag and then de duplicated the data based on the title, author and video url. 

Frontend has been built roughly following the atomic design approach, you could argue it’s slightly overkill for this project, but it promotes the reusable nature of the components. This project houses a simple fetcher helper which can be used to make fetch requests. The project utilises eslint rules to reduce developer mistakes and typed correctness. 

All methods in the application use GET, there didn’t seem to be the need to add the ability to POST, the search functionality could have accepted a POST request, but as it is only a string and no data insertion was happening it seemed suffice.



