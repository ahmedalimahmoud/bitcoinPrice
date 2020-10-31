# Bitcoin Price 

Laravel Project for Displaying ranged chart for bitcoin Pricing.

# Table of contents
- [Bitcoin Price](#Bitcoin Price)
- [Table of contents](#table-of-contents)
- [Requirements](#requirements)
- [Installation](#installation)
- [Configurations](#configurations)

# Requirements
- PHP `>= 7.3`
- BCMath PHP Extension 
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Composer

` 

# Installation

Run the following Command in your cli.

`git clone ahmedalimahmoud/bitcointPrice`

and then run this Command

`composer install`

and then change .env.example to .env by using this command

`rename .env.example .env`

finally run this command to generate key for env

`php artisan key:generate`


# Configurations

if you are using localhost folder you need to change APP_URL to your folder path in `.env` file.

- to run the project just run this command

`php artisan serve`

