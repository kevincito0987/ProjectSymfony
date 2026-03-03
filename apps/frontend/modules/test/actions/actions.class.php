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
    // Traemos todos los países para la vista
    $this->paises = Doctrine_Core::getTable('PaisSalud')->findAll();
  }
}