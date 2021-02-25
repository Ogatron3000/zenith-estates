<?php

require 'vendor/autoload.php';

use Core\App;
use Core\Database\Connection;
use Core\Database\Database;

App::bind('database', Connection::make(require 'config.php'));

// Cities Table
Database::query("CREATE TABLE IF NOT EXISTS cities (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)");

// AD Types Table
Database::query("CREATE TABLE IF NOT EXISTS ad_types (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)");

// Real Estate Types Table
Database::query("CREATE TABLE IF NOT EXISTS re_types (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
)");

// Real Estates Table
Database::query("CREATE TABLE IF NOT EXISTS real_estates (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    city_id INT(11) UNSIGNED NOT NULL,
    ad_type_id INT(11) UNSIGNED NOT NULL,
    re_type_id INT(11) UNSIGNED NOT NULL,
    area INT(11) NOT NULL,
    price INT(11) NOT NULL,
    year INT(11) NOT NULL,
    description TEXT NOT NULL,
    CONSTRAINT `fk_real_estate_city`
        FOREIGN KEY (city_id) REFERENCES cities (id)
        ON DELETE RESTRICT
        ON UPDATE RESTRICT,
    CONSTRAINT `fk_real_estate_ad_type`
        FOREIGN KEY (ad_type_id) REFERENCES ad_types (id)
        ON DELETE RESTRICT
        ON UPDATE RESTRICT,
    CONSTRAINT `fk_real_estate_re_type`
        FOREIGN KEY (re_type_id) REFERENCES re_types (id)
        ON DELETE RESTRICT
        ON UPDATE RESTRICT
)");

// Photos Table
Database::query("CREATE TABLE IF NOT EXISTS photos (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    real_estate_id INT(11) UNSIGNED NOT NULL,
    path VARCHAR(255) NOT NULL,
    CONSTRAINT `fk_photo_real_estate`
        FOREIGN KEY (real_estate_id) REFERENCES real_estates (id)
        ON DELETE RESTRICT
        ON UPDATE RESTRICT
)");