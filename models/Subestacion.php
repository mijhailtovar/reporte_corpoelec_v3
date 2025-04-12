<?php

class Subestacion
{
    private $id;
    private $nombre;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    
    /**
     * devuelve todas las mercancias entrantes
     */
    public function getALL()
    {
        $subestaciones = $this->db->query("SELECT * FROM subestacion");
        return $subestaciones;
    }

    public function save()
    {
        $sql = "INSERT INTO subestacion values(NULL, '{$this->getNombre()}')";
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
        $sql = "DELETE FROM subestacion WHERE id={$this->id}";
        $result = $this->db->query($sql);

        return $result;
    }
}