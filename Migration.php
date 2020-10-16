<?php

final class Migration 
{
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->products = new Products();
        $this->productlines = new Productlines();
    } 

    public function makeMigration() : self
    {
        $classesToMigrate = [$this->products, $this->productlines];

        foreach($classesToMigrate as $class){
            $this->createTable($this->getName($class));
            $this->createColumns($this->getName($class), $class);
        }

        return $this;
    }

    private function createTable(string $tableName)
    {
        $queryString = "CREATE TABLE ".strtower($tableName)." (mock INT)";
        $this->makeRequest($queryString);
    }

    private function createColumns(string $tableName, object $class)
    {
        foreach($this->getProperties($class) as $props){
            // we build the query string
            foreach($props as $columnName => $configs){
                $queryString = "ALTER TABLE ".$tableName." ADD ".$columnName." ";
                // we now add the column configuration
                foreach($configs as $config){
                    foreach($config as $name => $value){
                        $name == "type" && $value != "varchar" ? $queryString .= $value : NULL;
                        $name == "type" && $value == "varchar" ? $queryString .= $value."(255)" : NULL;
                        $name == "isNullable" && $value == "true" ? $queryString .= " NULL" : NULL; 
                    }
                }
                // We can now make the SQL request
                $this->makeRequest($queryString);
            }
        }
    }

    private function makeRequest(string $queryString) : int
    {
        $query = $this->pdo->prepare($queryString);
        if($query->execute()){
            return 1;
        } else {
            print_r($query->errorInfo());
            // helps us debug by printing the bad query string
            print_r($queryString."\n");
            return 0;
        }
    }

    private function getName($class) : string
    {
        return (new ReflectionClass($class))->getName();
    }

    private function getProperties($class) : array
    {
        /** 
         * Translates the class props into an array such as :
         * [propertyName] => [[config1 => value1], [config2 => value2], ... ]
        */

        $props = array_map(function($prop){
            return [$prop->getName() => $this->extractProps($prop->getDocComment())];
        },(new ReflectionClass($class))->getProperties());
        return $props;
    }

    private function extractProps(string $docComment) : array
    {
        /**
         * Extract the props and returns an associative array
         * "type=example" into ["type=>"example"]
         */

        preg_match_all('/([a-zA-Z]+)\=([a-zA-Z]+)/', $docComment, $matches, PREG_SET_ORDER);
        $props = array_map(function($match){
            return [$match[1] => $match[2]];
        }, $matches);
        return $props;
    }
}