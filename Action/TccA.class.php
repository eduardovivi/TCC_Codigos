<?php
namespace Action;
use Model\TccM;

/**
 * Description of TccA
 *
 * @author ACAD_ROGERIO_000590
 */
class TccA extends TccM{
    private $sqlInsert = "insert into tcc(titulo_tcc,
                                              autor_tcc,
                                              resumo_tcc,
                                              ano_tcc,
                                              url_capa_tcc,
                                              link_tcc,
                                              cod_curso,
                                              cod_status_tcc)
                                              values('%s','%s','%s','%s','%s','%s','%s','%s')";
    
    
    private $sqlUpdate = "update tcc set
                                            titulo_tcc='%s',
                                            autor_tcc='%s',
                                            resumo_tcc='%s',
                                            ano_tcc='%s',
                                            url_capa_tcc='%s',
                                            link_tcc='%s',
                                            cod_curso='%s',
                                            cod_status_tcc='%s',
                                           where cod_tipo_usu='%s'";
    
    private $sqlDelete = "delete from tcc where cod_tcc='%s'";
    
    private $sqlSelect = "select * from tcc where 1=1 %s %s";
// Método para inserir um usuário
    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getTituloTcc(),
        $this->getAutorTcc(),
        $this->getResumoTcc(),
        $this->getAnoTcc(),
        $this->getUrlCapaTcc(),
        $this->getLinkTcc(),
        $this->getCodCurso(),
        $this->getCodStatusTcc());
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getTituloTcc(),
        $this->getAutorTcc(),
        $this->getResumoTcc(),
        $this->getAnoTcc(),
        $this->getUrlCapaTcc(),
        $this->getLinkTcc(),
        $this->getCodCurso(),
        $this->getCodStatusTcc());
        return $this->runQuery($sql);   
    }   
    
    public function delete() {
        $sql = sprintf($this->sqlDelete,
        $this->getCodTcc());
        return $this->runQuery($sql);
    }
    
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);
    }
    
    
}
