<?php
namespace Action;
use Model\CursoUnidadeM;

/**
 * Description of CursoA
 *
 * @author ACAD_ROGERIO_000590
 */
class CursoUnidadeA extends CursoUnidadeM{
    private $sqlInsert = "insert into curso_unidade(cod_curso,
                                              cod_uni)
                                              values('%s','%s')";
    
    
    private $sqlUpdate = "update curso_unidade set
                                            cod_curso='%s',
                                            cod_uni='%s',
                                            where cod_curso='%s'";
    
    private $sqlDelete = "delete from curso_unidade where cod_curso='%s'";
    
    private $sqlSelect = "select * from curso_unidade where 1=1 %s %s";

    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getCodCurso(),
        $this->getCodUni());        
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getCodCurso(),
        $this->getCodUni());  
        return $this->runQuery($sql);   
    }   
    
    public function delete() {
        $sql = sprintf($this->sqlDelete,
        $this->getCodCurso());
        return $this->runQuery($sql);
    }
    
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);
    }
    
    
}
