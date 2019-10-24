<?php
$installer = $this;
$installer->startSetup();
$installer->run("-- DROP TABLE IF EXISTS {$this->getTable('second_task')};
CREATE TABLE {$this->getTable('second_task')} (
      `quote_id` int(10)  unsigned NOT NULL default '0',
      `time_id` int(11)  NOT NULL default '0',
      `days_id` text NOT NULL default '',
      `intercome_code` int(11)  NOT NULL default '0',
      PRIMARY KEY (`quote_id`)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8;
    ");
$installer->endSetup();



