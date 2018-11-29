<?php
namespace Action;
use Model\UnidadeM;

/**
 * Description of UnidadeA
 *
 * @author ACAD_ROGERIO_000590
 */
class UnidadeA extends UnidadeM{
    private $sqlInsert = "insert into unidade(nome_uni,
                                              email_uni,
                                              num_uni,
                                              cep_uni,
                                              desc_uni,
                                              tel_uni,
                                              compl_uni,
                                              cod_status_uni,
                                              cod_usu)
                                             values('%s','%s','%s','%s','%s','%s','%s','%s','%s')";
    
    
    private $sqlUpdate = "update unidade set
                                           nome_uni='%s',
                                           email_uni='%s',
                                           num_uni='%s',
                                           cep_uni='%s',
                                           desc_uni='%s',
                                           tel_uni='%s',
                                           compl_uni='%s',
                                           cod_status_uni='%s',
                                           cod_usu='%s'
                                           where cod_uni='%s'";
    
    private $sqlDelete = "delete from unidade where cod_uni='%s'";
    
    private $sqlSelect = "select * from unidade where 1=1 %s %s";
// Método para inserir um usuário
    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getNomeUni(),
        $this->getEmailUni(),
        $this->getNumUni(),
        $this->getCepUni(),
        $this->getDescUni(),
        $this->getTelUni(),
        $this->getComplUni(),
        $this->getCodStatusUni(),
        $this->getCodUsu());
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getNomeUni(),
        $this->getEmailUni(),
        $this->getNumUni(),
        $this->getCepUni(),
        $this->getDescUni(),
        $this->getTelUni(),
        $this->getComplUni(),
        $this->getCodStatusUni(),
        $this->getCodUsu());
        return $this->runQuery($sql);   
    }   
    
    public function delete() {
        $sql = sprintf($this->sqlDelete,
        $this->getCodUni());
        return $this->runQuery($sql);
    }
    
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);
    }
    
    
}
