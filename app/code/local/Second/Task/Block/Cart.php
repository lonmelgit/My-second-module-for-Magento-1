
<?php
  class Second_Task_Block_Cart extends Mage_Core_Block_Template
  {
      /*public function __construct()
      {
          $this->setTemplate('task/cart.phtml');
          parent::__construct();
      }*/
/*
      public function _toHtml()
      { return "test cart";}
*/
    public function getFieldvalue($name) {

        $session = Mage::getSingleton("core/session");


        $mn = $session->getData('mn');

        return isset($mn[$name]) ? $mn[$name] : '';
    }

    public function getDays() {

        return array(
            '' => 'Please select data',
            'mnd' => 'Monday',
            'tue' => 'Tuesday',
            'wed' => 'Wednesday',
            'thu' => 'Thursday',
            'fri' => 'Friday',
            'sat' => 'Saturday',
            'sun' => 'Sunday'
        );
    }

    public function createTimeRange($start, $end, $interval = '30 mins', $format = '12') {
          $startTime = strtotime($start);
          $endTime   = strtotime($end);
          $returnTimeFormat = ($format == '24')?'g:i:s A':'G:i:s';

          $current   = time();
          $addTime   = strtotime('+'.$interval, $current);
          $diff      = $addTime - $current;

          $times = array();
          while ($startTime < $endTime) {
              $times[] = date($returnTimeFormat, $startTime);
              $startTime += $diff;
          }
          $times[] = date($returnTimeFormat, $startTime);
          return $times;
    }

}
