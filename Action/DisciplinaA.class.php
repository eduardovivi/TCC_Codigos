<?php
namespace Action;
use Model\DisciplinaM;

/**
 * Description of DisciplinaA
 *
 * @author ACAD_ROGERIO_000590
 */
class DisciplinaA extends DisciplinaM{
    private $sqlInsert = "insert into disciplina(nome_disc,
                                              desc_disc,
                                              cod_status_disc)
                                              values('%s','%s','%s')";
    
    
    private $sqlUpdate = "update disciplina set
                                            nome_disc='%s',
                                            desc_disc='%s',
                                            cod_status_disc='%s',
                                            where cod_disc='%s'";
    
    private $sqlDelete = "delete from disciplina where cod_disc='%s'";
    
    private $sqlSelect = "select * from disciplina where 1=1 %s %s";
// Método para inserir um usuário
    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getNomeDisc(),
        $this->getDescDisc(),
        $this->getCodStatusDisc());
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getNomeDisc(),
        $this->getDescDisc(),
        $this->getCodStatusDisc());
        return $this->runQuery($sql);   
    }   
    
    public function delete() {
        $sql = sprintf($this->sqlDelete,
        $this->getCodDisc());
        return $this->runQuery($sql);
    }
    
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);
    }
    
    
}
