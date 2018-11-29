<?php
//define('WWW_ROOT', dirname(__FILE__));
//define('DS',DIRECTORY_SEPARATOR);
//require_once (WWW_ROOT.DS.'autoload.php');
if(!defined('DS')){
     define('DS', DIRECTORY_SEPARATOR);  
 }
if(!defined('ROOT')){
   define('ROOT', str_replace('/', '\\',$_SERVER['DOCUMENT_ROOT'])); 
}
if(!defined('SITE_ROOT')){
    define('SITE_ROOT',ROOT.DS.'TCC_Codigos'); 
}
require_once (SITE_ROOT.DS.'autoload.php');
/**
 * Description of NewComponent
 *
 * @author Dell
 */
abstract class AComponents {
    
    static public function dinamicPage($namespaces,$componentes,$erro404Component,$template){
         $conteudos = array();
         $marcacoesTemplate = array();
        $i = 0;
        while ($i < count($componentes)) {
              ob_start();
                $c = AComponents::newComponent($namespaces,$componentes[$i]['nome_component'],$erro404Component);
                $c->show($componentes[$i]['method_component']);
                $conteudos[] = $content = ob_get_contents();
                $marcacoesTemplate[] = $componentes[$i]['marcacao_component'];
    	     ob_end_clean();
             $i++;   
        }
        $paginaFinal = AComponents::mountPage($marcacoesTemplate,$template,$conteudos);
        return $paginaFinal;
            
    }
    
    static private function newComponent($namespaces,$component,$erro404Component) {
        $cont = 0;
        if(!empty($namespaces)){
          foreach ($namespaces as $namespace){
		if(file_exists("{$namespace}/{$component}.class.php")){
                    $cont++;
                    $c = $namespace.'\\'.$component;
                    $c = new $c;
		}
	    }
            if($cont == 0){
                $c = $namespace.'\\'.$erro404Component;
                $c = new $c; 
            }  
        }else{
             $c = $namespace.'\\'.$erro404Component;
             $c = new $c;      
        }
   return $c; 
 }
 
 static private function mountPage($marcacoesTemplate,$template,$conteudos) {
             
                $i=0;
                 foreach ($marcacoesTemplate as $marcacao) {
                     if($i == 0){
                        $paginaFinal = str_replace($marcacao,$conteudos[$i],$template);
                     }
                    else{
                        $paginaFinal = str_replace($marcacao, $conteudos[$i], $paginaFinal);  
                    }     
                    $i++;
                 }  
            return $paginaFinal;
 }
 
 
}
