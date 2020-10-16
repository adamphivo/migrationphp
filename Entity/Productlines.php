<?php
class Productlines
{
    /**
     * @db type=mediumtext default=NULL isNullable=true
     */
    public $htmlDescription;

    /**
     * @db type=mediumblob default=NULL isNullable=true
     */
    public $image;

    /**
     * @db type=varchar(255) isPrimary=true
     */
    public $productLine;

    /**
     * @db type=varchar(255) default=NULL isNullable=true
     */
    public $textDescription;
}