<?php
require 'lib/functions.php';

$id = $_GET['id'];
$pet_details = get_pet_details($id);

?>

<?php require 'layout/header.php'; ?>

<h1>Meet <?php echo $pet_details['name']; ?></h1>

<div class="container ">
    <div class="row m-2">
        <div class="col-xs-3 pet-list-item">
            <img src="/images/<?php echo $pet_details['image'] ?>" class="pull-left img-rounded" />
        </div>
        <div class="col-xs-6">
            <p>
                <?php echo $pet_details['bio']; ?>
            </p>

            <table class="table">
                <tbody>
                <tr>
                    <th>Breed</th>
                    <td><?php echo $pet_details['breed']; ?></td>
                </tr>
                <tr>
                    <th>Age</th>
                    <td><?php echo $pet_details['age']; ?></td>
                </tr>
                <tr>
                    <th>Weight</th>
                    <td><?php echo $pet_details['weight']; ?></td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require 'layout/footer.php'; ?>