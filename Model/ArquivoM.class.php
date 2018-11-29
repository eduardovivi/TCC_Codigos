<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class ArquivoM extends DbConnection{
    private $codArq;
    private $urlArq;
    private $extArq;
    private $legendaArq;
    private $descArq;
    private $codStatusArq;

    function getCodArq() {
        return $this->codArq;
    }

    function getUrlArq() {
        return $this->urlArq;
    }

    function getExtArq() {
        return $this->extArq;
    }

    function getLegendaArq() {
        return $this->legendaArq;
    }

    function getDescArq() {
        return $this->descArq;
    }

    function getCodStatusArq() {
        return $this->codStatusArq;
    }

    function setCodArq($codArq) {
        $this->codArq = $codArq;
    }

    function setUrlArq($urlArq) {
        $this->urlArq = $urlArq;
    }

    function setExtArq($extArq) {
        $this->extArq = $extArq;
    }

    function setLegendaArq($legendaArq) {
        $this->legendaArq = $legendaArq;
    }

    function setDescArq($descArq) {
        $this->descArq = $descArq;
    }

    function setCodStatusArq($codStatusArq) {
        $this->codStatusArq = $codStatusArq;
    }


}    
    