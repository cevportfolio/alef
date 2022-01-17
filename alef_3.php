<?php
  // Задание 3
  // Возьмите все числа от 1 до 1000 (включительно). Выбросьте из этой последовательности все числа, где одна и та же цифра встречается более, чем 1 раз. 
  // Найдите сумму оставшихся чисел.
  // 

  function randomIntegerArraySum() {
    $assocArr = array();
    $assocArrRepeats = array();
    $assocArrSum = 0;
    $assocArrRepeatsSum = 0;
    $upperLimit = 1000;
    $startAt = 1;
    for ($i = $startAt; $i <= $upperLimit; $i++) {
      $indexedArr[$i] = random_int($startAt, $upperLimit);
      // echo "Random number: ".$indexedArr[$i].PHP_EOL;

      // Maybe isset is faster than array_key_exists
      if (!array_key_exists($indexedArr[$i], $assocArr)) {
        $assocArr[$indexedArr[$i]] = $indexedArr[$i];
        $assocArrSum += $assocArr[$indexedArr[$i]];      
        // echo "Associated Array: ".$assocArr[$indexedArr[$i]].PHP_EOL;
      } else {
        if (!array_key_exists($indexedArr[$i], $assocArrRepeats)) {
          $assocArrRepeats[$indexedArr[$i]] = $indexedArr[$i];
          $assocArrRepeatsSum += $assocArrRepeats[$indexedArr[$i]];
          // echo "Repeats: ".$assocArrRepeats[$indexedArr[$i]].PHP_EOL;    
        } 
      }
    }
    echo "Total sum without repeats: ".($assocArrSum - $assocArrRepeatsSum);
  }
  randomIntegerArraySum();
?>