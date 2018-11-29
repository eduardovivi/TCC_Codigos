<?php
namespace Model;
use Db\DbConnection;

/**
 * Description of UsuarioM
 *
 * @author ACAD_ROGERIO_000590
 */

class TipoUsuarioM extends DbConnection{
    private $codTipoUsu;
    private $nomeTipoUsu;
    private $codStatusTipoUsu;
    
    function getCodTipoUsu() {
        return $this->codTipoUsu;
    }

    function getNomeTipoUsu() {
        return $this->nomeTipoUsu;
    }

    function getCodStatusTipoUsu() {
        return $this->codStatusTipoUsu;
    }

    function setCodTipoUsu($codTipoUsu) {
        $this->codTipoUsu = $codTipoUsu;
    }

    function setNomeTipoUsu($nomeTipoUsu) {
        $this->nomeTipoUsu = $nomeTipoUsu;
    }

    function setCodStatusTipoUsu($codStatusTipoUsu) {
        $this->codStatusTipoUsu = $codStatusTipoUsu;
    }
}    
    
 