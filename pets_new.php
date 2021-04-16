<?php
require 'layout/header.php';
require 'lib/functions.php';
?>

<?php

    if ($_SERVER['REQUEST_METHOD'] === 'POST'){
        if (isset($_POST['name'])){
            $name = $_POST['name'];
        }else{
            $name = '';
        }
        $breed = $_POST['breed'] ?? '';
        $weight = $_POST['weight'] ?? '';
        $bio = $_POST['bio'] ?? '';

        $pets = get_pets();
        $newPets = array(
            "name" => $name,
            "breed" => $breed,
            "age" => '',
            "weight" => $weight,
            "bio" => $bio,
            "image" => ''
        );

        $pets[] = $newPets;
        save_pets($pets);

        header('Location: /');
    }
?>
<?php //var_dump($name, $breed, $weight, $bio); die(); ?>
<div class="container">
    <div class="row">
        <div class="col-xs-6">
            <h2>Add your Pets here</h2>
            <form action="/pets_new.php" method="post" >
                <div class="form-group">
                    <label for="pet-name" class="control-label">Pet Name</label>
                    <input type="text" name="name" class="form-control" id="pet-name">
                </div>
                <div class="form-group">
                    <label for="pet-name" class="control-label">Breed</label>
                    <input type="text" name="breed" class="form-control" id="pet-breed">
                </div>
                <div class="form-group">
                    <label for="pet-name" class="control-label">Weight (lbs)</label>
                    <input type="number" name="weight" class="form-control" id="pet-weight">
                </div>
                <div class="form-group">
                    <label for="pet-name" class="control-label">Pet Bio</label>
                    <input type="text" name="bio" class="form-control" id="pet-bio">
                </div>

                <button type="submit" class="btn btn-primary">
                    <span class="glyphicon glyphicon-heart"> Add</span>
                </button>

            </form>
        </div>
    </div>
</div>
<?php require 'layout/footer.php'; ?>
