<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class TccM extends DbConnection{
    private $codTcc;
    private $tituloTcc;
    private $resumoTcc;
    private $anoTcc;
    private $urlCapaTcc;
    private $linkTcc;
    private $codCurso;
    private $codStatusTcc;
    
    function getCodTcc() {
        return $this->codTcc;
    }

    function getTituloTcc() {
        return $this->tituloTcc;
    }

    function getResumoTcc() {
        return $this->resumoTcc;
    }

    function getAnoTcc() {
        return $this->anoTcc;
    }

    function getUrlCapaTcc() {
        return $this->urlCapaTcc;
    }

    function getLinkTcc() {
        return $this->linkTcc;
    }

    function getCodCurso() {
        return $this->codCurso;
    }

    function getCodStatusTcc() {
        return $this->codStatusTcc;
    }

    function setCodTcc($codTcc) {
        $this->codTcc = $codTcc;
    }

    function setTituloTcc($tituloTcc) {
        $this->tituloTcc = $tituloTcc;
    }

    function setResumoTcc($resumoTcc) {
        $this->resumoTcc = $resumoTcc;
    }

    function setAnoTcc($anoTcc) {
        $this->anoTcc = $anoTcc;
    }

    function setUrlCapaTcc($urlCapaTcc) {
        $this->urlCapaTcc = $urlCapaTcc;
    }

    function setLinkTcc($linkTcc) {
        $this->linkTcc = $linkTcc;
    }

    function setCodCurso($codCurso) {
        $this->codCurso = $codCurso;
    }

    function setCodStatusTcc($codStatusTcc) {
        $this->codStatusTcc = $codStatusTcc;
    }
}    
    
    
  