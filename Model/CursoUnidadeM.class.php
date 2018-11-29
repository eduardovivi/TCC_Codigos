<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class CursoUnidadeM extends DbConnection{
    private $codUni;
    private $codCurso;
    
    function getCodUni() {
        return $this->codUni;
    }

    function getCodCurso() {
        return $this->codCurso;
    }

    function setCodUni($codUni) {
        $this->codUni = $codUni;
    }

    function setCodCurso($codCurso) {
        $this->codCurso = $codCurso;
    }

}    
    