<?php
// 1. Cargamos Twig (Asegúrate de que la ruta al autoload sea correcta si no carga)
$loader = new Twig_Loader_Filesystem(dirname(__FILE__));
$twig = new Twig_Environment($loader);

// apps/frontend/modules/test/templates/indexSuccess.php
echo $twig->render('indexSuccess.html.twig', array(
    'nombre' => $sf_data->getRaw('nombre'),
    'paises' => $sf_data->getRaw('paises'),
    'pager'  => $sf_data->getRaw('pager')
));