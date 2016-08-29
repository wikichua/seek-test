# SEEK Test

## Installation

### Setup DB

- Access to mysql via console. 
- Create a database named seek_test.

### Setup Web App

- Requirement. 
	- Composer
	- PHPUnit
- Using console, run composer install.
- Run php artisan migrate --seed.

### PHPUnit Test

Due to time limitation, I just put the simple test on the checkout mechanism.
- Using the console, run ./vendor/bin/phpunit
- the 4 test files in ./test directory

### The App Interface

Due to time limitation, I skipped numbers of modules.

There is no:
- Login / Authentication page
- Some has no input validation check
- No payment gateway
- Ajax way of adding item to cart

What I would like to demo here:
- Simple relationship between items and checkout table
- Simple input validation check on adding item to cart
- Simple phpunit testing on checkout mechanism
- Simple table and data migration

### Explanation

- Home - Usual welcome page
- Customers - CRUD for customer records
- Ads Items - CRUD for ads items records
- Pricing Rules - CRUD for pricing rule records (Allow user to dinamically create new pricing rule)
- Cart - (In Customers listing, click on the blue button) Add and item to the cart and remove it when necessary The remove for now is to remove the item directly. Not reducing quantity.