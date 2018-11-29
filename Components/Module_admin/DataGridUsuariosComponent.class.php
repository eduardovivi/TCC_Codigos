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
use Core\Usuario;
use Core\TipoUsuario;

class DataGridUsuariosComponent implements IComponents{
    public static function ajax(){
        if(isset($_REQUEST['acaoAjax'])){
            $method = isset($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $dataGridUsuariosComponent = new DataGridUsuariosComponent();
            $dataGridUsuariosComponent->show($method);
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
        $usuario = new Usuario();
        $arrayUsuarios = $usuario->select();
        echo "<table border='1'>";
        echo "<caption>Usuários Cadastros</caption>";
        echo "<tr>";
        echo "<th>Código</th>";
        echo "<th>Nome</th>";
        echo "<th>CPF</th>";
        echo "<th>Email</th>";
        echo "<th>Senha</th>";
        echo "<th>Código Status</th>";
        echo "<th>Formação</th>";
        echo "<th>Tipo Usuário</th>";
        echo "<th colspan = '2'>Ações</th>";
        echo "</tr>";
        
        foreach ($arrayUsuarios as $key => $usu){
            echo "<tr>";
            echo "<td>{$usu['cod_usu']}</td>";
            echo "<td>{$usu['nome_usu']}</td>";
            echo "<td>{$usu['cpf_usu']}</td>";
            echo "<td>{$usu['email_usu']}</td>";
            echo "<td>{$usu['senha_usu']}</td>";
            echo "<td>{$usu['cod_status_usu']}</td>";
            echo "<td>{$usu['cod_forma']}</td>";
            echo "<td>{$usu['cod_tipo_usu']}</td>";
            echo "<td><a href=# onClick=document.location='?component=DataGridUsuariosComponent&method=frmEditUser&cod_usu={$usu['cod_usu']}'>Editar</a></td>";
            echo "<td><a href=#>Excluir</a></td>";
            echo "</tr>";
        }
        
        echo "</table>";
    }
    public function frmEditUser(){
        $usuario = new Usuario();
        $arrayUsuario = $usuario->select("and cod_usu='{$_REQUEST['cod_usu']}'");
        echo "<form>";
        echo "<label>Código </label><input type=text name=cod_usu value={$arrayUsuario[0]['cod_usu']} disabled><br>";
        echo "<label>Nome </label><input type=text name=nome_usu value={$arrayUsuario[0]['nome_usu']} disabled><br>";
        echo "<label>CPF </label><input type=text name=cpf_usu value={$arrayUsuario[0]['cpf_usu']}><br>";
        echo "<label>Email</label><input type=text name=email_usu value={$arrayUsuario[0]['email_usu']}><br>";
        echo "<label>Senha </label><input type=text name=senha_usu value={$arrayUsuario[0]['senha_usu']} disabled><br>";
        echo "<label>Código Status </label><input type=text name=cod_status_usu value={$arrayUsuario[0]['cod_status_usu']}><br>";
        echo "<label></label><input type=submit name=btn_enviar value=Salvar><br>";
        echo "</form>";
    }
    
}
DataGridUsuariosComponent::ajax();