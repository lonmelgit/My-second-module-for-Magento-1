<?php

class Second_Task_Model_Mysql4_Cart extends Mage_Core_Model_Mysql4_Abstract
{
    protected function _construct()
    {
        $this->_init('second_task/cart', 'quote_id'); // guote_id -> table primary key


    }

    protected $_isPkAutoIncrement = false;
}