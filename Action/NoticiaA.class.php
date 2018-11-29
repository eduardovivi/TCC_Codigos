<?php
namespace Action;
use Model\NoticiaM;

/**
 * Description of NoticiaA
 *
 * @author ACAD_ROGERIO_000590
 */
class NoticiaA extends NoticiaM{
    private $sqlInsert = "insert into noticia(titulo_not,
                                              autor_not,
                                              data_hora_not,
                                              texto_not,
                                              cod_status_not,
                                              cod_usu)
                                              values('%s','%s','%s','%s','%s','%s')";
    
    
    private $sqlUpdate = "update noticia set
                                            titulo_not='%s',
                                            autor_not='%s',
                                            data_hora_not='%s',
                                            texto_not='%s',
                                            cod_status_not='%s',
                                            cod_usu='%s',
                                            where cod_not='%s'";
    
    private $sqlDelete = "delete from noticia where cod_not='%s'";
    
    private $sqlSelect = "select * from noticia where 1=1 %s %s";
// Método para inserir um usuário
    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getTituloNot(),
        $this->getAutorNot(),
        $this->getDataHoraNot(),
        $this->getTextoNot(),
        $this->getCodStatusNot(),
        $this->getCodUsu());
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getTituloNot(),
        $this->getAutorNot(),
        $this->getDataHoraNot(),
        $this->getTextoNot(),
        $this->getCodStatusNot(),
        $this->getCodUsu());
        return $this->runQuery($sql);   
    }   
    
    public function delete() {
        $sql = sprintf($this->sqlDelete,
        $this->getCodNot());
        return $this->runQuery($sql);
    }
    
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);
    }
    
    
}
