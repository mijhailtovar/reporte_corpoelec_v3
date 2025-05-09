<?php

class Reporte
{
    private $id;
    private $id_linea_de_transmision;
    private $fecha;
    private $numero_de_permiso;
    private $observaciones;
    private $hora_creacion;
    private $db;

    /**
     * el constructor declara un objeto que tienen referencia
     * a la conexion a la base de datos 
     */
    public function __construct()
    {
        $this->db = Database::connect();
    }

    function getId()
    {
        return $this->id;
    }

    function setId($id)
    {
        $this->id = $id;
    }

    function getId_linea_de_transmision()
    {
        return $this->id_linea_de_transmision;
    }

    function setId_linea_de_transmision($id_linea_de_transmision)
    {
        $this->id_linea_de_transmision = $id_linea_de_transmision;
    }

    function getFecha()
    {
        return $this->fecha;
    }

    function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    function getNumero_de_permiso()
    {
        return $this->numero_de_permiso;
    }

    function setNumero_de_permiso($numero_de_permiso)
    {
        $this->numero_de_permiso = $numero_de_permiso;
    }

    function getObservaciones()
    {
        return $this->observaciones;
    }

    function setObservaciones($observaciones)
    {
        $this->observaciones = $observaciones;
    }

    function getHora_creacion()
    {
        return $this->hora_creacion;
    }

    function setHora_creacion($hora_creacion)
    {
        $this->hora_creacion = $hora_creacion;
    }
    

    public function save()
    {
        $sql = "INSERT INTO reporte values(NULL, {$this->getId_linea_de_transmision()}, "
            . "'{$this->getFecha()}', '{$this->getNumero_de_permiso()}', '{$this->getObservaciones()}', '{$this->getHora_creacion()}') ";
        
        $save = $this->db->query($sql);

        $result = false;
        if($save)
        {
            $result = true;
        }
        return $result;
    }

    public function delete()
    {
        $sql = "DELETE FROM reporte WHERE id={$this->id}";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getALL()
    {
        $reportes = $this->db->query("SELECT * FROM reporte");
        return $reportes;
    }
}