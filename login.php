<?php

require_once 'Components/AComponents.class.php';

class TApplication{
    
    public static function run(){
         $namespaces = array(
                             'Components\Module_admin',
                             'Components\Module_comum',
                             'Components');
         
         $pagina    = isset($_REQUEST['pagina'])?$_REQUEST['pagina']:'login480.html';
         $component = isset($_REQUEST['component'])?$_REQUEST['component']:'LoginComponent';
         $erro404Component = 'Erro404Component';
         $method = isset($_REQUEST['method'])?$_REQUEST['method']:'indexController';
         $pagina = file_get_contents($pagina);
         
         // Obs: Os componentes podem vir de um banco de dados (dado uma página possui 1 ou vários componentes)
         // Temporariamente vamos colocar os componentes em uma array. Veja:
  
         $componentes =  array();
         $componentes[0]['cod_component'] = '1';
         $componentes[0]['nome_component'] = $component;
         $componentes[0]['method_component'] = $method;
         $componentes[0]['marcacao_component'] = '#COMPONENT_LOGIN#';
         
         echo $paginaFinal = AComponents::dinamicPage($namespaces, $componentes, $erro404Component, $pagina);
    }
       
}
TApplication::run();