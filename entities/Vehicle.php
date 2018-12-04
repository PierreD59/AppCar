<?php 
declare (strict_types = 1);

abstract class Vehicle {

    protected   $id,
                $name,
                $label,
                $color,
                $door,
                $wheel,
                $type;


    /**
     * constructor
     *
     * @param array $array
     */
    public function __construct(array $array)
    {
        $this->hydrate($array);
    }

    /**
     * Hydratation
     *
     * @param array $donnees
     */
    public function hydrate(array $donnees)
    {

        foreach ($donnees as $key => $value) 
        {
            // On récupère le nom du setter correspondant à l'attribut.
            $method = 'set' . ucfirst($key);
                
            // Si le setter correspondant existe.
            if (method_exists($this, $method)) 
            {
                // On appelle le setter.
                $this->$method($value);
            }
        }
    }

    /* SETTER */

    /**
     * Set the value of id
     *
     * @param int $id
     * @return  self
     */
    public function setId($id)
    {
        $id = (int)$id;

        if ($id > 0) {
            $this->id = $id;
        }

        return $this;
    }

    /**
     * Set the value of name
     *
     * @param string $name
     * @return  self
     */
    public function setName(string $name)
    {
        if (is_string($name)) 
        {
            $this->name = $name;
        }
        return $this;
    }

    /**
     * Set the value of label
     *
     * @param string $label
     * @return  self
     */
    public function setLabel(string $label)
    {
        if (is_string($label)) 
        {
            $this->label = $label;
        }
        return $this;
    }

    /**
     * Set the value of color
     *
     * @param string $color
     * @return  self
     */
    public function setColor(string $color)
    {
        if (is_string($color)) 
        {
            $this->color = $color;
        }
        return $this;
    }

    /**
     * Set the value of door
     *
     * @param int $door
     * @return  self
     */ 
    public function setDoor($door)
    {
        $door = (int)$door;
        $this->door = $door;
        return $this;
    }

    /**
     * Set the value of wheel
     *
     * @param int $wheel
     * @return  self
     */
    public function setWheel($wheel)
    {
        $wheel = (int)$wheel;
        $this->wheel = $wheel;
        return $this;
    }

    /**
     * Set the value of type
     *
     * @return  self
     */
    public function setType(string $type)
    {
        if (is_string($type)) 
        {
            $this->type = $type;
        }
        return $this;
    }


    /* GETTER */

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
    * Get the value of label
    */ 
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Get the value of color
     */ 
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Get the value of door
     */ 
    public function getDoor()
    {
        return $this->door;
    }

    /**
     * Get the value of wheel
     */
    public function getWheel()
    {
        return $this->wheel;
    }

    /**
     * Get the value of type
     */ 
    public function getType()
    {
        return $this->type;
    }
}
