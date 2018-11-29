<?php
namespace Action;
use Model\DepoimentoM;

/**
 * Description of DepoimentoA
 *
 * @author ACAD_ROGERIO_000590
 */
class DepoimentoA extends DepoimentoM{
    private $sqlInsert = "insert into depoimento(autor_dep
                                              text_dep,
                                              data_hora_dep,
                                              cod_curso,
                                              cod_usu,
                                              cod_status_dep)
                                              values('%s','%s','%s','%s','%s','%s')";
    
    
    private $sqlUpdate = "update depoimento set
                                            autor_dep='%s',
                                            text_dep='%s',
                                            data_hora_dep='%s',
                                            cod_curso='%s',
                                            cod_usu='%s',
                                            cod_status_dep='%s',
                                            where cod_dep='%s'";
    
    private $sqlDelete = "delete from depoimento where cod_dep='%s'";
    
    private $sqlSelect = "select * from depoimento where 1=1 %s %s";
// Método para inserir um usuário
    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getAutorDep(),
        $this->getTextDep(),
        $this->getDataHoraDep(),
        $this->getCodCurso(),
        $this->getCodUsu(),
        $this->getCodStatusDep());        
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getAutorDep(),
        $this->getTextDep(),
        $this->getDataHoraDep(),
        $this->getCodCurso(),
        $this->getCodUsu(),
        $this->getCodStatusDep());
        return $this->runQuery($sql);   
    }   
    
    public function delete() {
        $sql = sprintf($this->sqlDelete,
        $this->getCodDep());
        return $this->runQuery($sql);
    }
    
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);
    }
    
    
}
