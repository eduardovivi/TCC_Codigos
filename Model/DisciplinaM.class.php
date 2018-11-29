<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class DisciplinaM extends DbConnection{
    private $codDisc;
    private $nomeDisc;
    private $descDisc;
    private $codStatusDisc;
    
    function getCodDisc() {
        return $this->codDisc;
    }

    function getNomeDisc() {
        return $this->nomeDisc;
    }

    function getDescDisc() {
        return $this->descDisc;
    }

    function getCodStatusDisc() {
        return $this->codStatusDisc;
    }

    function setCodDisc($codDisc) {
        $this->codDisc = $codDisc;
    }

    function setNomeDisc($nomeDisc) {
        $this->nomeDisc = $nomeDisc;
    }

    function setDescDisc($descDisc) {
        $this->descDisc = $descDisc;
    }

    function setCodStatusDisc($codStatusDisc) {
        $this->codStatusDisc = $codStatusDisc;
    }

}
    