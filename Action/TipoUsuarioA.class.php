<?php
namespace Action;
use Model\TipoUsuarioM;

/**
 * Description of TipoUsuarioA
 *
 * @author ACAD_ROGERIO_000590
 */
class TipoUsuarioA extends TipoUsuarioM{
    private $sqlInsert = "insert into tipo_usuario(nome_tipo_usu,
                                              cod_status_tipo_usu)
                                              values('%s','%s')";
    
    
    private $sqlUpdate = "update tipo_usuario set
                                           nome_tipo_usu='%s',
                                           cod_status_tipo_usu='%s',
                                           where cod_tipo_usu='%s'";
    
    private $sqlDelete = "delete from tipo_usuario where cod_tipo_usu='%s'";
    
    private $sqlSelect = "select * from tipo_usuario where 1=1 %s %s";
// Método para inserir um usuário
    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getNomeTipoUsu(),
        $this->getCodStatusTipoUsu());
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getNomeTipoUsu(),
        $this->getCodStatusTipoUsu());
        return $this->runQuery($sql);   
    }   
    
    public function delete() {
        $sql = sprintf($this->sqlDelete,
        $this->getCodTipoUsu());
        return $this->runQuery($sql);
    }
    
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);
    }
    
    
}
