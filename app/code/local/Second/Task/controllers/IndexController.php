<?php
class Second_Task_IndexController extends Mage_Core_Controller_Front_Action
{
    public function saveincartAction()
    {

        $post = $this->getRequest()->getPost();
        $post = array_map('trim', $post);
        if ($post) {
            $post['quote_id'] = Mage::getSingleton('checkout/session')->getQuote()->getId();

            if(empty($post['quote_id'])) {
                $this->_redirect('checkout/cart/');
            }

            $model = Mage::getModel('second_task/cart');
            //print_r($post); exit;
           // Mage::log($model->getData(),null,'logger.log');
          //  Mage::log(get_class($model),null,'logger.log');

            try {
                $model
                    ->setQuoteId($post['quote_id'])
                    ->setTimeId( $post['time_id'])
                    ->setDaysId($post['days_id'])
                    ->setIntercomeCode($post['intercome_code'])
                    ->save();

            } catch (Exception $e) {
                //Mage::logException($e->getMessage());
                echo $e->getMessage();
                //exit;
            }
        }
        $this->_redirect('checkout/cart/');
    }

}


