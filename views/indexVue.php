
<div class="page">

<?php
  include("template/header.php")
 ?>
<main class="site-content">

  <div class="container-fluid">
    <div class="row">

      <form id="form" class="m-5" action="" method="POST">
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


      <div class="d-flex flex-row flex-wrap justify-content-center">


<?php foreach ($vehicles as $vehicle) { ?>

    <div class="card m-3" style="width: 18rem; box-shadow: 2px 5px 5px grey;">
      <div class="card-body">
        <h5 class="card-title"><b>Vehicle :</b> <?= $vehicle->getName() ?></h5>
        <h6 class="card-subtitle mb-2"><b>Label :</b> <?= $vehicle->getLabel() ?></h6>
        <p class="card-text"><b>Type of Vehicle:</b> <?= $vehicle->getType() ?></p>

        <!-- Button detail -->
        <a href="detail.php?id=<?=$vehicle->getId(); ?>&type=<?= $vehicle->getType(); ?>" class="card-link btn btn-primary">Detail</a>
        
        <!-- Button delete -->
        <a class="card-link btn btn-danger" href="index.php?remove=<?= $vehicle->getId();?>&type=<?= $vehicle->getType(); ?>">Delete</a>
      </div>
    </div>

<?php } ?>
    </div> 
  </div>
</div>

</main>

 <?php
   include("template/footer.php")
  ?>

</div>
