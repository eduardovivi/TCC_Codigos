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
use Core\Noticia;


class DataGridNoticiasComponent implements IComponents{
    public static function ajax(){
        if(isset($_REQUEST['acaoAjax'])){
            $method = isset($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $dataGridNoticiasComponent = new DataGridNoticiasComponent();
            $dataGridNoticiasComponent->show($method);
        }
    }
    public function show($method){
        switch ($method) {
            case 'indexController':
                $this->indexController();
            break;
            case 'frmEditUser':
                $this->frmEditUser();
            break;
            default:
                break;
        }   
    }
    public function indexController(){
        $noticia = new Noticia();

        $arrayNoticias = $noticia->select();
        echo "<table border='1'>";
        echo "<caption>Noticias</caption>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Título</th>";
        echo "<th>Autor</th>";
        echo "<th>Data e Hora</th>";
        echo "<th>Texto</th>";
        echo "<th>Código Status</th>";

        echo "<th colspan = '2'>Ações</th>";
        echo "</tr>";
        
        
        foreach ($arrayNoticias as $key => $cur){
            echo "<tr>";
            echo "<td>{$cur['cod_not']}</td>";
            echo "<td>{$cur['titulo_not']}</td>";
            echo "<td>{$cur['autor_not']}</td>";
            echo "<td>{$cur['data_hora_not']}</td>";
            echo "<td>{$cur['texto_not']}</td>";
            echo "<td>{$cur['cod_status_not']}</td>";

            echo "<td><a href=# onClick=document.location='?component=DataGridNoticiasComponent&method=frmEditUser&cod_noticia={$cur['cod_not']}'>Editar</a></td>";
            echo "<td><a href=#>Excluir</a></td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
    public function frmEditUser(){
        $noticia = new Noticia();
        $arrayNoticia = $noticia->select("and cod_not='{$_REQUEST['cod_not']}'");
        echo "<form>";
        echo "<label>Código </label><input type=text name=cod_not value={$arrayNoticia[0]['cod_not']} disabled><br>";
        echo "<label>Nome </label><textarea name=titulo_not value={$arrayNoticia[0]['titulo_not']}>{$arrayNoticia[0]['titulo_not']}</textarea><br>";
        echo "<label>Descrição </label><textarea name=autor_not cols=100 rows=35 value={$arrayNoticia[0]['autor_not']}>{$arrayNoticia[0]['autor_not']}</textarea><br>";
        echo "<label>Descrição Carreira </label><textarea name=data_hora_not cols=100 rows=35 value={$arrayNoticia[0]['data_hora_not']}>{$arrayNoticia[0]['data_hora_not']}</textarea><br>";
        echo "<label>Objetivo</label><textarea name=texto_not cols=100 rows=35 value={$arrayNoticia[0]['texto_not']}>{$arrayNoticia[0]['texto_not']}</textarea><br>";
        echo "<label>Código Status </label><input type=text name=cod_status_not value={$arrayNoticia[0]['cod_status_not']}><br>";
        echo "<label></label><input type=submit name=btn_enviar value=Salvar><br>";
        echo "</form>";
    }
    
}
DataGridNoticiasComponent::ajax();