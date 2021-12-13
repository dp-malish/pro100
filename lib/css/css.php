<?php
/**
 *
 */
namespace lib\Css;
use lib\Def As Def;

class Css extends Def\Gzip{

    protected $def_css=['default','z-index'];

    private $def_f_name='def';//css имя файла для кеша по умолчанию
    private $def_f_ext='.tmp';//расширение файла css для кеша по умолчанию

    function SendCss($dir,$all_def,$ext=[]){
        if(empty($ext)){// в css нет GET запроса
            $this->SendCssMono($dir,$all_def);
        }else{// css с GET запросом
            echo $this->dir;
        }
    }

    /**
     * @param $dir - каталог с исходным css
     * @param $temp_name_f - имя файла в папке темп без расширения
     * @param $css_arr_f - массив файлов
     * @param int $site_folder_level вложенность папок на сайте /css/ - значит =1, по умолчанию корень сайта =0
     */
    function SendCssSelect($dir,$temp_name_f,$css_arr_f,$site_folder_level=0){
        header('Content-type: text/css; charset: UTF-8');header('Cache-Control: public, max-age=14515200');
        if(file_exists($this->dir.$temp_name_f.$this->def_f_ext)){
            $this->SendGzip(file_get_contents($this->dir.$temp_name_f.$this->def_f_ext));
        }else{
            $site_folder='';
            for($i=0;$i<$site_folder_level;$i++)$site_folder.='../';
            foreach($css_arr_f as $v){$arr_file[]=$site_folder.'../css/'.$dir.'/'.$v.'.css';}
            $css=$this->CashArrFile($arr_file);
            $css=$this->ClearCss($css);
            $this->WriteCss($css,$temp_name_f);
            $this->SendGzip($css);
        }
    }

    private function SendCssMono($dir,$all_def){//отправка css без дополнений
        header('Content-type: text/css; charset: UTF-8');header('Cache-Control: public, max-age=14515200');
        if(file_exists($this->dir.$this->def_f_name.$this->def_f_ext)){
            $this->SendGzip(file_get_contents($this->dir.$this->def_f_name.$this->def_f_ext));
        }else{
            foreach($this->def_css as $v){$arr_file[]='../css/'.$v.'.css';}
            foreach($all_def as $v){$arr_file[]='../css/'.$dir.'/'.$v.'.css';}
            $css=$this->CashArrFile($arr_file);
            $css=$this->ClearCss($css);
            $this->WriteCss($css,$this->def_f_name);
            $this->SendGzip($css);
        }
    }
    final private function ClearCss($css){//сжимает css от пробелов и т.д.
        $css=preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!','',$css);
        $css=str_replace(array("\r\n","\r","\n","\t",'  ','    ','    '),'',$css);
        return '@charset "utf-8";'.$css;
    }
    private function WriteCss($css,$f_name){//Записать css файл параметры: файл-текст и имя файла без расширения
        $handle=fopen($this->dir.$f_name.$this->def_f_ext,'w');fwrite($handle,$css);fclose($handle);
    }
}