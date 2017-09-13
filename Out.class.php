<?php


function RetirarAspaDupla($string){
	$string = str_replace("\"", "",$string);
	return $string;	
}

function CaracterEspecial($string){
preg_replace("/[^a-zA-Z0-9_.]/", " ", strtr($string, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucAAAAEEIOOOUUC_"));
return $string;	
}

function BuscarCep($cep){
	$resultado = @file_get_contents('https://viacep.com.br/ws/'.$cep.'/json/');  
    if(!$resultado){  
        $resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";  
    }     
    return $resultado; 	
}




?>

