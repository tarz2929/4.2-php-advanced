<?php
$GLOBALS['pageTitle'] = 'Cat Facts using an API';
include './templates/header.php';


$dailyCatFactResponse = file_get_contents('https://cat-fact.herokuapp.com/facts/random');

// var_dump( $dailyCatFactResponse);

if ( $dailyCatFactResponse)
{
    $dailyCatFact = json_decode( $dailyCatFactResponse);
    ?>
    <h2>Today's Cat Fact:</h2>
    <p><?php echo $dailyCatFact->text; ?> </p>   

    <?php
}



include './templates/footer.php';