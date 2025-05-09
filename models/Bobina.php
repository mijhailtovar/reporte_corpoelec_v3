<?php

class Bobina
{
    private $id;
    private $id_proteccion;
    private $disparo;
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

    public function getDisparo()
    {
        return $this->disparo;
    }

    public function setDisparo($disparo)
    {
        $this->disparo = $disparo;
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
        $sql = "INSERT INTO bobina values(NULL, "
            . "{$this->getId_proteccion()}, {$this->getDisparo()}, '{$this->getFecha()}', '{$this->getHora_creacion()}')";
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
        $sql = "DELETE FROM bobina WHERE id={$this->id}";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getALL()
    {
        $Bobina = $this->db->query("SELECT * FROM bobina");
        return $Bobina;
    }
}