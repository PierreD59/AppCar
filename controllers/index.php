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

if (isset($_POST['name']) && !empty($_POST['name'])) 
{
    $name = htmlspecialchars($_POST['name']);

    if (isset($_POST['color']) && !empty($_POST['color'])) 
    {
        $color = htmlspecialchars($_POST['color']);

        if (isset($_POST['label']) && !empty($_POST['label'])) 
        {
            $label = htmlspecialchars($_POST['label']);

            if (isset($_POST['type'])) 
            {
                $type = htmlspecialchars($_POST['type']);

                if (isset($_POST['wheel']) && !empty($_POST['wheel'])) 
                {
                    $wheel = htmlspecialchars(intval($_POST['wheel']));

                    if (isset($_POST['door'])) 
                    {
                        $door = htmlspecialchars(intval($_POST['door']));

                        if ($_POST['type'] === "Car") 
                        {

                            $car = new Car([
                                "name" => $name,
                                "color" => $color,
                                "label" => $label,
                                "type" => "Car",
                                "wheel" => $wheel,
                                "door" => $door,
                            ]);
                            $manager->add($car);
                            echo "car envoyé";

                        } elseif ($_POST['type'] === "Truck") 
                        {

                            $truck = new Truck([
                                "name" => $name,
                                "color" => $color,
                                "label" => $label,
                                "type" => "Truck",
                                "wheel" => $wheel,
                                "door" => $door
                            ]);
                            $manager->add($truck);
                            echo "truck envoyé";

                        } elseif ($_POST['type'] === "Motorbike") 
                        {

                            $motorbike = new Motorbike([
                                "name" => $name,
                                "color" => $color,
                                "label" => $label,
                                "type" => "Motorbike",
                                "wheel" => $wheel,
                                "door" => 0
                            ]);
                            $manager->add($motorbike);
                            echo "motorbike envoyé";
                        }
                        header('Location: index.php');
                        
                    } else {
                        echo "error door";
                    }
                } else {
                    echo "error wheels";
                }
            } else {
                echo "error type";
            }
        } else {
            echo "error label";
        }
    }
    else {
        echo "error color";
    }
}

if(isset($_GET['remove']))
{
    if (isset($_GET['type'])) 
    {
        $deleteId = $_GET['remove'];
        $typeOfVehicle = $_GET['type'];

        $remove = $manager->deleteVehicle($deleteId);
    }
}

$vehicles = $manager->getVehicles();

include "../views/indexVue.php";

 ?>
