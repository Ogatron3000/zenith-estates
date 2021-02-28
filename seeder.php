<?php

require 'vendor/autoload.php';

use Core\App;
use Core\Database\Connection;
use Core\Database\Database;

App::bind('database', Connection::make(require 'config.php'));

Database::query("
    INSERT INTO
        cities (name)
    VALUES 
        ('Podgorica'), ('Nikšić'), ('Budva'), ('Kotor'), ('Bar'), ('Tivat'), ('Bijelo Polje'), ('Berane'), ('Pljevlja'), ('Šavnik'), ('Plužine'),
        ('Kolašin'),('Andrijevica'), ('Herceg Novi'), ('Ulcinj'), ('Rožaje'), ('Danilovgrad'), ('Cetinje'), ('Plav'), ('Mojkovac'), ('Žabljak')
    ");

Database::query("
    INSERT INTO
        ad_types (name)
    VALUES 
        ('Sale'), ('Rent'), ('Compensation')
");

    Database::query("
    INSERT INTO
        re_types (name)
    VALUES 
        ('Apartment'), ('House'), ('Garage'), ('Office')
");