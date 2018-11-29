<?php
namespace Components\Module_comum;

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
use Bcrypt\Bcrypt;

class LoginComponent implements IComponents{
    // Indispensável para solicitações Ajax
    
    public static function ajax(){
        if(isset($_REQUEST['acaoAjax'])){
            $method = isset($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $loginComponent = new LoginComponent();
            $loginComponent->show($method);
        }
    }
    // Fim método responsável pelas solicitações Ajax
    public function show($method) {
        switch ($method) {
            case 'indexController':
                $this->indexController();

                break;
            case 'autenticar':
                $this->autenticar();
                break;
            
            case 'logout':
                $this->logout();
                break;
            
            default:
                break;
        }    
    }
    
    public function indexController() {
        echo '
        <div id="inserir">
        <form method="post" name="frm_login">
        <br/><h1>LOGIN ADM</h1><br/>
        <input type="hidden" name="acaoAjax" value="autenticar" />
        
            <input type="text" class="insira" placeholder="Insira seu email..." name="email" id="login" />
            <input type="password" class="insira" name="senha"  placeholder="Insira sua senha..." id="senha" />
            <input type="button" name="btn_login" id="btn_login" value="Entrar">
            <div id="resultado"></div>';

      
        
        echo "<a href=# Onclick=document.location='?component=CadastroUsuarioComponent&method=indexController'>Cadastre-se</a>";

          echo'</form>';
        echo"</div>";
        
    }
    
    public function autenticar(){
        sleep(2); // pausa de 2 segundos no código
        $usuario = new Usuario();
        $arrayUsuario = $usuario->select("and email_usu='{$_REQUEST['login']}'");
        $senha_usuario = $_POST['senha'];

        if(count($arrayUsuario) > 0){
            if($arrayUsuario[0]['cod_status_usu'] == 'A' && Bcrypt::check($senha_usuario, $arrayUsuario[0]['senha_usu'])){
               //echo '<font color=blue>Usuário Logado!</font>';
                // Buscando o tipo de usuário
                $tipoUsuario = new TipoUsuario();
                $arrayTipoUsuario = $tipoUsuario->select("and cod_tipo_usu='{$arrayUsuario[0]['cod_tipo_usu']}'");
                // Gravando dados na sessão
                $_SESSION['nome_usu'] = $arrayUsuario[0]['nome_usu'];
                $_SESSION['cpf_usu'] = $arrayUsuario[0]['cpf_usu'];
                $_SESSION['email_usu'] = $arrayUsuario[0]['email_usu'];
                $_SESSION['senha_usu'] = $arrayUsuario[0]['senha_usu']; 
                $_SESSION['cod_status_usu'] = $arrayUsuario[0]['cod_status_usu'];
                $_SESSION['cod_usu'] = $arrayUsuario[0]['cod_usu'];
                $_SESSION['nome_tipo_usu'] = $arrayTipoUsuario[0]['nome_tipo_usu'];
                $_SESSION['cod_status_tipo_usu'] = $arrayTipoUsuario[0]['cod_status_tipo_usu'];
                $_SESSION['cod_tipo_usu'] = $arrayTipoUsuario[0]['cod_tipo_usu'];
                $this->loadPerfil($arrayTipoUsuario[0]['nome_tipo_usu']);
            }else{
                echo '<font color=white>Conta inativa ou senha incorreta, procure o administrador do site!</font>';
            }    
        }else{
            echo '<font color=white>Usuário não encontrado!</font>';
        }  
    }
    
    private function loadPerfil($tipoUsuario){
        switch($tipoUsuario) {
            case 'ADM':
                $url = "admin.php";
                break;
            case 'ALU':
                $url = "aluno.php";
                break;
            case 'SEC':
                $url = "secretaria.php";
                break;
            default:
                break;                 
        }
        echo '<script>';
            echo "location.href='{$url}'";
        echo '</script>';   
    }
    public function logout() {
        session_destroy();
        echo '<script>';
        echo "location.href = 'login.php'";
        echo '</script>';
    }
}

LoginComponent::ajax();
