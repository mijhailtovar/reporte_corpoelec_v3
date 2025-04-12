<?php

class Linea_de_transmision
{
    private $id;
    private $id_subestacion;
    private $nombre;
    private $anillo;
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

    function getId_subestacion()
    {
        return $this->id_subestacion;
    }

    function setId_subestacion($id_subestacion)
    {
        $this->id_subestacion = $id_subestacion;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    
    public function getAnillo()
    {
        return $this->anillo;
    }

    function setAnillo($anillo)
    {
        $this->anillo = $anillo;
    }

    public function save()
    {
        $sql = "INSERT INTO linea_de_transmision values(NULL, "
            . "{$this->getId_subestacion()}, '{$this->getNombre()}', '{$this->getAnillo()}')";
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
        $sql = "DELETE FROM linea_de_transmision WHERE id={$this->id}";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getALL()
    {
        $linea_de_transmisiones = $this->db->query("SELECT * FROM linea_de_transmision");
        return $linea_de_transmisiones;
    }
}