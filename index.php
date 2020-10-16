<?php
// Migration Script
// Includes and auto-load
spl_autoload_register(function ($class) {
    include 'Entity/' . $class . '.php';
    include $class . '.php';
});

// Main Script
$migration = new Migration($pdo);

$migration->makeMigration();

