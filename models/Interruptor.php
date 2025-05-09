<?php

class Interruptor
{
    private $id;
    private $id_proteccion;
    private $nombre;
    private $fecha;
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

    function getId_proteccion()
    {
        return $this->id_proteccion;
    }

    function setId_proteccion($id_proteccion)
    {
        $this->id_proteccion = $id_proteccion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getFecha()
    {
        return $this->fecha;
    }

    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
    }

    public function getHora_creacion()
    {
        return $this->hora_creacion;
    }

    public function setHora_creacion($hora_creacion)
    {
        $this->hora_creacion = $hora_creacion;
    }
    

    public function save()
    {
        $sql = "INSERT INTO interruptor values(NULL, "
            . "{$this->getId_proteccion()}, '{$this->getNombre()}', '{$this->getFecha()}', '{$this->getHora_creacion()}')";
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
        $sql = "DELETE FROM interruptor WHERE id={$this->id}";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getALL()
    {
        $interruptor = $this->db->query("SELECT * FROM interruptor");
        return $interruptor;
    }
}