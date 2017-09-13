<?php

include "Conn.class.php";
function ListarRelatorioCalcSegurancaQualidade($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select = "SELECT * FROM {$Tabela}{$Condicao}";
	// print_r($select);
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(ociExecute($stmt)):  
		 $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_CALC_SEG_QUAL'] = $dados['ID_CALC_SEG_QUAL'];
			$campo['CALC_SEGURACA']    = $dados['CALC_SEGURACA'];
			$campo['CERTIFICADO']      = $dados['CERTIFICADO'];
			$campo['ID_PRESTADOR']     = $dados['ID_PRESTADOR'];
			$campo['CLASSIFICACAO']    = $dados['CLASSIFICACAO'];			
			$campo['OBSERVACAO'] 	   = $dados['OBSERVACAO'];
			$campo['ID_ESPECIALIDADE'] = $dados['ID_ESPECIALIDADE'];
		  $lista[] = $campo;		
		}	
		$obj = json_encode($lista);	
			echo $obj;
	endif;
}
	
function ListarRelatorioCalcConforto($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select = "SELECT * FROM {$Tabela}{$Condicao}";
	// print_r($select);
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(ociExecute($stmt)):  
		 $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_CALC_CONFORTO'] = $dados['ID_CALC_CONFORTO'];
			$campo['CALC_CONFORTO']    = $dados['CALC_CONFORTO'];
			$campo['CLASSIFICACAO']    = $dados['CLASSIFICACAO'];
			$campo['ID_PRESTADOR']     = $dados['ID_PRESTADOR'];
			$campo['CAMPO_TEXTO']      = $dados['CAMPO_TEXTO'];
			$campo['OBSERVACAO']       = $dados['OBSERVACAO'];
			$campo['ID_ESPECIALIDADE'] = $dados['ID_ESPECIALIDADE'];
		  $lista[] = $campo;		
		}	
		$obj = json_encode($lista);	
			echo $obj;
	endif;
}

function ListarRelatorioIdentificacao($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select =   "SELECT 
					ID_IDENTIFICACAO,ACOMPANHANTE,AUDITOR,DATAAUDITORIA,ESPECIALIDADE,NOME_PRESTADOR,RUA,
					BAIRRO,CEP,NUMERO,COMPLEMENTO,MEDICO_RESPONSAVEL,ALVARA_SANITARIO,ALVARA_FUNCIONAMENTO,
					VALIDACAO_CORPO_BOMBEIRO,RESPONSABILIDADE_TECNICA,PNE,OBS_PNE,HORARIO_ATENDIMENTO,CORPO_CLINICO,
					SOLICITACAO_ATUAL,VERSAO_CONTRATO_SOCIAL,ADESAO_SLINE,MODALIDADE_ATENDIMENTO,CAPACIDADE_ATENDIMENTO,
					SERVICOS_OFERTADOS,OBS,CIDADE 
				FROM {$Tabela}{$Condicao}";
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(ociExecute($stmt)):  
		 $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_IDENTIFICACAO']   = $dados['ID_IDENTIFICACAO'];			
			$campo['ACOMPANHANTE'] = $dados['ACOMPANHANTE'];
			$campo['AUDITOR'] = $dados['AUDITOR'];
			$campo['ESPECIALIDADE'] = $dados['ESPECIALIDADE'];
			$campo['DATAAUDITORIA'] = $dados['DATAAUDITORIA'];
			$campo['NOME_PRESTADOR'] = $dados['NOME_PRESTADOR'];
			$campo['RUA'] = $dados['RUA'];
			$campo['BAIRRO'] = $dados['BAIRRO'];
			$campo['CEP'] = $dados['CEP'];
			$campo['NUMERO'] = $dados['NUMERO'];
			$campo['COMPLEMENTO'] = $dados['COMPLEMENTO'];
			$campo['MEDICO_RESPONSAVEL'] = $dados['MEDICO_RESPONSAVEL'];
			$campo['ALVARA_SANITARIO'] = $dados['ALVARA_SANITARIO'];
			$campo['ALVARA_FUNCIONAMENTO'] = $dados['ALVARA_FUNCIONAMENTO'];
			$campo['VALIDACAO_CORPO_BOMBEIRO'] = $dados['VALIDACAO_CORPO_BOMBEIRO'];
			$campo['RESPONSABILIDADE_TECNICA'] = $dados['RESPONSABILIDADE_TECNICA'];
			$campo['RESPONSABILIDADE_TECNICA'] = $dados['RESPONSABILIDADE_TECNICA'];			
			$campo['PNE'] = $dados['PNE'];			
			$campo['OBS_PNE'] = $dados['OBS_PNE'];			
			$campo['HORARIO_ATENDIMENTO'] = $dados['HORARIO_ATENDIMENTO'];			
			$campo['CORPO_CLINICO'] = $dados['CORPO_CLINICO'];			
			$campo['SOLICITACAO_ATUAL'] = $dados['SOLICITACAO_ATUAL'];			
			$campo['VERSAO_CONTRATO_SOCIAL'] = $dados['VERSAO_CONTRATO_SOCIAL'];
			$campo['ADESAO_SLINE'] = $dados['ADESAO_SLINE'];
			$campo['MODALIDADE_ATENDIMENTO'] = $dados['MODALIDADE_ATENDIMENTO'];
			$campo['CAPACIDADE_ATENDIMENTO'] = $dados['CAPACIDADE_ATENDIMENTO'];
			$campo['SERVICOS_OFERTADOS'] = $dados['SERVICOS_OFERTADOS'];
			$campo['OBS'] = utf8_encode($dados['OBS']);
			$campo['CIDADE'] =  utf8_encode($dados['CIDADE']);			
		  $lista[] = $campo;		
		}	
		$obj = json_encode($lista);	
			echo $obj;
	endif;
}

