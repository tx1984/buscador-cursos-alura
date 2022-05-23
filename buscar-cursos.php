<?php
require 'vendor/autoload.php';

use Alura\Buscador\BuscadorCursos;


$buscador = new BuscadorCursos();
$cursos = $buscador->buscarCursosPhp();

foreach($cursos as $curso){
    echo $curso . PHP_EOL;
}