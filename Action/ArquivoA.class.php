<?php
namespace Action;
use Model\ArquivoM;

/**
 * Description of ArquivoA
 *
 * @author ACAD_ROGERIO_000590
 */
class ArquivoA extends ArquivoM{
    private $sqlInsert = "insert into arquivo(url_arq,
                                              ext_arq,
                                              legenda_arq,
                                              desc_arq,
                                              cod_status_arq)                                            cod_status_dep)
                                              values('%s','%s','%s','%s','%s')";
    
    
    private $sqlUpdate = "update arquivo set
                                            url_arq='%s',
                                            ext_arq='%s',
                                            legenda_arq='%s',
                                            desc_arq='%s',
                                            cod_status_arq='%s',
                                            where cod_arq='%s'";
    
    private $sqlDelete = "delete from arquivo where cod_arq='%s'";
    
    private $sqlSelect = "select * from arquivo where 1=1 %s %s";
// Método para inserir um usuário
    public function insert() {
        $sql = sprintf($this->sqlInsert,
        $this->getUrlArq(),
        $this->getExtArq(),
        $this->getLegendaArq(),
        $this->getDescArq(),
        $this->getCodStatusArq());        
        return $this->runQuery($sql);   
    }
    
    public function update() {
        $sql = sprintf($this->sqlUpdate,
        $this->getUrlArq(),
        $this->getExtArq(),
        $this->getLegendaArq(),
        $this->getDescArq(),
        $this->getCodStatusArq()); 
        return $this->runQuery($sql);   
    }   
    
    public function delete() {
        $sql = sprintf($this->sqlDelete,
        $this->getCodArq());
        return $this->runQuery($sql);
    }
    
    public function select($where='', $order=''){
        $sql = sprintf($this->sqlSelect,$where,$order);
        return $this->runSelect($sql);
    }
    
    
}
