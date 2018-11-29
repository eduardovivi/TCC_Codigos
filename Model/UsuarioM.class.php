<?php
namespace Model;
use Db\DbConnection;

class UsuarioM extends DbConnection{
    private $codUsu;
    private $nomeUsu;
    private $cpfUsu;
    private $emailUsu;
    private $senhaUsu;
    private $codForma;
    private $codTipoUsu;
    private $codStatusUsu;
    
    function getCodUsu() {
        return $this->codUsu;
    }

    function getNomeUsu() {
        return $this->nomeUsu;
    }

    function getCpfUsu() {
        return $this->cpfUsu;
    }

    function getEmailUsu() {
        return $this->emailUsu;
    }

    function getSenhaUsu() {
        return $this->senhaUsu;
    }

    function getCodForma() {
        return $this->codForma;
    }

    function getCodTipoUsu() {
        return $this->codTipoUsu;
    }

    function getCodStatusUsu() {
        return $this->codStatusUsu;
    }

    function setCodUsu($codUsu) {
        $this->codUsu = $codUsu;
    }

    function setNomeUsu($nomeUsu) {
        $this->nomeUsu = $nomeUsu;
    }

    function setCpfUsu($cpfUsu) {
        $this->cpfUsu = $cpfUsu;
    }

    function setEmailUsu($emailUsu) {
        $this->emailUsu = $emailUsu;
    }

    function setSenhaUsu($senhaUsu) {
        $this->senhaUsu = $senhaUsu;
    }

    function setCodForma($codForma) {
        $this->codForma = $codForma;
    }

    function setCodTipoUsu($codTipoUsu) {
        $this->codTipoUsu = $codTipoUsu;
    }

    function setCodStatusUsu($codStatusUsu) {
        $this->codStatusUsu = $codStatusUsu;
    }

}    
    
   