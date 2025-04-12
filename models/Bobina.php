<?php

class Bobina
{
    private $id;
    private $id_interruptor;
    private $disparo;
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

    function getId_interruptor()
    {
        return $this->id_interruptor;
    }

    function setId_interruptor($id_interruptor)
    {
        $this->id_interruptor = $id_interruptor;
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
    

    public function save()
    {
        $sql = "INSERT INTO bobina values(NULL, "
            . "{$this->getId_interruptor()}, {$this->getDisparo()}, '{$this->getFecha()}')";
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