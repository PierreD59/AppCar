<?php
  include("template/header.php")
 ?>

<form class="m-3" action="" method="POST">
<div class="form-groupe">
  <label for="name">Name : </label><br>
  <input type="text" id="name" name="name" placeholder="Megane" required><br>

  <label for="color">Color : </label><br>
  <input type="text" id="color" name="color" placeholder="Rouge" required><br>

  <label for="color">Wheels : </label><br>
  <input type="number" name="wheel" id="wheel" value="0" style="width: 50px;" required/><br>

  <label for="color">Doors : </label><br>
  <input type="number" name="door" id="door" value="0" style="width: 50px;" /><br>

  <label for="color">Trailer : </label><br>
  <input type="number" name="trailer" id="trailer" value="0" style="width: 50px;" /><br>
</div>

  <div class="form-group" style="width: 200px;">
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
    <input class="form-check-input" type="radio" name="type" id="car" value="option1" checked required>
    <label class="form-check-label" for="car">
      Car
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="type" id="truck" value="option2">
    <label class="form-check-label" for="truck">
      Truck
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" type="radio" name="type" id="motorbike" value="option3">
    <label class="form-check-label" for="motorbike">
      Motorbike
    </label>
  </div>

  <input type="submit" value="Envoyer" />

</form>


<div class="container-fluid">
  <div class="row">

<?php foreach ($vehicles as $vehicle) { ?>

    <div class="card" style="width: 18rem;">
      <div class="card-body">
        <h5 class="card-title">Name of Vehicle : <?= $vehicle->getName() ?></h5>
        <h6 class="card-subtitle mb-2">Label : <?= $vehicle->getLabel() ?></h6>
        <p class="card-text">Type of Vehicle: <?= $vehicle->getType() ?></p>
        <a href="#" class="card-link btn btn-primary">Detail</a>
        <a href="#" class="card-link btn btn-primary">Edit</a>
      </div>
    </div>

<?php } ?>
  </div>
</div>

 <?php
   include("template/footer.php")
  ?>
