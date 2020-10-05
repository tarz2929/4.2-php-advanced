<?php
// Try to avoid use of globals unless they are absolutely necessary...
$GLOBALS['pageTitle'] = 'PHP Calculator';

// Show our header.
include './templates/header.php';

echo '<pre>';
var_dump( $_GET );
var_dump( $_POST ); // POST is handled the same way!
echo '</pre>';

$result = FALSE;
if ( !empty( $_GET ) )
{
  switch ( $_GET['op'] )
  {
    case 'addition':
      $result = $_GET['value1'] + $_GET['value2'];
      break;
    case 'subtraction':
      $result = $_GET['value1'] - $_GET['value2'];
      break;
    case 'multiplication':
      $result = $_GET['value1'] * $_GET['value2'];
      break;
    case 'division':
      $result = $_GET['value1'] / $_GET['value2'];
      break;
  }
}


?>

<p>
  Welcome to our Calculator page!
</p>

<form method="GET" action="calc.php">
<label for ="num1">
    Enter first operand:
    <input
        id="num1"
        name="value1"
        type="number"
        value="">
  </label>

  <label for="operator">
    Select an operator:

    <Select id="operator" name="op">
    <option value="addition">
    +
    </option>
    <option value="subtraction">
    -
    </option>
    <option value="multiplication">
    &times;
    </option>
    <option value="division">
    &divide;
    </option>



    </Select>

  <label for ="num2">
    Enter second operand:
    <input
        id="num2"
        name="value2"
        type="number"
        value="">
  </label>

  <input type="submit" value="Calculate!">

</form>

<?php // Show our footer.
include './templates/footer.php';