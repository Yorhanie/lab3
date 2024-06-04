<?php
require_once("functions.php");

$db = getDbConnection();

$query = 'CREATE TABLE IF NOT EXISTS `articles` (
    `id` INTEGER UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `title` TEXT NOT NULL,
    `author` TEXT NOT NULL,
    `created` datetime NOT NULL,
    `content` TEXT NOT NULL,
    `image` TEXT NOT NULL,
    `comments` INTEGER NOT NULL
    );';
$db->exec($query);