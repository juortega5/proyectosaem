<?php 
	namespace core;
	class Sanitizar
	{
		/*
		**
		*Esta función se encarga de de limpiar de XSS los datos,verificar la existencia
		*de las variables POST e identificar que los datos correspondan al formato solicitado.
		*@param $array $datoLimpiar toma los datos a validar.
		*@param $array $formato toma los formatos que deben cumplir los datos a validar.
		*@return retorna mensaje cuanto hay inconsistencias, de lo contrario retorna arreglo con los datos sin xss.
		*/
		static public function sanitizaXSS($datoLimpiar,$formato)
		{
			$cantidadDatos = count($datoLimpiar);
			for ($i=0; $i <$cantidadDatos ; $i++)
			{ 
				(!isset($_POST[$datoLimpiar[$i]])) ? exit(include '../vistas/alertas/errorDato.php'):$datoLimpiar[$i] = $_POST[$datoLimpiar[$i]] ;
				$datoLimpiar[$i] = trim($datoLimpiar[$i]);
				$verificacion = (preg_replace('[\s+/g]','',htmlspecialchars($datoLimpiar[$i])));
				$metodo = $formato[$i];
				if ($metodo=='nulo' && empty($verificacion)) { $verificacion = 'NULL';}
				if ($metodo=='nulo' && !empty($verificacion)) { $metodo = 'text';}
				if((empty($verificacion) && $verificacion<>0) || self::$metodo($verificacion)==1) 
				{
		    		//echo "error en ". $verificacion."  ".$metodo;
		    		exit(include '../vistas/alertas/errorDato.php');
				} 
				else
				{
					$datoSinXSS[] = $verificacion;
				}
			}
			return $datoSinXSS;
		}
		/*
		**
		*Esta función se encarga de validar que el dato sean solo numeros.
		*@param $string $datoLimpiar toma el valor a comprobar.
		*@return retorna 1 cuando hay error y 0 si el dato es valido.
		*/
		static public function numero($datoLimpiar)
		{
			if(!ctype_digit($datoLimpiar))
			{
				return "1";
			}	
			else
			{
				return "0";
			}
		}
		/*
		**
		*Esta función se encarga de validar que el dato sean solo texto y espacios.
		*@param $string $datoLimpiar toma el valor a comprobar.
		*@return retorna 1 cuando hay error y 0 si el dato es valido.
		*/
		static public function text($datoLimpiar)
		{
			if(!preg_match("/^[a-zA-ZñÑ\s+]+$/", $datoLimpiar)) 
			{
	    		return "1";
			}	
			else
			{
				return "0";
			}	
		}
		/*
		**
		*Esta función se encarga de validar que el dato corresponda a una dirección valida.
		*@param $string $datoLimpiar toma el valor a comprobar.
		*@return retorna 1 cuando hay error y 0 si el dato es valido.
		*/
		static public function direccion($datoLimpiar)
		{
			if(!preg_match("/^[a-zA-ZñÑ0-9\-+*.#\s+]+$/", $datoLimpiar)) 
			{
	    		return "1";
			}	
			else
			{
				return "0";
			}
		}
		/*
		**
		*Esta función se encarga de validar que el dato corresponda a un email valido.
		*@param $string $datoLimpiar toma el valor a comprobar.
		*@return retorna 1 cuando hay error y 0 si el dato es valido.
		*/
		static public function correo($datoLimpiar)
		{
			if(!filter_var($datoLimpiar, FILTER_VALIDATE_EMAIL)) 
			{
	    		return "1";
			}	
			else
			{
				return "0";
			}	
		}
		/*
		**
		*Esta función se encarga de validar que el dato corresponda a una fecha valida.
		*@param $string $datoLimpiar toma el valor a comprobar.
		*@return retorna 1 cuando hay error y 0 si el dato es valido.
		*/
		static public function fecha($datoLimpiar)
		{
			if(preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $datoLimpiar))
			{ 
				$validarFecha = explode("-",$datoLimpiar);
				if(!checkdate($validarFecha[1], $validarFecha[2], $validarFecha[0]))
				{
					return "1";
				}
			}	
			else
			{ 
				return "1";
			}
					
		}
		/*
		**
		*Función para campos que se vayan a declarar nulos
		*@return retorna 0.
		*/
		static public function nulo()
		{
			return "0";
		}
		/*
		**
		*Función para campos de logueo
		*@return retorna 0.
		*/
		static public function logueo()
		{
			return "0";
		}
		/*
		**
		*Esta función se encarga de validar que el dato corresponda a una hora valida.
		*@param $string $datoLimpiar toma el valor a comprobar.
		*@return retorna 1 cuando hay error y 0 si el dato es valido.
		*/
		static public function hora($datoLimpiar)
		{
			$validarhora= explode(":",$datoLimpiar);
			if($validarhora[0]>23) 
			{
	    		return "1";
			}	
			elseif($validarhora[1]>59 || $validarhora[2]>59)
			{
				return "1";
			}
			else
			{
				return "0";
			}
		}
	}	
?>