<?php

class Second_Task_Model_Observer {

    // This function is called on core_block_abstract_to_html_after event
    // We will append our block to the html
    public function getSalesOrderViewInfo(Varien_Event_Observer $observer) {
        $block = $observer->getBlock();
        // layout name should be same as used in app/design/adminhtml/default/default/layout/mymodule.xml
        if (($block->getNameInLayout() == 'order_info') && ($child = $block->getChild('second_task.order.info.custom.block'))) {
            $transport = $observer->getTransport();
            if ($transport) {
                $html = $transport->getHtml();
                $html .= $child->toHtml();
                $transport->setHtml($html);
            }
        }
    }
}