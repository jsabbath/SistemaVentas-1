<?php
namespace vista;
/**
 * Created by PhpStorm.
 * User: conve
 * Date: 06/12/2016
 * Time: 10:23 PM
 */
class Vista
{
    public static function crear($path,$key=null,$value=null){
        //comprobamos si existe la varible paths
        if($path != ""){
            $paths = explode(".",$path); //convertimos a un array separados por puntos
            $ruta = ""; //inicializamos
            for ($i=0;$i<count($paths);$i++){ //recorrer el paths
                if ($i == count($paths)-1){ //comprobar si es el ultimo elemento
                    $ruta.=$paths[$i].".php"; //si lo es se le concatena .php
                }else{
                    $ruta.=$paths[$i]."/"; // sino se le concatena una /
                }

            }
            //comprobar si ese archivo existe
            if (file_exists(VIEW_PATH.$ruta)){
                //comprobar si existe $key
                if (!is_null($key)){
                    if (is_array($key)){
                        //extrae los keys y los convierte a variables
                        extract($key,EXTR_PREFIX_SAME,"");
                    }else{
                        //("index","usuarios",$usuarios)
                        //$usuariios = $usuarios
                        ${$key} = $value;
                    }
                }
                include VIEW_PATH.$ruta;
            }else{
                die ("Error no existe la vista");
            }
        }
        return null;
    }


}