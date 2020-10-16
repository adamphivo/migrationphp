<?php
// Migration Script
// Includes and auto-load
include "PDO.php";
include "Migration.php";
include "Entity/Products.php";
include "Entity/Productlines.php";

// Main Script
$migration = new Migration($pdo);

$migration->makeMigration();

