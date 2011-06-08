<?php

//require_once 'F:/NetBeansProjects/SF/1.4/lib/autoload/sfCoreAutoload.class.php';
require_once dirname(__FILE__).'/../../SF/1.4.11/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfTCPDFPlugin');
  }
}
