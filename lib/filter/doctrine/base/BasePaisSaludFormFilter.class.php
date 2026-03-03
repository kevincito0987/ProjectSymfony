<?php

/**
 * PaisSalud filter form base class.
 *
 * @package    MiReto
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BasePaisSaludFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'continente_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Continente'), 'add_empty' => true)),
      'nombre'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'casos_totales' => new sfWidgetFormFilterInput(),
      'muertes'       => new sfWidgetFormFilterInput(),
      'codigo_iso'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'continente_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Continente'), 'column' => 'id')),
      'nombre'        => new sfValidatorPass(array('required' => false)),
      'casos_totales' => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'muertes'       => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'codigo_iso'    => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('pais_salud_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'PaisSalud';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'continente_id' => 'ForeignKey',
      'nombre'        => 'Text',
      'casos_totales' => 'Number',
      'muertes'       => 'Number',
      'codigo_iso'    => 'Text',
    );
  }
}
