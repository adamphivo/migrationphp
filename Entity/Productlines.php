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
     * @db type=varchar isPrimary=true
     */
    public $productLine;

    /**
     * @db type=varchar default=NULL isNullable=true
     */
    public $textDescription;
}