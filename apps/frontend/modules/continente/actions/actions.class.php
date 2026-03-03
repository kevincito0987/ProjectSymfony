<?php

/**
 * continente actions.
 *
 * @package    MiReto
 * @subpackage continente
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class continenteActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
    $this->continentes = Doctrine_Core::getTable('Continente')->findAll();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->continente = Doctrine_Core::getTable('Continente')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->continente);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ContinenteForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new ContinenteForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('new');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->forward404Unless($continente = Doctrine_Core::getTable('Continente')->find(array($request->getParameter('id'))), sprintf('Object continente does not exist (%s).', $request->getParameter('id')));
    $this->form = new ContinenteForm($continente);
  }

  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($continente = Doctrine_Core::getTable('Continente')->find(array($request->getParameter('id'))), sprintf('Object continente does not exist (%s).', $request->getParameter('id')));
    $this->form = new ContinenteForm($continente);

    $this->processForm($request, $this->form);

    $this->setTemplate('edit');
  }

  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();

    $this->forward404Unless($continente = Doctrine_Core::getTable('Continente')->find(array($request->getParameter('id'))), sprintf('Object continente does not exist (%s).', $request->getParameter('id')));
    $continente->delete();

    $this->redirect('continente/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
    if ($form->isValid())
    {
      $continente = $form->save();

      // CAMBIO MAESTRO: Redirigimos al listado para ver el cambio de inmediato
      // Esto evita llamar a ->get() sin argumentos que causa el Fatal Error
      $this->redirect('continente/index');
    }
  }
}
