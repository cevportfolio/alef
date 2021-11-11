<?php
  $arr = array (
    array(399, 9160, 144, 3230, 407, 8875, 1597, 9835), 
    array(2093, 3279, 21, 9038, 918, 9238, 2592, 7467), 
    array(3531, 1597, 3225, 153, 9970, 2937, 8, 807),
    array(7010, 662, 6005, 4181, 3, 4606, 5, 3980), 
    array(6367, 2098, 89, 13, 337, 9196, 9950, 5424), 
    array(7204, 9393, 7149, 8, 89, 6765, 8579, 55), 
    array(1597, 4360, 8625, 34, 4409, 8034, 2584, 2), 
    array(920, 3172, 2400, 2326, 3413, 4756, 6453, 8), 
    array(4914, 21, 4923, 4012, 7960, 2254, 4448, 1)
  );
    
  // function sumOfAllPrimes($arr) {
  //   $sum = 0;
  //   for ($row = 0; $row < count($arr); $row++) {
  //     for ($el = 0; $el < count($arr[$row]); $el++) {
  //       if ($arr[$row][$el] == 2) {
  //         $sum += $arr[$row][$el];
  //       } elseif ($arr[$row][$el]%2 > 0 && $arr[$row][$el] > 1) {
  //         for ($i = 3; $i < sqrt($arr[$row][$el]); $i += 2) {
  //           if ($arr[$row][$el]%$i==0) {
  //             goto outer;
  //           }
  //         }
  //         $sum += $arr[$row][$el];
  //       }
  //       outer:
  //     }
  //   }
  //   echo $sum;
  // }

  function randomInteger() {
    for ($i = 1; $i < 1000; $i++) {
      $arr[$i] = random_int(1, 1000);
      // echo "Random number: ".$arr[$i].PHP_EOL;
    }
  }

  function sumOfTheRestInts() {
    
  }
  
  sumOfAllPrimes($arr);
  // randomInteger();
?>