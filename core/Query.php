<?php
namespace core;
use PDO;

class Query extends Conexion
{
	/*Declaración de atributos.*/
	private $tabla;
	private $conexion;
	/*
	**
	*Esta es la función contructora,permite inicializar las variables o atributos de la clase
	*llamando la conexion inicial y estableciendo la tabla que se ejecutara en los querys.
	*@param string $nombre_tabla toma el nombre de la tabla.
	*/
	public  function __construct($nombre_tabla)
	{
		$this->conexion = Conexion::__construct();
		$this->tabla = $nombre_tabla;
	}
	/*
	**
	*Esta función se encarga de realizar consultas(SELECT Y COUNT) SQL y traer el resultado en un array.
	*@param $string $columnas toma el nombre de las columnas a seleccionar.
	*@param $string $condiciones toma los parámetros para especificar la consulta, (1) por defecto para consultas sin condiciones.
	*@param $array  $datosProcesar arreglo con los datos a buscar en la BD, ([]) por defecto para consultas sin condiciones. 
	*@param $string $tablaSelect Nombre de la tabla, NULL cuando no es de tipo JOIN.
	*@return retorna la consulta solicitada en un array o en su defecto mensaje de error.
	*/
	public function select($columas,$condiciones=1,$datosProcesar=[],$tablaSelect=null)
	{	
		if ($tablaSelect==null) 
		{
		  $tablaSelect=$this->tabla;
		}  
		$query = 'SELECT '.$columas.' FROM '.$tablaSelect.' WHERE '.$condiciones;//echo $query;
		$resultado = $this->conexion->prepare($query);
		$resultado->execute($datosProcesar);
		$respuesta = $resultado->fetchAll(PDO::FETCH_OBJ);
		if (count($respuesta) == 0)
		{
			exit(include '../vistas/alertas/danger.php');
		} 
		else 
		{
			return $respuesta;
		}
	}
	/*
	**
	*Esta función se encarga de ejecutar un insert en la base de datos.
	*@param $string $columnas toma los nombres de las columnas.
	*@param $string $valores toma los nombres de los índices del array $datosProcesar.
	*@param $array  $datosProcesar arreglo con los datos a insertar. 
	*@param $string $tablaInsert Nombre de la tabla, NULL cuando no es de tipo JOIN.
	*/
	function insertar($columnas,$valores,$datosProcesar,$tablaInsert=null)
	{	 
		if ($tablaInsert==null) 
		{
		  $tablaInsert=$this->tabla;
		}   	
		$query = 'INSERT INTO '.$tablaInsert.' ('.$columnas.') VALUES ('.$valores.')';
		$resultado = $this->conexion->prepare($query);
		$resultado->execute($datosProcesar);
	}
	/*
	**
	*Esta función se encarga de ejecutar un update en la base de datos. 
	*@param $string $columnas toma los nombres de las columnas y los valores a editar.
	*@param $string $condicion toma el nombre de la columna guía para hacer el update.
	*@param $array  $datosProcesar arreglo con los datos a editar. 
	*@param $string $tablaupdate Nombre de la tabla, NULL cuando no es de tipo JOIN.
	*/
	function update($columnas,$condicion,$datosProcesar,$tablaupdate=null)
	{
		if ($tablaupdate==null) 
		{
		  $tablaupdate=$this->tabla;
		}
		$query = 'UPDATE '.$tablaupdate.' SET '.$columnas.' WHERE '.$condicion ;
		$resultado = $this->conexion->prepare($query);
		$resultado->execute($datosProcesar);
	}
	/*
	**
	*Esta función se encarga de ejecutar un delete en la base de datos. 
  	*@param $string $condicion toma el nombre de la columna guía para hacer el delete.
  	*@param $array  $datosProcesar arreglo con los datos preparados. 
	*@param $string $tabladelete Nombre de la tabla, NULL cuando no es de tipo JOIN.
	*/
	function delete($condicion,$datosProcesar,$tabladelete=null)
	{
		if ($tabladelete==null) 
		{
		  $tabladelete=$this->tabla;
		}
		$query ='DELETE FROM '.$tabladelete.' WHERE '.$condicion;
		$resultado = $this->conexion->prepare($query);
		$resultado->execute($datosProcesar);
	}
}
?>