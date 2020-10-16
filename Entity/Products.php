<?php
class Products 
{
    /**
     * @db type=double 
     */
    public $buyPrice;

    /**
     * @db type=double
     */
    public $MSRP;

    /**
     * @db type=varchar(255) isPrimary=true
     */
    public $productCode;

    /**
     * @db type=text
     */
    public $productDescription;

    /**
     * @db type=varchar(255) isForeign=productlines
     */
    public $productLine;

    /**
     * @db type=varchar(255)
     */
    public $productName;

    /**
     * @db type=varchar(255) 
     */
    public $productScale;

    /**
     * @db type=varchar(255)
     */
    public $productVendor;

    /**
     * @db type=smallint
     */
    public $quantityInStock;
}