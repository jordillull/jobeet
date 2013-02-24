<?php
include(dirname(__FILE__).'/unit.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'test', true);

new sfDatabaseManager($configuration);

$loader = new sfPropelDatA();
$loader->loadData(sfConfig::get('sf_test_dir').'/fixtures');
