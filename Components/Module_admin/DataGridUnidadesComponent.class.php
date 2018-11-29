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
use Core\Unidade;


class DataGridUnidadesComponent implements IComponents{
    public static function ajax(){
        if(isset($_REQUEST['acaoAjax'])){
            $method = isset($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $dataGridUnidadesComponent = new DataGridUnidadesComponent();
            $dataGridUnidadesComponent->show($method);
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
        $unidade = new Unidade();
        $arrayUnidades = $unidade->select();
        echo "<table border='1'>";
        echo "<caption>Unidades</caption>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Nome</th>";
        echo "<th>Email</th>";
        echo "<th>Número</th>";
        echo "<th>CEP</th>";
        echo "<th>Descrição</th>";
        echo "<th>Telefone</th>";
        echo "<th>Complemento</th>";
        echo "<th>Código Status</th>";
        echo "<th colspan = '2'>Ações</th>";
        echo "</tr>";
        
        foreach ($arrayUnidades as $key => $uni){
            echo "<tr>";
            echo "<td>{$uni['cod_uni']}</td>";
            echo "<td>{$uni['nome_uni']}</td>";
            echo "<td>{$uni['email_uni']}</td>";
            echo "<td>{$uni['num_uni']}</td>";
            echo "<td>{$uni['cep_uni']}</td>";
            echo "<td>{$uni['desc_uni']}</td>";
            echo "<td>{$uni['tel_uni']}</td>";
            echo "<td>{$uni['compl_uni']}</td>";
            echo "<td>{$uni['cod_status_uni']}</td>";
            echo "<td><a href=# onClick=document.location='?component=DataGridUnidadesComponent&method=frmEditUser&cod_unidade={$uni['cod_uni']}'>Editar</a></td>";
            echo "<td><a href=#>Excluir</a></td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
    public function frmEditUser(){
        $unidade = new Unidade();
        $arrayUnidade = $unidade->select("and cod_uni='{$_REQUEST['cod_unidade']}'");
        echo "<form>";
        echo "<label>Código </label><input type=text name=cod_uni value={$arrayUnidade[0]['cod_uni']} disabled><br>";
        echo "<label>Nome </label><textarea name=nome_uni value={$arrayUnidade[0]['nome_uni']}>{$arrayUnidade[0]['nome_uni']}</textarea><br>";
        echo "<label>Número </label><input type=text name=num_uni value={$arrayUnidade[0]['num_uni']}><br>";
        echo "<label>CEP</label><input type=text name=cep_uni value={$arrayUnidade[0]['cep_uni']}><br>";
        echo "<label>Descrição </label><textarea name=desc_uni cols=100 rows=35 value={$arrayUnidade[0]['desc_uni']}>{$arrayUnidade[0]['desc_uni']}</textarea><br>";
        echo "<label>Telefone </label><input type=text name=tel_uni value={$arrayUnidade[0]['tel_uni']}><br>";
        echo "<label>Complemento </label><textarea name=compl_uni value={$arrayUnidade[0]['compl_uni']}>{$arrayUnidade[0]['compl_uni']}</textarea><br>";
        echo "<label>Código Status </label><input type=text name=cod_status_uni value={$arrayUnidade[0]['cod_status_uni']}><br>";
        echo "<label></label><input type=submit name=btn_salvar value=Salvar><br>";
        echo "</form>";
    }
    
}
DataGridUnidadesComponent::ajax();