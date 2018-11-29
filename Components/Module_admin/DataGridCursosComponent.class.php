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
use Core\Curso;


class DataGridCursosComponent implements IComponents{
    public static function ajax(){
        if(isset($_REQUEST['acaoAjax'])){
            $method = isset($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $dataGridCursosComponent = new DataGridCursosComponent();
            $dataGridCursosComponent->show($method);
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
        $curso = new Curso();

        $arrayCursos = $curso->select();
        echo "<table border='1'>";
        echo "<caption>Cursos</caption>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Nome</th>";
        echo "<th>Descrição</th>";
        echo "<th>Carreira</th>";
        echo "<th>Objetivo</th>";
        echo "<th>Código Status</th>";
        echo "<th>Código Unidade</th>";
        echo "<th colspan = '2'>Ações</th>";
        echo "</tr>";
        
        
        foreach ($arrayCursos as $key => $cur){
            echo "<tr>";
            echo "<td>{$cur['cod_curso']}</td>";
            echo "<td>{$cur['nome_curso']}</td>";
            echo "<td>{$cur['desc_curso']}</td>";
            echo "<td>{$cur['desc_carreira_curso']}</td>";
            echo "<td>{$cur['obj_curso']}</td>";
            echo "<td>{$cur['cod_status_curso']}</td>";

            echo "<td><a href=# onClick=document.location='?component=DataGridCursosComponent&method=frmEditUser&cod_curso={$cur['cod_curso']}'>Editar</a></td>";
            echo "<td><a href=#>Excluir</a></td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
    public function frmEditUser(){
        $curso = new Curso();
        $arrayCurso = $curso->select("and cod_curso='{$_REQUEST['cod_curso']}'");
        echo "<form>";
        echo "<label>Código </label><input type=text name=cod_curso value={$arrayCurso[0]['cod_curso']} disabled><br>";
        echo "<label>Nome </label><textarea name=nome_curso value={$arrayCurso[0]['nome_curso']}>{$arrayCurso[0]['nome_curso']}</textarea><br>";
        echo "<label>Descrição </label><textarea style= largura:228px name=desc_curso cols=100 rows=35 value={$arrayCurso[0]['desc_curso']}>{$arrayCurso[0]['desc_curso']}</textarea><br>";
        echo "<label>Descrição Carreira </label><textarea name=desc_carreira_curso cols=100 rows=35 value={$arrayCurso[0]['desc_carreira_curso']}>{$arrayCurso[0]['desc_carreira_curso']}</textarea><br>";
        echo "<label>Objetivo</label><textarea name=obj_curso cols=100 rows=35 value={$arrayCurso[0]['obj_curso']}>{$arrayCurso[0]['obj_curso']}</textarea><br>";
        echo "<label>Código Status </label><input type=text name=cod_status_curso value={$arrayCurso[0]['cod_status_curso']}><br>";
        echo "<label></label><input type=submit name=btn_enviar value=Salvar><br>";
        echo "</form>";
    }
    
}
DataGridCursosComponent::ajax();