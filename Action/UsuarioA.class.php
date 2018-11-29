<?php
namespace Action;
use Model\UsuarioM;

class UsuarioA extends UsuarioM{
    private $sqlInsert = "insert into usuario(nome_usu,
                                              cpf_usu,
                                              email_usu,
                                              senha_usu,
                                              cod_forma,
                                              cod_tipo_usu,
                                              cod_status_usu)
                                             values('%s','%s','%s','%s','%s','%s','%s')";
    
    
    private $sqlUpdate = "update usuario set
                                           nome_usu='%s',
                                           cpf_usu='%s',
                                           email_usu='%s',
                                           senha_usu='%s',
                                           cod_forma='%s',
                                           cod_tipo_usu='%s',
                                           cod_status_usu='%s'
                                           where cod_usu='%s'";
    
    private $sqlDelete = "delete from usuario where cod_usu='%s'";
    
    private $sqlSelect = "select * from usuario where 1=1 %s %s";
// Método para inserir um usuário
    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getNomeUsu(),
        $this->getCpfUsu(),        
        $this->getEmailUsu(),
        $this->getSenhaUsu(),
        $this->getCodForma(),
        $this->getCodTipoUsu(),
        $this->getCodStatusUsu());
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getNomeUsu(),
        $this->getCpfUsu(),        
        $this->getEmailUsu(),
        $this->getSenhaUsu(),
        $this->getCodForma(),
        $this->getCodTipoUsu(),
        $this->getCodStatusUsu());
        return $this->runQuery($sql);   
    }   
    
    public function delete() {
        $sql = sprintf($this->sqlDelete,
        $this->getCodUsu());
        return $this->runQuery($sql);
    }
    
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);
    }
    
    
}