function ListarEpecialidade($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select = "SELECT * FROM {$Tabela}{$Condicao}";	
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(ociExecute($stmt)):  
		 $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_ESPECIALIDADE'] = $dados['ID_ESPECIALIDADE'];
			$campo['ESPECIALIDADE']     = utf8_encode($dados['ESPECIALIDADE']);
		  $lista[] = $campo;		
		}	
		$obj = json_encode($lista);	
			echo $obj;
	endif;
}

function ListarLogin($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select = "SELECT * FROM {$Tabela}{$Condicao}";
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(!ociExecute($stmt)){  
		echo json_encode(2);
	}else{
		 $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_USUARIO'] = $dados['ID_USUARIO'];
			$campo['LOGIN']      = $dados['LOGIN'];			
		  $lista[] = $campo;						
		}	
			$obj = json_encode($lista);	
			echo $obj;
	}	
}

function ListarSubMenus($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select = "SELECT * FROM {$Tabela}{$Condicao}";
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(ociExecute($stmt)):  
		 $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_SUB_MENUS']   = $dados['ID_SUB_MENUS'];
			$campo['NOME_SUB_MENUS'] = utf8_encode($dados['NOME_SUB_MENUS']);
		  $lista[] = $campo;		
		}	
		$obj = json_encode($lista);	
			echo $obj;
	endif;
}

function ListarPrestadores($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select = "SELECT * FROM {$Tabela}{$Condicao}";
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(ociExecute($stmt)):  
		 $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_PRESTADOR']   = $dados['ID_PRESTADOR'];			
			$campo['NOME_PRESTADOR'] = $dados['NOME_PRESTADOR'];
		  $lista[] = $campo;		
		}	
		$obj = json_encode($lista);	
			echo $obj;
	endif;
}

function ListarQuestao($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select = "SELECT * FROM {$Tabela}{$Condicao}";
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(ociExecute($stmt)):  
		 $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_QUESTAO']       = $dados['ID_QUESTAO'];
			$campo['CAMPO_TEXTO']      = utf8_encode($dados['CAMPO_TEXTO']);
			$campo['RESPOSTA_PADRAO']  = $dados['RESPOSTA_PADRAO'];
			$campo['RESPOSTA_NPADRAO'] = $dados['RESPOSTA_NPADRAO'];
			$campo['ID_ESPECIALIDADE'] = $dados['ID_ESPECIALIDADE'];
			$campo['ID_PRESTADOR']     = $dados['ID_PRESTADOR'];
			$campo['ID_SUB_MENUS']	   = $dados['ID_SUB_MENUS'];
			$campo['RESPOSTAS']	       = $dados['RESPOSTAS'];
			$campo['OBSERVACAO']	   = utf8_encode($dados['OBSERVACAO']);			
		    $lista[] = $campo;		
		}	
		$obj = json_encode($lista);	
			echo $obj;
	endif;
}

