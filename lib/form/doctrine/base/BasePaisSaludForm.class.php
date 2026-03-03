<?php

/**
 * PaisSalud form base class.
 *
 * @method PaisSalud getObject() Returns the current form's model object
 *
 * @package    MiReto
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePaisSaludForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'continente_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Continente'), 'add_empty' => false)),
      'nombre'        => new sfWidgetFormInputText(),
      'casos_totales' => new sfWidgetFormInputText(),
      'muertes'       => new sfWidgetFormInputText(),
      'codigo_iso'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'continente_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Continente'))),
      'nombre'        => new sfValidatorString(array('max_length' => 100)),
      'casos_totales' => new sfValidatorInteger(array('required' => false)),
      'muertes'       => new sfValidatorInteger(array('required' => false)),
      'codigo_iso'    => new sfValidatorString(array('max_length' => 10, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'PaisSalud', 'column' => array('codigo_iso')))
    );

    $this->widgetSchema->setNameFormat('pais_salud[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaisSalud';
  }

}
