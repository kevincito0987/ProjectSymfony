<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // Esto activa Doctrine que ya viene dentro de la carpeta que clonamos
    $this->enablePlugins('sfDoctrinePlugin');
  }
}