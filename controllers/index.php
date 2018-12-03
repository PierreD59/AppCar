<?php

// autoload
function chargerClasse($classname)
{
    if (file_exists('../model/' . $classname . '.php')) {
        require '../model/' . $classname . '.php';
    } else {
        require '../entities/' . $classname . '.php';
    }
}
spl_autoload_register('chargerClasse');

$db = Database::DB();
$manager = new VehicleManager($db);
$vehicles = $manager->getVehicles();

// POST String
$name = htmlspecialchars($_POST['name']);
$color = htmlspecialchars($_POST['color']);
$label = htmlspecialchars($_POST['label']);
$type = htmlspecialchars($_POST['type']);

// POST Int
$wheel = htmlspecialchars(is_int($_POST['wheel']));
$door = htmlspecialchars(is_int($_POST['door']));
$trailer = htmlspecialchars(is_int($_POST['trailer']));

if (isset($name) && !empty($name) && isset($color) && !empty($color) && isset($label) && !empty($label) && isset($type) && !empty($type) && isset($wheel) && !empty($wheel) && isset($door) && !empty($door) && isset($trailer) && !empty($trailer)) 
{
    if($vehicle->getType() === "Car" ) {

        $car = new Car([
            "name" => $name,
            "color" => $color,
            "label" => $label,
            "type" => $type,
            "wheel" => $wheel,
            "door" => $door,
            "trailer" => 0
        ]);
        $vehicles->add($car);
    }
    if ($vehicle->getType() === "Truck") {

        $truck = new Truck([
            "name" => $name,
            "color" => $color,
            "label" => $label,
            "type" => $type,
            "wheel" => $wheel,
            "door" => $door,
            "trailer" => $trailer
        ]);
        $vehicles->add($truck);
    }
    if ($vehicle->getType() === "Motorbike") {

        $motorbike = new Motorbike([
            "name" => $name,
            "color" => $color,
            "label" => $label,
            "type" => $type,
            "wheel" => $wheel,
            "door" => 0,
            "trailer" => 0
        ]);
        $vehicles->add($motorbike);
    }
}



include "../views/indexVue.php";
 ?>
