<?php
namespace Components\Module_comum;
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
if(!session_start()){
    session_start();
}
use Components\IComponents;
use Core\Usuario;
use Core\TipoUsuario;
use Core\Formacao;
use Bcrypt\Bcrypt;

class CadastroUsuarioComponent implements IComponents {
    
     public static function ajax(){
        if(isset($_REQUEST['acaoAjax']) and !isset($_POST['btnCadastrarUsuario'])){
            $method = isset($_REQUEST['acaoAjax'])?$_REQUEST['acaoAjax']:NULL;
            $cadastroUsuarioComponent = new CadastroUsuarioComponent();
            $cadastroUsuarioComponent->show($method);
        }
    }
    // Fim método responsável pelas solicitações Ajax
    public function show($method) {
        switch ($method){
            case 'indexController':
                $this->indexController();
                break;          
            case 'validarCpfCadastrado':

                $this->validarCpfCadastrado();
                break;
            case 'cadastrarUsuario':
                $this->cadastrarUsuario();
                break;
            case 'posCadastroUsuario':
                $this->posCadastroUsuario();
           
            
            default:
                break;
        }    
    }
    
    public function indexController() {
        echo '<div id="inserir">
        <form method="post" name="frmCadastroUsuario" id="frmCadastroUsuario">
        <input type="hidden" name="acaoAjax" value="validarCpfCadastrado" />
        <input type="hidden" name="component" value="CadastroUsuarioComponent" />
        <input type="hidden" name="method" value="cadastrarUsuario" />

        <h1>CADASTRO</h1><br/>

            <input type="text" class="insira" placeholder="Nome completo..." name="nome" id="nome" />
            
            <input type="text" class="insira"  name="cpf" placeholder="Insira seu CPF..." id="cpf" />
            
            <input type="email" class="insira"  name="email" placeholder="Insira seu email..." id="email" />
            
            <input type="password" class="insira" placeholder="Insira sua senha..." name="senha" id="senha" />
            
            <input type="password" class="insira" placeholder="Confirme sua senha..." name="confsenha" id="confsenha"/>
            
            <!--<button type="button" name="btn_cadastro" id="btn_cadastro">Cadastrar</button>-->
           <input type="submit" value="Cadastrar" name="btnCadastrarUsuario" id="btnCadastrarUsuario" />
           <a href = "login.php" name="Voltar">Já possui uma conta?</a>
        </form>
    </div>
    <div id="resultado"></div>';
        
    echo '<script src="js/jsCadastroUsuarioComponent.js" type="text/javascript"></script>';     
    }
    
    public function validarCpfCadastrado(){
        //Recebe os elementos via GET
        $cpf = $_REQUEST['cpf']; 
        
        $usuario = new Usuario();
        $arrayUsuario = $usuario->select("and cpf_usu='{$cpf}'");
        
        //Aqui voc� verifica em seu banco de dados, se o login j� foi cadastrado.
        //Como exemplo vou verificar se o valor digitado está no array
       // if (in_array($email, $logins_cadastrados)){
        if(count($arrayUsuario)> 0){
        //Se o login já existir você exibe false
            echo 'false';
        }else if(!preg_match('/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/',$cpf)){
            echo 'false';
        }else{
        //Se o login não existir você exibe true
            echo 'true';
        }    
        exit();
    }
    
    public function cadastrarUsuario(){
        $tipoUsuario =  new TipoUsuario();
        $formacao = new Formacao();
        $arrayTipoUsuario = $tipoUsuario->select("and nome_tipo_usu='ADM'");
        $arrayFormacao = $formacao->select("and nome_forma='SDE'");
        $usuario = new Usuario();
        $usuario->setNomeUsu($_REQUEST['nome']);
        $usuario->setCpfUsu($_REQUEST['cpf']);
        $usuario->setEmailUsu($_REQUEST['email']);
        $usuario->setSenhaUsu(Bcrypt::hash($_REQUEST['senha']));
        $usuario->setCodForma($arrayFormacao[0]['cod_forma']);
        $usuario->setCodTipoUsu($arrayTipoUsuario[0]['cod_tipo_usu']);
        $usuario->setCodStatusUsu('I');

        if($usuario->insert()->rowCount() > 0){
            $msg = ' Cadastro efetuado, aguarde o contato do Administrador.';
            //echo 'Você está cadastrado, aguarde o contato do administrador!';
        }else{
            $msg = ' Não foi possível efetuar seu cadastro, retorne mais tarde!';
           // echo 'Não foi possível efetuar seu cadastro, retorne mais tarde!';
        } 
       $this->posCadastroUsuario($msg);
        $_SESSION['msg'] = $msg;
        echo '<script>';
        echo "location.href='?component=CadastroUsuarioComponent&method=posCadastroUsuario'";
        echo '</script>';
 }
 
 
 private function posCadastroUsuario(){
     echo '<p style="color:white;font-family:verdana;font-size:25px;margin-left:35px;">'. $_SESSION['msg'].'</p><br/>';
     echo "<p><a href=# OnClick=document.location='?component=CadastroUsuarioComponent&method=indexController'>Voltar</a><p>";
 }
}
CadastroUsuarioComponent::ajax();