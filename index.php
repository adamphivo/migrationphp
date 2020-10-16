<?php
// Migration Script

include "PDO.php";
include "Migration.php";

// Any class in Entity/ will be added
spl_autoload_register(function ($class) {
    include 'Entity/' . $class . '.php';
});

// Main Script

/**
 * USAGE :
 * 
 *  ANNOTATIONS :
 *  
 *  @db type=type(size) [ isPrimary=true isForeign=parentClass isNullable=true]
 *
 * 
 * 1. Create a new Migration object.
 * 
 * PROPERTIES :
 * 
 * $migration = new Migration(object $pdo, ...$classes)
 * 
 * - $pdo  is your PDO Object
 * - ...$classes are your classes name (ClassName::class) separated by commas.
 * 
 * 2. $migration->makeMigration()
 * 
 * FOREIGN KEYS:
 * 
 * - Parent class must be created before child class
 * 
 * - Once created can't delete them [?]
 * 
 */


$migration = new Migration($pdo, Productlines::class, Products::class);
$migration->makeMigration();

