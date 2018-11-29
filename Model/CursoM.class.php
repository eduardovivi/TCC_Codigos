<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class CursoM extends DbConnection{
    private $codCurso;
    private $nomeCurso;
    private $descCurso;
    private $descCarreiraCurso;
    private $objCurso;
    private $codStatusCurso;
    private $codUsu;
    
    function getCodCurso() {
        return $this->codCurso;
    }

    function getNomeCurso() {
        return $this->nomeCurso;
    }

    function getDescCurso() {
        return $this->descCurso;
    }

    function getDescCarreiraCurso() {
        return $this->descCarreiraCurso;
    }

    function getObjCurso() {
        return $this->objCurso;
    }

    function getCodStatusCurso() {
        return $this->codStatusCurso;
    }

    function getCodUsu() {
        return $this->codUsu;
    }

    function setCodCurso($codCurso) {
        $this->codCurso = $codCurso;
    }

    function setNomeCurso($nomeCurso) {
        $this->nomeCurso = $nomeCurso;
    }

    function setDescCurso($descCurso) {
        $this->descCurso = $descCurso;
    }

    function setDescCarreiraCurso($descCarreiraCurso) {
        $this->descCarreiraCurso = $descCarreiraCurso;
    }

    function setObjCurso($objCurso) {
        $this->objCurso = $objCurso;
    }

    function setCodStatusCurso($codStatusCurso) {
        $this->codStatusCurso = $codStatusCurso;
    }

    function setCodUsu($codUsu) {
        $this->codUsu = $codUsu;
    }
}    
    