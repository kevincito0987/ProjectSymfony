<?php
// Forzamos la carga de la plantilla Twig desde el PHP
$loader = new Twig_Loader_Filesystem(dirname(__FILE__));
$twig = new Twig_Environment($loader);

// Renderizamos el archivo .twig y le pasamos la variable $nombre
echo $twig->render('indexSuccess.html.twig', array('nombre' => $nombre));