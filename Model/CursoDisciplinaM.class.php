<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class CursoDisciplinaM extends DbConnection{
    private $codCurso;
    private $codDisc;
    
    function getCodCurso() {
        return $this->codCurso;
    }

    function getCodDisc() {
        return $this->codDisc;
    }

    function setCodCurso($codCurso) {
        $this->codCurso = $codCurso;
    }

    function setCodDisc($codDisc) {
        $this->codDisc = $codDisc;
    }

}    
    