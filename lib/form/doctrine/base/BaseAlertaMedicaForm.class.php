<?php

/**
 * AlertaMedica form base class.
 *
 * @method AlertaMedica getObject() Returns the current form's model object
 *
 * @package    MiReto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAlertaMedicaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'pais_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaisSalud'), 'add_empty' => false)),
      'descripcion'  => new sfWidgetFormTextarea(),
      'nivel_riesgo' => new sfWidgetFormChoice(array('choices' => array('Bajo' => 'Bajo', 'Medio' => 'Medio', 'Alto' => 'Alto'))),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'pais_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('PaisSalud'))),
      'descripcion'  => new sfValidatorString(),
      'nivel_riesgo' => new sfValidatorChoice(array('choices' => array(0 => 'Bajo', 1 => 'Medio', 2 => 'Alto'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('alerta_medica[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlertaMedica';
  }

}
