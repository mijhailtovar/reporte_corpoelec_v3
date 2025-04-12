<?php

class Proteccion
{
    private $id;
    private $id_linea_de_transmision;
    private $nombre;
    private $marca;
    private $modelo;
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

    public function getNombre()
    {
        return $this->nombre;
    }

    function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    

    public function save()
    {
        $sql = "INSERT INTO proteccion values(NULL, {$this->getId_linea_de_transmision()},"
            . "'{$this->getNombre()}', '{$this->getMarca()}', '{$this->getModelo()}'"
            . ")";
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
        $sql = "DELETE FROM proteccion WHERE id={$this->id}";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getALL()
    {
        $protecciones = $this->db->query("SELECT * FROM proteccion");
        return $protecciones;
    }
}