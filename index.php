<?php
// Migration Script
// Includes and auto-load
include "PDO.php";
include "Migration.php";
spl_autoload_register(function ($class) {
    include 'Entity/' . $class . '.php';
});

// Main Script
$migration = new Migration($pdo, Products::class, Productlines::class);

$migration->makeMigration();

