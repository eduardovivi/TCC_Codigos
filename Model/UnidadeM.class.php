<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class UnidadeM extends DbConnection{
    private $codUni;
    private $nomeUni;
    private $emailUni;
    private $numUni;
    private $cepUni;
    private $descUni;
    private $telUni;
    private $complUni;
    private $codStatusUni;
    private $codUsu;
    
    function getCodUni() {
        return $this->codUni;
    }

    function getNomeUni() {
        return $this->nomeUni;
    }

    function getEmailUni() {
        return $this->emailUni;
    }

    function getNumUni() {
        return $this->numUni;
    }

    function getCepUni() {
        return $this->cepUni;
    }

    function getDescUni() {
        return $this->descUni;
    }

    function getTelUni() {
        return $this->telUni;
    }

    function getComplUni() {
        return $this->complUni;
    }

    function getCodStatusUni() {
        return $this->codStatusUni;
    }

    function getCodUsu() {
        return $this->codUsu;
    }

    function setCodUni($codUni) {
        $this->codUni = $codUni;
    }

    function setNomeUni($nomeUni) {
        $this->nomeUni = $nomeUni;
    }

    function setEmailUni($emailUni) {
        $this->emailUni = $emailUni;
    }

    function setNumUni($numUni) {
        $this->numUni = $numUni;
    }

    function setCepUni($cepUni) {
        $this->cepUni = $cepUni;
    }

    function setDescUni($descUni) {
        $this->descUni = $descUni;
    }

    function setTelUni($telUni) {
        $this->telUni = $telUni;
    }

    function setComplUni($complUni) {
        $this->complUni = $complUni;
    }

    function setCodStatusUni($codStatusUni) {
        $this->codStatusUni = $codStatusUni;
    }

    function setCodUsu($codUsu) {
        $this->codUsu = $codUsu;
    }
}    