<?php

namespace Larowlan\RomanNumeral;

/**
 * Defines a class for generating roman numerals from integers.
 */
class RomanNumeralGenerator {

  // List of roman possible basic combinations of roman numerals.
  protected static $map = [
    1000 => 'M',
    900 => 'CM',
    500 => 'D',
    400 => 'CD',
    100 => 'C',
    90 => 'XC',
    50 => 'L',
    40 => 'XL',
    10 => 'X',
    9 => 'IX',
    5 => 'V',
    4 => 'IV',
    1 => 'I',
  ];

  /**
   * Generates a roman numeral from an integer.
   *
   * @param int $number
   *   Integer to convert.
   * @param bool $lowerCase
   *   (optional) Pass TRUE to convert to lowercase. Defaults to FALSE.
   *
   * @return string
   *   Roman numeral representing the passed integer.
   */
  public function generate(int $number, bool $lowerCase = FALSE) : string {
    $returnValue = '';
    // Keep adding roman numerals in $returnValue string and deduct the value from $number until it becomes 0.
    while ($number > 0) {
      foreach (RomanNumeralGenerator::$map as $int => $roman) {
        if($number >= $int) {
          $number -= $int;
          $returnValue .= $roman;
          break;
        }
      }
    }
    // Return lower case roman numerals if $lowerCase is TRUE
    return $lowerCase ? strtolower($returnValue) : $returnValue;
  }
}
