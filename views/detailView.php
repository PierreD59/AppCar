<?php
include("template/header.php")
?>

<div class="container-fluid">
  <div class="row">
    <div class="m-5">
        <p><b>Vehicle :</b> <?= $vehicle->getName() ?></p>
        <p"><b>Label :</b> <?= $vehicle->getLabel() ?></p>
        <p"><b>Type of Vehicle:</b> <?= $vehicle->getType() ?></p>
        <p"><b>Color :</b> <?= $vehicle->getColor() ?></p>
        <p"><b>Wheels :</b> <?= $vehicle->getWheel() ?></p>
        <p"><b>Door :</b> <?= $vehicle->getDoor() ?></p>
        <!-- Button return index -->
        <a href="index.php" class="btn btn-primary text-light">Return</a>

        <!-- Button edit modal -->
        <a type="button" class="btn btn-warning text-dark" data-toggle="modal" data-target="#exampleModalCenter">Edit</a>

        <!-- Button delete -->
        <a class="btn btn-danger text-light" href="index.php?remove=<?= $vehicle->getId(); ?>&type=<?= $vehicle->getType(); ?>">Delete</a>
    </div>

  </div>
</div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Edit Vehicle</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form id="form" class="m-5" action="detail.php?edit=<?= $vehicle->getId(); ?>&type=<?= $vehicle->getType(); ?>" method="POST">
              <div class="form-groupe">
                <label for="name">Name : </label><br>
                <input type="text" id="name" name="name" placeholder="Megane" required><br>

                <label class="mt-3" for="color">Color : </label><br>
                <input type="text" id="color" name="color" placeholder="Rouge" required><br>

                <label class="mt-3" for="color">Wheels : </label><br>
                <input type="text" name="wheel" id="wheel" value="0" style="width: 50px;" required/><br>

                <label class="mt-3" for="color">Doors : </label><br>
                <input type="text" name="door" id="door" value="0" style="width: 50px;" /><br>

              </div>

              <div class="form-group mt-3" style="width: 200px;">
                <label for="label">Label : </label>
                <select class="form-control" name="label" id="label" required>
                  <optgroup label="Car">
                    <option>Renault</option>
                  </optgroup>
                  <optgroup label="Truck">
                    <option>Mercedes</option>
                  </optgroup>
                  <optgroup label="Motorbike">
                    <option>Harley Davidson</option>
                  </optgroup>
                </select>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="Car" value="Car" checked required>
                <label class="form-check-label" for="car">
                  Car
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="Truck" value="Truck">
                <label class="form-check-label" for="truck">
                  Truck
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="type" id="Motorbike" value="Motorbike">
                <label class="form-check-label" for="motorbike">
                  Motorbike
                </label>
              </div>

              <input class="btn btn-primary mt-3" type="submit" value="Envoyer" />

            </form>
          </div>
        </div>
      </div>
    </div>




<?php
include("template/footer.php")
?>
