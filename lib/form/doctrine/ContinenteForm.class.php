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
    // 1. Mejorar el widget del Continente
    $this->widgetSchema['continente_id']->setOption('add_empty', '--- Selecciona un Continente ---');
    $this->widgetSchema['continente_id']->setAttributes(['class' => 'form-select']);

    // 2. Añadir validador personalizado para el flujo lógico
    $this->validatorSchema->setPostValidator(
      new sfValidatorCallback(array('callback' => array($this, 'validarContinente')))
    );
  }

  public function validarContinente($validator, $values)
  {
    // Ejemplo de validación lógica: 
    // Si el código ISO es de un país conocido, verificar que el continente coincida
    // (Aquí puedes añadir reglas específicas según tu lógica de negocio o base de datos)
    
    if ($values['nombre'] == 'Argentina' && $values['continente_id'] != 5) { // ID 5 es South America en tu DB
      throw new sfValidatorError($validator, 'Argentina debe pertenecer a South America.');
    }

    return $values;
  }
}
