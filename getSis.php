<?php

/*****************************
GET HOME
*****************************/

function getHome(){
	$url = $_GET['url'];
	$url = explode('/', $url);
	$url[0] = ($url[0] == NULL ? 'index' : $url[0]);
	
		if(file_exists('tpl/'.$url[0].'.php')){
			 require_once('tpl/'.$url[0].'.php');
		}elseif(file_exists('tpl/'.$url[0].'/'.$url[1].'.php')){
			 require_once('tpl/'.$url[0].'/'.$url[1].'.php');
		}else{
			 require_once('tpl/404.php');
		}
}


/*****************************
GET THUMB
*****************************/

	function getThumb($img, $titulo, $alt, $w, $h, $grupo = NULL, $dir = NULL, $link = NULL){
		$grupo 	= ($grupo != NULL ? "[$grupo]" : "");
		$dir 	= ($dir != NULL ? "$dir" : "midias");
		$verDir = explode('/',$_SERVER['PHP_SELF']);
		$urlDir = (in_array('admin',$verDir) ? '../' : '');
		
		if(file_exists($urlDir.$dir.'/'.$img)){
			if($link == ''){
				echo '
					<a href="'.BASE.'/'.$dir.'/'.$img.'" rel="shadowbox'.$grupo.'" title="'.$titulo.'">
						<img src="'.BASE.'/tim.php?src='.BASE.'/'.$dir.'/'.$img.'&w='.$w.'&h='.$h.'&zc=1&q=100" 
						title="'.$titulo.'" alt="'.$alt.'">
					</a>
				';
			}elseif($link == '#'){
				echo '
						<img src="'.BASE.'/tim.php?src='.BASE.'/'.$dir.'/'.$img.'&w='.$w.'&h='.$h.'&zc=1&q=100" 
						title="'.$titulo.'" alt="'.$alt.'">
				';
			}else{
				echo '
					<a href="'.$link.'" title="'.$titulo.'">
						<img src="'.BASE.'/tim.php?src='.BASE.'/'.$dir.'/'.$img.'&w='.$w.'&h='.$h.'&zc=1&q=100" 
						title="'.$titulo.'" alt="'.$alt.'">
					</a>
				';
			}
		}else{
			echo '
				<img src="'.BASE.'/tim.php?src='.BASE.'/images/default.jpg&w='.$w.'&h='.$h.'&zc=1&q=100" 
				title="'.$titulo.'" alt="'.$alt.'">
				';
		}
	}
	
/*****************************
GET CAT
*****************************/	
	
	function getCat($catId, $campo = NULL){
		$categoria	   = mysql_real_escape_string($catId);
		$readCategoria = read('up_cat',"WHERE id = '$categoria'");	
		if($readCategoria){
			if($campo){
				foreach($readCategoria as $cat){
					return $cat[$campo];	
				}
			}else{
				return $readCategoria;
			}
		}else{
			return 'Erro ao ler categoria';	
		}
	}
	
/*****************************
GET AUTOR
*****************************/	

	function getAutor($autorId, $campo = NULL){
		$autorId = mysql_real_escape_string($autorId);
		$readAutor = read('up_users',"WHERE id = '$autorId'");		
		if($readAutor){
			foreach($readAutor as $autor);
			
			if(!$autor['foto']):			
				$gravatar  = 'http://www.gravatar.com/avatar/';
				$gravatar .= md5(strtolower(trim($autor['email'])));
				$gravatar .= '?d=mm&s=180';
				$autor['foto'] = $gravatar;
			endif;

			if(!$campo){
				return $autor;	
			}else{
				return $autor[$campo];
			}
			
		}else{
			echo 'Erro ao ler autor';
		}
	}	
?>