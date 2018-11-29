<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class DepoimentoM extends DbConnection{
    private $codDep;
    private $autorDep;
    private $textDep;
    private $dataHoraDep;
    private $codCurso;
    private $codUsu;
    private $codStatusDep;
    
    function getCodDep() {
        return $this->codDep;
    }

    function getAutorDep() {
        return $this->autorDep;
    }

    function getTextDep() {
        return $this->textDep;
    }

    function getDataHoraDep() {
        return $this->dataHoraDep;
    }

    function getCodCurso() {
        return $this->codCurso;
    }

    function getCodUsu() {
        return $this->codUsu;
    }

    function getCodStatusDep() {
        return $this->codStatusDep;
    }

    function setCodDep($codDep) {
        $this->codDep = $codDep;
    }

    function setAutorDep($autorDep) {
        $this->autorDep = $autorDep;
    }

    function setTextDep($textDep) {
        $this->textDep = $textDep;
    }

    function setDataHoraDep($dataHoraDep) {
        $this->dataHoraDep = $dataHoraDep;
    }

    function setCodCurso($codCurso) {
        $this->codCurso = $codCurso;
    }

    function setCodUsu($codUsu) {
        $this->codUsu = $codUsu;
    }

    function setCodStatusDep($codStatusDep) {
        $this->codStatusDep = $codStatusDep;
    }
}    
    
   