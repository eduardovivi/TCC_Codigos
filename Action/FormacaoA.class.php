<?php
namespace Action;
use Model\FormacaoM;

/**
 * Description of FormacaoA
 *
 * @author ACAD_ROGERIO_000590
 */
class FormacaoA extends FormacaoM{
    private $sqlInsert = "insert into formacao(nome_forma,
                                              cod_status_forma)
                                              values('%s','%s')";
    
    
    private $sqlUpdate = "update formacao set
                                           nome_forma='%s',
                                           cod_status_forma='%s',
                                           where cod_forma='%s'";
    
    private $sqlDelete = "delete from formacao where cod_forma='%s'";
    
    private $sqlSelect = "select * from formacao where 1=1 %s %s";
// Método para inserir um usuário
    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getNomeForma(),
        $this->getCodStatuForma());
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getNomeForma(),
        $this->getCodStatForma());
        return $this->runQuery($sql);   
    }   
    
    public function delete() {
        $sql = sprintf($this->sqlDelete,
        $this->getCodForma());
        return $this->runQuery($sql);
    }
    
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);
    }
    
    
}
