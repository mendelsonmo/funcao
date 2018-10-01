<?php
// ini_set('display_errors',1);
// ini_set('display_startup_erros',1);
// error_reporting(E_ALL);
include ("../Classes/Dba.class.php");//funcao de crud
include ("../Classes/Out.class.php");//funcao de tratamento
   header("Access-Control-Allow-Origin: *");
   header("Access-Control-Allow-Credentials: true");
   header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT");
   header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
   header('P3P: CP="CAO PSA OUR"'); // Makes IE to support cookies
   header("Content-Type: application/json;");
   header('Content-type: text/html; charset=iso-8859-1');
   
    $postdata = file_get_contents("php://input"); 	
	
	if(!empty($postdata)){
		$request 	= json_decode($postdata);
		$HORARIO 	= RetirarAspaDupla($request->HORARIO);
		$PRESTADOR 	= RetirarAspaDupla($request->PRESTADOR);
		$NAME 	= RetirarAspaDupla($request->NAME);
		$INICIO	= RetirarAspaDupla($request->INICIO);
		$FIM 	= RetirarAspaDupla($request->FIM);
		
		
		$Connect = Conexao();	
		
		$inserir = "INSERT INTO TAB_EVENTOS (ID,NAME,INICIO,FIM,PRESTADOR,HORARIO)VALUES(OBJ_SEQUENCE.NEXTVAL,'$NAME','$INICIO','$FIM','$PRESTADOR','$HORARIO')";
		// print_r($inserir);
		$stmtInserir = ociparse($Connect,$inserir)or die("erro ao inserir.");
		$linha = ociExecute($stmtInserir);	
		$committed = ocicommit($Connect);
		if (!$committed) {
			$error = oci_error($Connect);
			echo 'Commit failed. Oracle reports: ' . $error['message'];
		}
		
		print_r($linha);
	}
	
	
?>	