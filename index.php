<?php

require 'lib/functions.php';

$pets = get_pets(3);

$pets = array_reverse($pets);

$titleMessage = 'All the love, none of the crap!';
try {
    $cleverWelcomeMessage = ucwords($titleMessage);
    $pupCount = count(get_pets());
} catch (Exception $e) {
    $pupCount = 'There are no pups available at the moment';
}

?>

<?php require 'layout/header.php'; ?>

    <div class="jumbotron">
        <div class="container">
            <h1><?php echo $cleverWelcomeMessage; ?></h1>

            <p> <?php echo ucwords(' Over '), $pupCount,  strtolower(' Cute pup friends');?></p>

            <p><a class="btn btn-primary btn-lg">Learn more &raquo;</a></p>
        </div>
    </div>

    <div class="container">

        <div class="container">
            <div class="row">
                <?php foreach ($pets as $cutePet) { ?>

                   <?php echo '<div class="col-md-4 pet-list-item">' ?>

                        <h2>
                            <a href="/show.php?id=<?php echo $cutePet['id']; ?>">
                                <?php echo ucwords($cutePet['name'] )?>
                            </a>
                        </h2>
                        <img src="./images/<?php echo $cutePet['image'] ?>" class="img-rounded img-responsive">
                        <blockquote class="pet-details">
                            <span class="label label-info"> <?php  echo $cutePet['breed'] ?>&nbsp;</span>
                            <?php
                                if(!array_key_exists('age', $cutePet) || $cutePet['age'] === '') {
                                    echo 'Age Unknown ||';
                                }elseif ($cutePet['age'] === 'hidden'){
                                    echo '(contact owner for age)';
                                }else{
                                    echo $cutePet['age'];
                                }
                                ?>
                            <?php  echo $cutePet['weight'] ?>lbs
                        </blockquote>
                        <p><?php  echo $cutePet['bio'] ?> </p>

                    <?php echo '</div>' ?>

                <?php } ?>
            </div>
        </div>
    </div>

<?php require 'layout/footer.php'; ?>