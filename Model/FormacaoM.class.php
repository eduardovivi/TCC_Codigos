<?php
namespace Model;
use Db\DbConnection;

class FormacaoM extends DbConnection{
    private $codForma;
    private $nomeForma;
    private $codStatusForma;
    
    function getCodForma() {
        return $this->codForma;
    }

    function getNomeForma() {
        return $this->nomeForma;
    }

    function getCodStatusForma() {
        return $this->codStatusForma;
    }

    function setCodForma($codForma) {
        $this->codForma = $codForma;
    }

    function setNomeForma($nomeForma) {
        $this->nomeForma = $nomeForma;
    }

    function setCodStatusForma($codStatusForma) {
        $this->codStatusForma = $codStatusForma;
    }

}    
    
 