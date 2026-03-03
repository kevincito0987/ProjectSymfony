<?php

/**
 * AlertaMedica filter form base class.
 *
 * @package    MiReto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAlertaMedicaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'pais_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('PaisSalud'), 'add_empty' => true)),
      'descripcion'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'nivel_riesgo' => new sfWidgetFormChoice(array('choices' => array('' => '', 'Bajo' => 'Bajo', 'Medio' => 'Medio', 'Alto' => 'Alto'))),
    ));

    $this->setValidators(array(
      'pais_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('PaisSalud'), 'column' => 'id')),
      'descripcion'  => new sfValidatorPass(array('required' => false)),
      'nivel_riesgo' => new sfValidatorChoice(array('required' => false, 'choices' => array('Bajo' => 'Bajo', 'Medio' => 'Medio', 'Alto' => 'Alto'))),
    ));

    $this->widgetSchema->setNameFormat('alerta_medica_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AlertaMedica';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'pais_id'      => 'ForeignKey',
      'descripcion'  => 'Text',
      'nivel_riesgo' => 'Enum',
    );
  }
}
