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

if (isset($_GET['remove'])) {
    if (isset($_GET['type'])) {
        $deleteId = $_GET['remove'];
        $typeOfVehicle = $_GET['type'];

        $remove = $manager->deleteVehicle($deleteId);
        header('location: index.php');
    }
}

if(isset($_GET['edit']))
{
    if (isset($_GET['type'])) {
        $edit = $_GET['edit'];
        $typeOfVehicle = $_GET['type'];

        $editVehicle = $manager->getVehicle($edit);
    }
}

if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = htmlspecialchars($_POST['name']);

    if (isset($_POST['color']) && !empty($_POST['color'])) {
        $color = htmlspecialchars($_POST['color']);

        if (isset($_POST['label']) && !empty($_POST['label'])) {
            $label = htmlspecialchars($_POST['label']);

            if (isset($_POST['type'])) {
                $type = htmlspecialchars($_POST['type']);

                if (isset($_POST['wheel']) && !empty($_POST['wheel'])) {
                    $wheel = htmlspecialchars(intval($_POST['wheel']));

                    if (isset($_POST['door'])) {
                        $door = htmlspecialchars(intval($_POST['door']));

                        if ($_POST['type'] === "Car") {

                            $newCar = new Car([
                                "id" => $edit,
                                "name" => $name,
                                "color" => $color,
                                "label" => $label,
                                "type" => "Car",
                                "wheel" => $wheel,
                                "door" => $door,
                            ]);
                            $manager->update($newCar);
                            echo "car edited";

                        } elseif ($_POST['type'] === "Truck") {

                            $newTruck = new Truck([
                                "id" => $edit,
                                "name" => $name,
                                "color" => $color,
                                "label" => $label,
                                "type" => "Truck",
                                "wheel" => $wheel,
                                "door" => $door
                            ]);
                            $manager->update($newTruck);
                            echo "truck edited";

                        } elseif ($_POST['type'] === "Motorbike") {

                                $newMotorbike = new Motorbike([
                                    "id" => $edit,
                                    "name" => $name,
                                    "color" => $color,
                                    "label" => $label,
                                    "type" => "Motorbike",
                                    "wheel" => $wheel,
                                    "door" => 0
                                ]);
                                $manager->update($newMotorbike);
                                echo "motorbike edited";

                        }
                        header('Location: detail.php?id=' . $edit . '&type=' . $typeOfVehicle . '');

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
    } else {
        echo "error color";
    }
}

if(isset($_GET['id']))
{
    if(isset ($_GET['type']))
    {
        $vehicleId = $_GET['id'];
        $typeVehicle = $_GET['type'];

        $vehicle = $manager->getVehicle($vehicleId);
    }
}

include "../views/detailView.php";
?>
