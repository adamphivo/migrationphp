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
     * @db type=varchar isPrimary=true
     */
    public $productCode;

    /**
     * @db type=text
     */
    public $productDescription;

    /**
     * @db type=varchar isMUL=true
     */
    public $productLine;

    /**
     * @db type=varchar
     */
    public $productName;

    /**
     * @db type=varchar
     */
    public $productScale;

    /**
     * @db type=varchar
     */
    public $productVendor;

    /**
     * @db type=smallint
     */
    public $quantityInStock;
}