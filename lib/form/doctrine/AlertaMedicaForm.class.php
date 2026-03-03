<?php

/**
 * AlertaMedica form.
 *
 * @package    MiReto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AlertaMedicaForm extends BaseAlertaMedicaForm
{
  public function configure()
  {
    // Configuramos el selector de países para que use la columna 'nombre'
    $this->widgetSchema['pais_id'] = new sfWidgetFormDoctrineChoice(array(
      'model'     => 'PaisSalud',
      'add_empty' => 'Seleccione un país',
      'method'    => 'getNombre', // Esto hace que se vea el nombre y no el ID
    ));

    // Opcional: Si quieres que el nivel de riesgo sea un dropdown fijo
    $this->widgetSchema['nivel_riesgo'] = new sfWidgetFormChoice(array(
      'choices'  => array('Bajo' => 'Bajo', 'Medio' => 'Medio', 'Alto' => 'Alto'),
    ));
  }
}
