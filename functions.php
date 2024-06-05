<?php

function add($num1, $num2) {
  return $num1 + $num2;
}

function subtract($num1, $num2) {
  return $num1 - $num2;
}

function multiply($num1, $num2) {
  return $num1 * $num2;
}

function divide($num1, $num2) {
  return $num1 / $num2;
}

function exponentiate($num1, $num2) {
  return pow($num1, $num2);
}

function calculatePercentage($num, $percentage) {
  return ($num * $percentage) / 100;
}

function squareRoot($num) {
  return sqrt($num);
}

function logarithm($num, $base = 10) {
  if ($num <= 0) {
    return "Logarithm is not defined for non-positive numbers.";
  } else {
    return log($num, $base);
  }
}

?>
