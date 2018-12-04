<?php

class VehicleManager {

    private $_db;

    /**
     * constructor
     *
     * @param PDO $db
     */
    public function __construct(PDO $db)
    {
        $this->setDb($db);
    }

    /**
     * Get the value of _db
     */
    public function getDb()
    {
        return $this->_db;
    }

    /**
     * Set the value of _db
     *
     * @param PDO $db
     * @return  self
     */
    public function setDb(PDO $db)
    {
        $this->_db = $db;

        return $this;
    }

    //ADD Car / Truck / Motorbike

    /**
     * Add vehicle into DB
     *
     * @param Vehicle $vehicle
     */
    public function add(Vehicle $vehicle)
    {
        if($vehicle->getType() === "Car") 
        {

            $query = $this->getDb()->prepare('INSERT INTO vehicles(name, label, color, door, wheel, type) VALUES (:name, :label, :color, :door, :wheel, :type)');
            $query->bindValue('name', $vehicle->getName(), PDO::PARAM_STR);
            $query->bindValue('label', $vehicle->getLabel(), PDO::PARAM_STR);
            $query->bindValue('color', $vehicle->getColor(), PDO::PARAM_STR);
            $query->bindValue('door', $vehicle->getDoor(), PDO::PARAM_INT);
            $query->bindValue('wheel', $vehicle->getWheel(), PDO::PARAM_INT);
            $query->bindValue('type', $vehicle->getType(), PDO::PARAM_STR);

            $query->execute();

        } elseif ($vehicle->getType() === "Truck") 
        {

            $query = $this->getDb()->prepare('INSERT INTO vehicles(name, label, color, door, wheel, type) VALUES (:name, :label, :color, :door, :wheel, :type)');
            $query->bindValue('name', $vehicle->getName(), PDO::PARAM_STR);
            $query->bindValue('label', $vehicle->getLabel(), PDO::PARAM_STR);
            $query->bindValue('color', $vehicle->getColor(), PDO::PARAM_STR);
            $query->bindValue('door', $vehicle->getDoor(), PDO::PARAM_INT);
            $query->bindValue('wheel', $vehicle->getWheel(), PDO::PARAM_INT);
            $query->bindValue('type', $vehicle->getType(), PDO::PARAM_STR);

            $query->execute();

        } elseif ($vehicle->getType() === "Motorbike") 
        {

            $query = $this->getDb()->prepare('INSERT INTO vehicles(name, label, color, wheel, type) VALUES (:name, :label, :color, :wheel, :type)');
            $query->bindValue('name', $vehicle->getName(), PDO::PARAM_STR);
            $query->bindValue('label', $vehicle->getLabel(), PDO::PARAM_STR);
            $query->bindValue('color', $vehicle->getColor(), PDO::PARAM_STR);
            $query->bindValue('wheel', $vehicle->getWheel(), PDO::PARAM_INT);
            $query->bindValue('type', $vehicle->getType(), PDO::PARAM_STR);

            $query->execute();

        }
    }

    /**
     * Get one vehicle by id or name
     *
     * @param $info
     * @return Vehicle 
     */
    public function getVehicle($info)
    {
        $query = $this->getDB()->prepare('SELECT * FROM vehicles WHERE id = :id');
        $query->bindValue('id', $info, PDO::PARAM_INT);
        $query->execute();
        $vehicle = $query->fetch(PDO::FETCH_ASSOC);
        
        $class = ucfirst($vehicle['type']);
        return new $class($vehicle);
    }

    /**
     * List all vehicles
     *
     * @return array $arrayOfVehicles
     */
    public function getVehicles()
    {
        $query = $this->getDB()->query('SELECT id, name, label, type FROM vehicles');
        $dataVehicles = $query->fetchAll(PDO::FETCH_ASSOC);
        $arrayOfVehicles = [];

        foreach ($dataVehicles as $dataVehicle) 
        {
            if ($dataVehicle['type'] === "Car") 
            {
                $arrayOfVehicles[] = new Car($dataVehicle);
            } elseif ($dataVehicle['type'] === "Truck") 
            {
                $arrayOfVehicles[] = new Truck($dataVehicle);
            } elseif ($dataVehicle['type'] === "Motorbike") 
            {
                $arrayOfVehicles[] = new Motorbike($dataVehicle);   
            }
        }

        return $arrayOfVehicles;

    }

    public function deleteVehicle($vehicle)
    {
        $query = $this->getDb()->prepare('DELETE FROM vehicles WHERE id = :id');
        $query->bindValue('id', $vehicle, PDO::PARAM_INT);
        $query->execute();
    }


    /**
     * Update vehicle's data 
     *
     * @param Vehicle $vehicle
     */
    public function update(Vehicle $vehicle)
    {
        $query = $this->getDb()->prepare('UPDATE vehicles SET name = :name, label = :label, color = :color, door = :door, wheel = :wheel, type = :type WHERE id = :id');
        $query->bindValue('name', $vehicle->getName(), PDO::PARAM_STR);
        $query->bindValue('label', $vehicle->getLabel(), PDO::PARAM_STR);
        $query->bindValue('color', $vehicle->getColor(), PDO::PARAM_STR);
        $query->bindValue('door', $vehicle->getDoor(), PDO::PARAM_INT);
        $query->bindValue('wheel', $vehicle->getWheel(), PDO::PARAM_INT);
        $query->bindValue('type', $vehicle->getType(), PDO::PARAM_STR);
        
        $query->execute();
    }
}