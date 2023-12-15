<?php
namespace Controllers\Peliculas;
use Controllers\PublicController;
use Views\Renderer;
use Dao\Peliculas\Peliculas as DAOPeliculas;
use Utilities\Site;
use Utilities\Validators;
use Utilities\Context;
use Utilities\Paging;
class Peliculas extends PublicController {
  private $idPelicula;
  private $titulo;
  private $director;
  private $genero;
  private $lanzamiento;
  private $duracion;
  private $sinopsis;
  private $clasificacion;

    public function run(): void
    {
        Site::addLink('peliculas_style');
        $viewData['idPelicula'] = 'idPelicula';
		$viewData['titulo'] = 'titulo';
		$viewData['director'] = 'director';
		$viewData['genero'] = 'genero';
		$viewData['lanzamiento'] = 'lanzamiento';
		$viewData['duracion'] = 'duracion';
		$viewData['sinopsis'] = 'sinopsis';
		$viewData['clasificacion'] = 'clasificacion';
		$viewData['peliculas']= DAOPeliculas::getPeliculas();
        Renderer::render("peliculas/peliculaslist", $viewData);
    }
}
