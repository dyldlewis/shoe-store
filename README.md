# Shoe Store App

#### Allows user to create a shoe store

#### By Dylan Lewis

## Description

The user can add shoe brands and stores that carry the shoes. They can add brands to shoes and shoes to brands. They can also edit, update, and delete shoe stores.

## Specs
As a user, I want to be able to add, update, delete and list shoe stores.
As a user, I want to be able to add and list new shoe brands. Shoe brands should include price point (for example: set values of low, middle, or high... or prices per shoe (if the store carries one model per brand)).
As a user, I want to be able to add shoe brands in the application (don't worry about integrating functionality to update or destroy individual shoe brands).
As a user, I want to be able to add existing shoe brands to a store to show where they are sold.
As a user, I want to be able to associate the same brand of shoes with multiple stores.
As a user, I want to be able to see all of the brands a store sells on the individual store page.
As a user, I want store names and shoe brands to be saved with a capital letter no matter how I enter them.
As a user, I want the price to be in currency format even if I just inputted a number. (In other words, typing in '50' should be updated to '$50.00'.)
As a user, I do not want stores and/or shoe brands to be saved if I enter a blank name.
As a user, I want all stores and brands to be unique. There shouldn't be two entries in the database for 'Blundstone', or 'Adidas'.
As a user, I want store and brand names to have a maximum of thirty characters.

## Prerequisites
* Both php and composer are required for this app, if you do not yet have them installed you can follow this tutorial here:
Mac - https://www.learnhowtoprogram.com/php/getting-started-with-php/installing-composer-and-configuration-for-mac
Pc - https://www.learnhowtoprogram.com/php/getting-started-with-php/installing-composer-and-configuration-for-windows
* If you do not have a local server set up, you'll need to install MAMP as well https://www.learnhowtoprogram.com/php/getting-started-with-php/installing-php

## Setup/Installation Requirements


* Locate repository on github https://github.com/dyldlewis/shoe-store
* Copy the link to the github repository
* Open terminal on your computer
* In terminal do the following:
  * Enter your desktop using 'cd desktop'
  * type 'git clone (repository url)'
  * type 'cd store' to access the new directory
  * type 'composer install' to acquire the necessary dependencies
* Next, open MAMP
  * Click preferences>Web Server and click the folder icon next to "document root"
  * Navigate to the store's web folder and hit select
  * Start your MAMP Server
* Next, open your web browser and enter the url http://localhost:8888/phpMyAdmin/
  * Click on the "Import" tab and click choose file
  * Select the zip file in the store folder and click go
  * (Optional) repeat for the test zip file in order to pass tests correctly
* visit localhost:8888 and view the application!


## Known Bugs

There are no known bugs.

## Support and contact details

For support email Dylan at dyldlewis@gmail.com.

## Technologies Used

HTML/CSS, PHP, Silex, Composer, MAMP, PHPUnit, MySql, Apache

### License

MIT

Copyright (c) 2016 **Dylan Lewis**
