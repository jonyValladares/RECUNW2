<?php
namespace Dao\Peliculas;
use Dao\Table; 
class Peliculas extends Table{
    
  private $idPelicula;
  private $titulo;
  private $director;
  private $genero;
  private $lanzamiento;
  private $duracion;
  private $sinopsis;
  private $clasificacion;

 
  public static function getPeliculas(){
	 $sqlstr= "SELECT * FROM peliculas";
        $params = [];
        $registros = self::obtenerRegistros($sqlstr, $params);
        return $registros;
	}

  public static function insertPeliculas($titulo, $director, $genero, $lanzamiento, $duracion, $sinopsis, $clasificacion){
	
    $sqlstr = "INSERT INTO peliculas (titulo, director, genero, lanzamiento, duracion, sinopsis, clasificacion) VALUES (:titulo , :director , :genero , :lanzamiento , :duracion , :sinopsis , :clasificacion)";
    $params = ['titulo' => $titulo, 'director' => $director, 'genero' => $genero, 'lanzamiento' => $lanzamiento, 'duracion' => $duracion, 'sinopsis' => $sinopsis, 'clasificacion' => $clasificacion];
    $registros = self::executeNonQuery($sqlstr, $params);
    return $registros;

	}

  public static function updatePeliculas($idPelicula, $titulo, $director, $genero, $lanzamiento, $duracion, $sinopsis, $clasificacion){
	
        $sqlstr = "UPDATE peliculas SET titulo = :titulo, director = :director, genero = :genero, lanzamiento = :lanzamiento, duracion = :duracion, sinopsis = :sinopsis, clasificacion = :clasificacion WHERE idPelicula = :idPelicula";

        $params = ['idPelicula' => $idPelicula, 'titulo' => $titulo, 'director' => $director, 'genero' => $genero, 'lanzamiento' => $lanzamiento, 'duracion' => $duracion, 'sinopsis' => $sinopsis, 'clasificacion' => $clasificacion];
        $registros = self::executeNonQuery($sqlstr, $params);
        return $registros;
    
	}

 public static function obtenerPorId($id){
	 $sqlstr= "SELECT * FROM peliculas WHERE idPelicula = :id";
        $params = ['id'=>$id];
        $registros = self::obtenerUnRegistro($sqlstr, $params);
        return $registros;
	}

 public static function deletePeliculas($id){
	$sqlstr= "DELETE  FROM peliculas WHERE idPelicula = :id";
        $params = ['id'=>$id];
        $registros = self::executeNonQuery($sqlstr, $params);
        return $registros;
	}
    
}