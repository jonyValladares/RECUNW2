<?php

namespace Controllers\Peliculas;

use Controllers\PublicController;
use Views\Renderer;
use Dao\Peliculas\Peliculas as DAOPeliculas;
use Utilities\Site;
use Utilities\Validators;

class Pelicula extends PublicController
{
    private $idPelicula;
    private $titulo;
    private $director;
    private $genero;
    private $lanzamiento;
    private $duracion;
    private $sinopsis;
    private $clasificacion;
    private $peliculas = [
        "idpelicula" => "",
        "titulo" => "",
        "director" => "",
        "genero" => "",
        "lanzamiento" => "",
        "duracion" => "",
        "sinopsis" => "",
        "clasificacion" => ""
    ];
    private $listUrl = "index.php?page=Peliculas_Peliculas";
    private $mode = 'INS';
    private $viewData = [];
    private $error = [];

    private $modes = [
        "INS" => "Creando nueva peliculas",
        "UPD" => "Editando peliculas",
        "DEL" => "Eliminando peliculas",
        "DSP" => "Detalle peliculas"
    ];

    public function run(): void
    {
        $this->init();
        if ($this->isPostBack()) {
            if ($this->validateFormData()) {
                $this->peliculas['idpelicula'] = $_POST['idpelicula'];
                $this->peliculas['titulo'] = $_POST['titulo'];
                $this->peliculas['director'] = $_POST['director'];
                $this->peliculas['genero'] = $_POST['genero'];
                $this->peliculas['lanzamiento'] = $_POST['lanzamiento'];
                $this->peliculas['duracion'] = $_POST['duracion'];
                $this->peliculas['sinopsis'] = $_POST['sinopsis'];
                $this->peliculas['clasificacion'] = $_POST['clasificacion'];
                $this->processAction();
            }
        }
        $this->prepareViewData();
        $this->render();
    }

    private function init()
    {
        if (isset($_GET["mode"])) {
            if (isset($this->modes[$_GET["mode"]])) {
                $this->mode = $_GET["mode"];
                if ($this->mode !== "INS") {
                    if (isset($_GET["idPelicula"])) {
                        $this->peliculas = DAOPeliculas::obtenerPorId(strval($_GET["idPelicula"]));

                    }
                }
            } else {
                $this->handleError("Oops, el programa no encuentra el modo solicitado, intente de nuevo");
            }
        } else {
            $this->handleError("Oops, el programa falló, intente de nuevo.");
        }
    }

    private function handleError($errMsg)
    {
        Site::redirectToWithMsg($this->listUrl, $errMsg);
    }

    private function validateFormData()
    {
        if (Validators::IsEmpty($_POST["titulo"])) {
            $this->error["titulo_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["director"])) {
            $this->error["director_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["genero"])) {
            $this->error["genero_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["lanzamiento"])) {
            $this->error["lanzamiento_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["duracion"])) {
            $this->error["duracion_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["sinopsis"])) {
            $this->error["sinopsis_error"] = "Campo es requerido";
        }
        if (Validators::IsEmpty($_POST["clasificacion"])) {
            $this->error["clasificacion_error"] = "Campo es requerido";
        }
        return count($this->error) == 0;
    }

    private function processAction()
    {
        switch ($this->mode) {
            case 'INS':
                if (DAOPeliculas::insertPeliculas(
                    $this->peliculas["titulo"],
                    $this->peliculas["director"],
                    $this->peliculas["genero"],
                    $this->peliculas["lanzamiento"],
                    $this->peliculas["duracion"],
                    $this->peliculas["sinopsis"],
                    $this->peliculas["clasificacion"]
                )
                ) {
                    Site::redirectToWithMsg($this->listUrl, "Pelicula creada exitosamente.");
                } else {
                    Site::redirectToWithMsg($this->listUrl, "Hubo un error.");
                }
                break;
            case 'UPD':
                if (DAOPeliculas::updatePeliculas(
                    $this->peliculas["idpelicula"],
                    $this->peliculas["titulo"],
                    $this->peliculas["director"],
                    $this->peliculas["genero"],
                    $this->peliculas["lanzamiento"],
                    $this->peliculas["duracion"],
                    $this->peliculas["sinopsis"],
                    $this->peliculas["clasificacion"]
                )
                ) {
                    Site::redirectToWithMsg($this->listUrl, "Pelicula actualizada exitosamente.");
                } else {
                    Site::redirectToWithMsg($this->listUrl, "Hubo un error.");
                }
                break;
            case 'DEL':
                if (DAOPeliculas::deletePeliculas(
                    $this->peliculas["idpelicula"]
                )
                ) {
                    Site::redirectToWithMsg($this->listUrl, "Pelicula eliminada exitosamente.");
                } else {
                    Site::redirectToWithMsg($this->listUrl, "Hubo un error.");
                }
                break;
        }
    }


    private function prepareViewData()
    {
        $this->viewData["mode"] = $this->mode;
        $this->viewData["peliculas"] = $this->peliculas;
        if ($this->mode == "INS") {
            $this->viewData["modedsc"] = $this->modes[$this->mode];
        } else {
            $this->viewData["modedsc"] = sprintf(
             $this->modes[$this->mode]
            );
        }

        foreach ($this->error as $key => $error) {
            if ($error !== null) {
                $this->viewData["peliculas"][$key] = $error;
            }
        }
        $this->viewData["readonly"] = in_array($this->mode, ["DSP", "DEL"]) ? 'readonly' : '';
        $this->viewData["showConfirm"] = $this->mode !== "DSP";

    }

    private function render()
    {
        Renderer::render("peliculas/peliculasform", $this->viewData);
    }
}
