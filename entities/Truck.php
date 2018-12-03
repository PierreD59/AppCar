<?php

declare (strict_types = 1);

class Truck extends Vehicle {

    protected $trailer;

    /**
     * Get the value of trailer
     */ 
    public function getTrailer()
    {
        return $this->trailer;
    }

    /**
     * Set the value of trailer
     *
     * @param int $trailer
     * @return  self
     */
    public function setTrailer($trailer)
    {
        $trailer = (int)$trailer;
        $this->trailer = $trailer;
        return $this;
    }
}