function ListarQuestaoPDF($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select = "SELECT * FROM {$Tabela}{$Condicao}";
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(ociExecute($stmt)):  
		 $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_QUESTAO']       = $dados['ID_QUESTAO'];
			$campo['CAMPO_TEXTO']      = utf8_encode($dados['CAMPO_TEXTO']);
			$campo['RESPOSTA_PADRAO']  = $dados['RESPOSTA_PADRAO'];
			$campo['RESPOSTA_NPADRAO'] = $dados['RESPOSTA_NPADRAO'];
			$campo['ID_ESPECIALIDADE'] = $dados['ID_ESPECIALIDADE'];
			$campo['ID_PRESTADOR']     = $dados['ID_PRESTADOR'];
			$campo['ID_SUB_MENUS']	   = $dados['ID_SUB_MENUS'];
			$campo['RESPOSTAS']	       = $dados['RESPOSTAS'];
			$campo['OBSERVACAO']	   = utf8_encode($dados['OBSERVACAO']);			
		    $lista[] = $campo;		
		}	
		$obj = json_encode($lista);	
			print_r($obj);
	endif;
}

function ListarQuestaoConforto($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select = "SELECT * FROM {$Tabela}{$Condicao}";		
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(ociExecute($stmt)):  
		 // $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_QUESTAO']       = $dados['ID_QUESTAO'];
			$campo['CAMPO_TEXTO']      = utf8_encode($dados['CAMPO_TEXTO']);
			$campo['RESPOSTA_PADRAO']  = $dados['RESPOSTA_PADRAO'];
			$campo['RESPOSTA_NPADRAO'] = $dados['RESPOSTA_NPADRAO'];
			$campo['ID_ESPECIALIDADE'] = $dados['ID_ESPECIALIDADE'];
			$campo['ID_PRESTADOR']     = $dados['ID_PRESTADOR'];
			$campo['ID_SUB_MENUS']	   = $dados['ID_SUB_MENUS'];
			$campo['CERTIFICACAO']     = $dados['CERTIFICACAO'];
			$campo['RESPOSTAS']	       = $dados['RESPOSTAS'];
			$campo['OBSERVACAO']	   = utf8_encode($dados['OBSERVACAO']);
			$campo['RESPOSTA_TEXTO']   = utf8_encode($dados['RESPOSTA_TEXTO']);	
		    $lista[] = $campo;		
		}	
		$obj = json_encode(["data" =>$lista]);	
			echo $obj;
	endif;
}

function FiltroSubMenu($Tabela, $Condicao = null){
	header("Content-Type: application/json; charset=utf-8");   
	$Connect = Conexao();	 
	$select = "SELECT * FROM {$Tabela}{$Condicao}";	
	$stmt =  oci_parse($Connect,$select) or die ("erro ao buscar listar.");	
	if(ociExecute($stmt)):  
		 $cont = 0;	
		 $array = array();
		while($dados = oci_fetch_array($stmt)){
			$array[] = $dados;			
			$campo['ID_SUB_MENUS']   = $dados['ID_SUB_MENUS'];
			$campo['NOME_SUB_MENUS'] =  utf8_encode($dados['NOME_SUB_MENUS']);			
		  $lista[] = $campo;		
		}	
		$obj = json_encode($lista);	
			echo $obj;
	endif;
}

function Inserir($Tabela,$id,$Dados ){
 header('Content-type: text/html; charset=iso-8859-1');
	$Connect = Conexao();
	$fields = implode(", ",array_keys($Dados));
	$values = "'".implode("', '",array_values($Dados))."'";		
	$insert = "INSERT INTO {$Tabela} ($id,$fields) VALUES (OBJ_SEQUENCE.NEXTVAL,$values)";	
	// print_r($insert);
	$stmt = ociparse($Connect,$insert)or die("erro ao inserir.");
	$linha = ociExecute($stmt);	
	return $linha;
}

function Excluir($Tabela, $Condicao){
	$Connect = Conexao();
	$excluir = "DELETE FROM {$Tabela} {$Condicao}";
	$stmt = ociparse($Connect,$excluir)or die("erro ao excluir.");
	$linha = ociExecute($stmt);	
	return $linha;		
}

function Alterar($Tabela,array $Dados, $Condicao){
	$Connect = Conexao();
	foreach($Dados as $fields => $values){
			$campos[] = "$fields = '$values'";
		}
		$campos = implode(", ",$campos);
	$alterar = "UPDATE {$Tabela} SET {$campos} WHERE {$Condicao}";	
	
	$stmt = ociparse($Connect,$alterar)or die("erro ao alterar campo.");
	$linha = ociExecute($stmt);	
	return $linha;
}


?>