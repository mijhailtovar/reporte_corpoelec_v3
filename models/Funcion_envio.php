<?php

class Funcion_envio
{
    private $id;
    private $id_proteccion;
    private $nombre;
    private $envio;
    private $fecha;
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

    function getId_proteccion()
    {
        return $this->id_proteccion;
    }

    function setId_proteccion($id_proteccion)
    {
        $this->id_proteccion = $id_proteccion;
    }

    function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    function getEnvio()
    {
        return $this->envio;
    }

    function setEnvio($envio)
    {
        $this->envio = $envio;
    }
    
    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function save()
    {
        $sql = "INSERT INTO funcion_envio values(NULL, {$this->getId_proteccion()}, "
            . "'{$this->getNombre()}', {$this->getEnvio()}, '{$this->getFecha()}') ";
        
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
        $sql = "DELETE FROM funcion_envio WHERE id={$this->id}";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getALL()
    {
        $F_recepcion = $this->db->query("SELECT * FROM funcion_envio");
        return $F_recepcion;
    }
}