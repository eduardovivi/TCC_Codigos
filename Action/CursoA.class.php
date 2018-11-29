<?php
namespace Action;
use Model\CursoM;

/**
 * Description of CursoA
 *
 * @author ACAD_ROGERIO_000590
 */
class CursoA extends CursoM{
    private $sqlInsert = "insert into curso(nome_curso,
                                              desc_curso,
                                              desc_carreira_curso,
                                              obj_curso,
                                              cod_status_curso,
                                              cod_usu)
                                              values('%s','%s','%s','%s','%s','%s')";
    
    
    private $sqlUpdate = "update curso set
                                            nome_curso='%s',
                                            desc_curso='%s',
                                            desc_carreira_curso='%s',
                                            obj_curso='%s',
                                            cod_status_curso='%s',
                                            cod_usu='%s',
                                            where cod_curso='%s'";
    
    private $sqlDelete = "delete from curso where cod_curso='%s'";
    
    private $sqlSelect = "select * from curso where 1=1 %s %s";
// Método para inserir um usuário
    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getNomeCurso(),
        $this->getDescCurso(),
        $this->getDescCarreiraCurso(),
        $this->getObjCurso(),
        $this->getCodStatusCurso(),
        $this->getCodUsu());        
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getNomeCurso(),
        $this->getDescCurso(),
        $this->getDescCarreiraCurso(),
        $this->getObjCurso(),
        $this->getCodStatusCurso(),
        $this->getCodUsu());   
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
