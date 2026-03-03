<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    // Esto limpia la "lluvia" de errores naranja de tus capturas
    error_reporting(0);
    ini_set('display_errors', 0);

    $this->enablePlugins(array('sfDoctrinePlugin', 'sfTwigPlugin'));

    // Carga de Twig en lib/vendor como acordamos
    $twigAutoloader = dirname(__FILE__).'/../lib/vendor/twig/lib/Twig/Autoloader.php';
    if (file_exists($twigAutoloader)) {
        require_once $twigAutoloader;
        Twig_Autoloader::register();
    }
  }
}