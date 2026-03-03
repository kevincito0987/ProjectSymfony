<?php

/**
 * Continente form.
 *
 * @package    MiReto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ContinenteForm extends BaseContinenteForm
{
  public function configure()
  {
    // Añadimos clases de Bootstrap al input de nombre
    $this->widgetSchema['nombre']->setAttributes([
      'class' => 'form-control',
      'placeholder' => 'Ej: Asia, Europa...'
    ]);
    
    // Quitamos campos innecesarios si los hubiera
    unset($this['created_at'], $this['updated_at']);
  }
}
