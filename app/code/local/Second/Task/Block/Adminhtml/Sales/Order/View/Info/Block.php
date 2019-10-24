<?php
class Second_Task_Block_Adminhtml_Sales_Order_View_Info_Block extends Mage_Core_Block_Template {

    protected $order;

    private function getOrder() {
        if (is_null($this->order)) {
            if (Mage::registry('current_order')) {
                $order = Mage::registry('current_order');
            }
            elseif (Mage::registry('order')) {
                $order = Mage::registry('order');
            }
            else {
                $order = new Varien_Object();
            }
            $this->order = $order;
        }
        return $this->order;
    }


    public function getUserData() {

        $data = array();

        $order = $this->getOrder();

        // 1. get order quote
        $quote_id = $order->getQuoteId();

        //
        $model = Mage::getModel('second_task/cart')->load($quote_id,'quote_id' );
        //$model = Mage::getModel('second_task/cart')->load(9,'time_id' );

        if($model) {
            $data = $model->getData();
        }

        return $data;
    }
}