<?php
setcookie('mob',3, time()+99604800,'/','.'.$_SERVER['SERVER_NAME']);
header('Content-type: text/css; charset: UTF-8');header('Cache-Control: public, max-age=14515200');
$dir='pro100';
//Далее обработка gzip
$HTTP_ACCEPT_ENCODING=htmlspecialchars($_SERVER["HTTP_ACCEPT_ENCODING"],ENT_QUOTES);
if(strpos($HTTP_ACCEPT_ENCODING,'x-gzip')!==false)$encoding='x-gzip';
else if(strpos($HTTP_ACCEPT_ENCODING,'gzip')!==false)$encoding='gzip';
else $encoding=false;

$common_default_css=['def'/*,'z-index','colorbox'*/];
$all_default_css=[/*'frame','common','menu','color','form','slider'*/];

$cache_dir='../cache_all/'.$dir.'/css/';
//далее обрабатываем условие по умолчанию баз GET запроса
if(!isset($_GET['add'])){$cache_file='Def';
	if(file_exists($cache_dir.$cache_file.'.tmp')){
	$css=file_get_contents($cache_dir.$cache_file.'.tmp');	
		if($encoding){header('Content-Encoding: '.$encoding);
		echo("\x1f\x8b\x08\x00\x00\x00\x00\x00");
		$css=gzcompress($css,3);}
	}else{ob_start();
	foreach($common_default_css as $val){include'../css/'.$val.'.css';}
	foreach($all_default_css as $val){include'../css/'.$dir.'/'.$val.'.css';}
		$css=ob_get_contents();ob_end_clean();
	$css=preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!','',$css);
	$css=str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),'',$css);
	$css='@charset "utf-8";'.$css;
	$handle=fopen($cache_dir.$cache_file.'.tmp','w');fwrite($handle,$css);fclose($handle);
		if($encoding){header('Content-Encoding: '.$encoding);
		echo("\x1f\x8b\x08\x00\x00\x00\x00\x00");
		$css=gzcompress($css,3);}
	}
}else{
	$add=htmlspecialchars($_GET['add'],ENT_QUOTES);
	if(!preg_match("/[^a-z]+/",$add)){$cache_file=$add;
		if(file_exists($cache_dir.$cache_file.'.tmp')){
		//выводить если файл есть
		$css=file_get_contents($cache_dir.$cache_file.'.tmp');	
		if($encoding){header('Content-Encoding: '.$encoding);
		echo("\x1f\x8b\x08\x00\x00\x00\x00\x00");
		$css=gzcompress($css,3);}
		}else{
			$bad_css=0;
			switch($add){//что-б небыло ошибки при отсутствия файла
				case'specialcss':
				$special_css='specialcss';break;
				default:$bad_css=1;break;
			}//switch
			if(!$bad_css){
			if(file_exists($cache_dir.'Def.tmp')){
				ob_start();
				include'../css/'.$dir.'/'.$cache_dir.'Def.tmp';
				include'../css/'.$dir.'/'.$special_css.'.css';
				$css=ob_get_contents();ob_end_clean();
				$css=preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!','',$css);
				$css=str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),'',$css);
				$handle=fopen($cache_dir.$cache_file.'.tmp','w');fwrite($handle,$css);fclose($handle);
				if($encoding){header('Content-Encoding: '.$encoding);
				echo("\x1f\x8b\x08\x00\x00\x00\x00\x00");
				$css=gzcompress($css,3);}
			}else{//нет tmp вообще
				ob_start();
				foreach($common_default_css as $val){include'../css/'.$val.'.css';}
				foreach($all_default_css as $val){include'../css/'.$dir.'/'.$val.'.css';}
				include'../css/'.$dir.'/'.$special_css.'.css';
				$css=ob_get_contents();ob_end_clean();
				$css=preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!','',$css);
				$css=str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),'',$css);
				$css='@charset "utf-8";'.$css;
				$handle=fopen($cache_dir.$cache_file.'.tmp','w');fwrite($handle,$css);fclose($handle);
				if($encoding){header('Content-Encoding: '.$encoding);
				echo("\x1f\x8b\x08\x00\x00\x00\x00\x00");
				$css=gzcompress($css,3);}
			}
			}//!$bad_css
		}
	}
}//isset($_GET['add'])
echo $css;