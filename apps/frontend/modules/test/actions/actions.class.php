<?php

/**
 * test actions.
 */
class testActions extends sfActions
{
  /**
   * Acción para sincronizar datos de la API a la DB
   */
  public function executeSincronizar(sfWebRequest $request)
  {
    // 1. Consumir la API de salud
    $url = "https://disease.sh/v3/covid-19/countries?allowNull=true";
    $data = json_decode(file_get_contents($url), true);

    if ($data) {
      // 2. Procesar y Guardar en DB con Relaciones (Top 15)
      foreach (array_slice($data, 0, 15) as $item) {
        // Relación 1: Continente
        $nombreCont = $item['continent'] ?: 'Otros';
        $continente = Doctrine_Core::getTable('Continente')->findOneByNombre($nombreCont);
        
        if (!$continente) {
          $continente = new Continente();
          $continente->setNombre($nombreCont);
          $continente->save();
        }

        // Relación 2: Pais (con llave foránea a continente)
        $iso = $item['countryInfo']['iso3'];
        if ($iso) {
          $pais = Doctrine_Core::getTable('PaisSalud')->findOneByCodigoIso($iso);
          if (!$pais) {
            $pais = new PaisSalud();
            $pais->setNombre($item['country']);
            $pais->setCasosTotales($item['cases']);
            $pais->setMuertes($item['deaths']);
            $pais->setCodigoIso($iso);
            $pais->setContinente($continente);
            $pais->save();
          }
        }
      }
    }

    // EL ARREGLO MAESTRO: Redirigir al index para ver los cambios de inmediato
    return $this->redirect('test/index');
  }

  /**
   * Acción principal que muestra la tabla en Twig
   */
  // apps/frontend/modules/pais/actions/actions.class.php
  public function executeIndex(sfWebRequest $request)
{
  $this->nombre = "Kevin"; 

  // 1. Configurar el Paginador correctamente
  $this->pager = new sfDoctrinePager('PaisSalud', 10); 
  
  $query = Doctrine_Core::getTable('PaisSalud')
        ->createQuery('p')
        ->leftJoin('p.Continente c'); 
        // Eliminamos ->leftJoin('p.AlertaMedica a') porque no está definida en el schema
        
  $this->pager->setQuery($query);
  $this->pager->setPage($request->getParameter('page', 1));
  $this->pager->init();

  // 2. Pasamos los resultados a la variable que usa tu Twig
  $this->paises = $this->pager->getResults();
}
}