# laravelmovietest

To sign in as an Administrator the email is "adminmail@gmail.com"

The Password "secretkey"

To sign in as regular user the email is "usermail@gmail.com"

The Password is "secretkey"


# Please read and do before you even run the code


Please ensure Php7.1 is install this is Laravel 5.5 and only supports Php7 and above


To start the Project you need to first add the database variables first

This will be DB_DATABASE= DB_USERNAME= DB_PASSWORD= in the .env file of this project repository.

DB_DATABASE=WhateverNameYouChose

DB_USERNAME=YourLocalSequelServerName preference Mysql

DB_PASSWORD=WhatEverPasswordYouChoseTheTimeYouCreatedYourSequelServer

If all the above has been done then follow the steps below

If your and Macbook/Windows open up your Terminal/CLI for Mac hold down command key and then then press the space bar

For windows in the search bar type cmd and hit enter

Type Terminal and hit Enter

Run Composer Install on the directory if the above is install from the Terminal

Next you type cd in the terminal and it is best to drag the folder onto the terminal hit enter then do as follow

Type php artisan migrate

If all is well type php artisan db:seed

If all is well the project will be ready to use.

Now visit the url and type http://localhost/laravelmovietest/public

Here you will greated with Films page and also with the links to Login and Sign Up

APis are as followed /api/films/ GET/POST/PUT/DELETE Verb user over Http

You must login as an Admin to create Films

APis are as followed /api/comments/ GET/POST/PUT/DELETE Verb user over Http

Only Registered Users can Post Comments
