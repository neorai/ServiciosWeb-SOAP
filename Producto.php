<?php
class Producto {
    protected $codigo;
    protected $nombre;
    protected $nombre_corto;
    protected $descripcion;
    protected $PVP;
    protected $familia;
    
    public function __construct($row) {
        $this->codigo = $row['cod'];
        $this->nombre = $row['nombre'];
        $this->nombre_corto = $row['nombre_corto'];
        $this->descripcion = $row['descripcion'];
        $this->PVP = $row['PVP'];
        $this->familia = $row['familia'];
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getNombre_corto() {
        return $this->nombre_corto;
    }
    
    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getPVP() {
        return $this->PVP;
    }

    public function getFamilia() {
        return $this->familia;
    }
}
?>
