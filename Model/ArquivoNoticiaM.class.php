<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class ArquivoNoticiaM extends DbConnection{
    private $codArq;
    private $codNot;
    
    function getCodArq() {
        return $this->codArq;
    }

    function getCodNot() {
        return $this->codNot;
    }

    function setCodArq($codArq) {
        $this->codArq = $codArq;
    }

    function setCodNot($codNot) {
        $this->codNot = $codNot;
    }

}    
    