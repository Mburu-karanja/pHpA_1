<?php

// Include the functions script
require_once('functions.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

  // Get user input
  $num1 = $_POST['number1'];
  $num2 = $_POST['number2'];
  $operation = $_POST['operation'];

  // Validate input (check for empty fields and invalid characters)
  if (empty($num1) || empty($num2) || !is_numeric($num1) || !is_numeric($num2)) {
    $error = "Please enter valid numbers.";
  } else {
    // Convert numbers to floats
    $num1 = floatval($num1);
    $num2 = floatval($num2);

    // Call the appropriate function based on operation
    switch ($operation) {
      case '+':
        $result = add($num1, $num2);
        break;
      case '-':
        $result = subtract($num1, $num2);
        break;
      case '*':
        $result = multiply($num1, $num2);
        break;
      case '/':
        if ($num2 == 0) {
          $error = "Division by zero is not allowed.";
        } else {
          $result = divide($num1, $num2);
        }
        break;
      case '^':
        $result = exponentiate($num1, $num2);
        break;
      default:
        $error = "Invalid operation selected.";
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multipurpose Calculator</title>
</head>
<body>
  <h1>Multipurpose Calculator</h1>

  <?php if (isset($error)): ?>
    <p style="color: red;"><?php echo $error; ?></p>
  <?php endif; ?>

  <form action="" method="post">
    <label for="number1">Number 1:</label>
    <input type="text" name="number1" id="number1" value="<?php echo isset($num1) ? $num1 : ''; ?>">
    <br>

    <label for="number2">Number 2:</label>
    <input type="text" name="number2" id="number2" value="<?php echo isset($num2) ? $num2 : ''; ?>">
    <br>

    <label for="operation">Operation:</label>
    <select name="operation" id="operation">
      <option value="+">+</option>
      <option value="-">-</option>
      <option value="*">*</option>
      <option value="/">/</option>
      <option value="^">^</option>
    </select>
    <br>

    <input type="submit" value="Calculate">
  </form>

  <?php if (isset($result)): ?>
    <p>Result: <?php echo $result; ?></p>
  <?php endif; ?>

</body>
</html>
