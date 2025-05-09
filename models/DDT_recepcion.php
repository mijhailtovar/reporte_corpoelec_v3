<?php

class DDT_recepcion
{
    private $id;
    private $id_proteccion;
    private $recepcion;
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

    public function getRecepcion()
    {
        return $this->recepcion;
    }

    public function setRecepcion($recepcion)
    {
        $this->recepcion = $recepcion;
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
        $sql = "INSERT INTO ddt_recepcion values(NULL, "
            . "{$this->getId_proteccion()}, {$this->getRecepcion()}, '{$this->getFecha()}', '{$this->getHora_creacion()}')";
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
        $sql = "DELETE FROM ddt_recepcion WHERE id={$this->id}";
        $result = $this->db->query($sql);

        return $result;
    }

    public function getALL()
    {
        $DDT_recepcion = $this->db->query("SELECT * FROM ddt_recepcion");
        return $DDT_recepcion;
    }
}