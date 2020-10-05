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

?>
<h2>Request Animal Facts</h2>
<form action="#" method="POST">
    <label for="amount"> Enter the amount of facts:
    <input type="number" id="amount" name="amount"></label>
    <label for="animal-type">Enter the type of animal:
    <input type="text" id ="animal-type" name="type">
    </label>
    <input type="submit" value="Get Animal Facts!">
    </form>

<?php

$factsListResponse = file_get_contents(
    "https://cat-fact.herokuapp.com/facts/random?amount={$_POST
        ['amount']}&animal_type={$_POST
            ['type']}"
);

if( $factsListResponse )
{
    $factsList = json_decode( $factsListResponse );
    ?>
        <h2>
            List of
            <?php echo ucfirst( $_POST['type']); ?>
        </h2>
        <ol>
        <?php foreach ( $factsList as $fact): ?>
        <li>
            <?php echo $fact->text; ?>
        </li>
        <?php endforeach; ?>          
            
           
        </ol>
        <?php
}

// var_dump( $factsListResponse);


include './templates/footer.php';