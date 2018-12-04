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
        $edit = $_GET['remove'];
        $typeOfVehicle = $_GET['type'];



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
