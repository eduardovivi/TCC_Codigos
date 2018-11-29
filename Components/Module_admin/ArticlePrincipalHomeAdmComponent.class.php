<?php
namespace Components\Module_admin;

if(!session_start()){
    session_start();
}

// Indispensável para as solicitaçoes ajax (javascript)
if(!defined('DS')){
   define('DS',DIRECTORY_SEPARATOR); 
}
if(!defined('ROOT')){
   define('ROOT',  str_replace('/', '\\', $_SERVER['DOCUMENT_ROOT'])); 
}
if(!defined('SITE_ROOT')){
    define('SITE_ROOT',ROOT.DS.'TCC_Codigos');
}
require_once (SITE_ROOT.DS.'autoload.php');
// fim do include para o ajax

use Components\IComponents;

class ArticlePrincipalHomeAdmComponent implements IComponents{
    public static function ajax(){
        if(isset($_REQUEST['acaoAjax'])){
            $method = isset($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $articlePrincipalHomeAdmComponent = new ArticlePrincipalHomeAdmComponent();
            $articlePrincipalHomeAdmComponent->show($method);
        }
    }
    public function show($method){
        switch ($method) {
            case 'indexController':
                $this->indexController();
            break;
            default:
                break;
        }   
    }
    public function indexController(){
        echo '<p style="font-family=verdana;color=blue">Conteúdo Principal da Home-Page do Administrador</p>';
    }
}
ArticlePrincipalHomeAdmComponent::ajax();