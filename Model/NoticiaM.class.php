<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class NoticiaM extends DbConnection{
    private $codNot;
    private $tituloNot;
    private $autorNot;
    private $dataHoraNot;
    private $textoNot;
    private $codStatusNot;
    private $codUsu;
    
    function getCodNot() {
        return $this->codNot;
    }

    function getTituloNot() {
        return $this->tituloNot;
    }

    function getAutorNot() {
        return $this->autorNot;
    }

    function getDataHoraNot() {
        return $this->dataHoraNot;
    }

    function getTextoNot() {
        return $this->textoNot;
    }

    function getCodStatusNot() {
        return $this->codStatusNot;
    }

    function getCodUsu() {
        return $this->codUsu;
    }

    function setCodNot($codNot) {
        $this->codNot = $codNot;
    }

    function setTituloNot($tituloNot) {
        $this->tituloNot = $tituloNot;
    }

    function setAutorNot($autorNot) {
        $this->autorNot = $autorNot;
    }

    function setDataHoraNot($dataHoraNot) {
        $this->dataHoraNot = $dataHoraNot;
    }

    function setTextoNot($textoNot) {
        $this->textoNot = $textoNot;
    }

    function setCodStatusNot($codStatusNot) {
        $this->codStatusNot = $codStatusNot;
    }

    function setCodUsu($codUsu) {
        $this->codUsu = $codUsu;
    }

    
}    
    
    