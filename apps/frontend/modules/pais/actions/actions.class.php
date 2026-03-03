<?php

/**
 * pais actions.
 *
 * @package    MiReto
 * @subpackage pais
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class paisActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
{
  // DEBE LLAMARSE $paises (en plural) para que la plantilla lo vea
  $this->paises = Doctrine_Core::getTable('PaisSalud')->findAll();
}

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new PaisSaludForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new PaisSaludForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($pais_salud = Doctrine_Core::getTable('PaisSalud')->find(array($request->getParameter('id'))), sprintf('Object pais_salud does not exist (%s).', $request->getParameter('id')));
    $this->form = new PaisSaludForm($pais_salud);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($pais_salud = Doctrine_Core::getTable('PaisSalud')->find(array($request->getParameter('id'))), sprintf('Object pais_salud does not exist (%s).', $request->getParameter('id')));
    $this->form = new PaisSaludForm($pais_salud);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($pais_salud = Doctrine_Core::getTable('PaisSalud')->find(array($request->getParameter('id'))), sprintf('Object pais_salud does not exist (%s).', $request->getParameter('id')));
    $pais_salud->delete();

    $this->redirect('pais/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $pais_salud = $form->save();
      // Redirigir siempre al index para evitar el error ArgumentCountError
      $this->redirect('pais/index');
    }
  }
}
