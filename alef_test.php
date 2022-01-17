<?php  
  // Задание 1
  // Дан массив [[399, 9160, 144, 3230, 407, 8875, 1597, 9835], [2093, 3279, 21, 9038, 918, 9238, 2592, 7467], [3531, 1597, 3225, 153, 9970, 2937, 8, 807],
  //             [7010, 662, 6005, 4181, 3, 4606, 5, 3980], [6367, 2098, 89, 13, 337, 9196, 9950, 5424], [7204, 9393, 7149, 8, 89, 6765, 8579, 55], 
  //             [1597, 4360, 8625, 34, 4409, 8034, 2584, 2], [920, 3172, 2400, 2326, 3413, 4756, 6453, 8], [4914, 21, 4923, 4012, 7960, 2254, 4448, 1]]. 
  // Среди его ячеек некоторые числа явлвяются простыми числами. Найдите сумму простых чисел в этом массиве.
  // 
  // Описание решения
  // http://mech.math.msu.su
  //  

  function sumOfAllPrimes() {
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
    $sum = 0;
    for ($row = 0; $row < count($arr); $row++) {
      for ($el = 0; $el < count($arr[$row]); $el++) {
        if ($arr[$row][$el] == 2) {
          $sum += $arr[$row][$el];
        } elseif ($arr[$row][$el]%2 > 0 && $arr[$row][$el] > 1) {
          for ($i = 3; $i < sqrt($arr[$row][$el]); $i += 2) {
            if ($arr[$row][$el]%$i==0) {
              goto outer;
            }
          }
          $sum += $arr[$row][$el];
        }
        outer:;
      }
    }
    echo $sum;
  }

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

  // Задание 2 тест
  // Задание на базе игры "Быки и коровы". Суть игры состоит в том, что ведущий загадывает четырехзначное число, а игрок пытается его угадать. 
  // Игрок на каждом ходу сообщает ведущему свое предположение (четырехзначное число, тот в свою очередь овтечает ему: "ты угадал столько-то букв, 
  // из них столько-то на своем месте").
  // 
  // Например: если ведущий загадал число 3810, а игрок предположил "0856", то ведущий должен ответить "угадал 2 цифры, из них на своем месте 1 цифра". 
  // Итак задание: ваша программа является ведущим в этой игры. Загадно число "3810".
  // Программа должна последовательно вывести ответы на следующие числа: 2679, 1234, 5678, 0183, 3801, 3810. 
  // Каждый ответ должен быть на новой строке и должен быть записан в формате "x-x", где первое число это количество совпавших цифр, 
  // а второе — кол-во совпавших цифр, находящихся на своей позиции.
  // 

  function gameGuessANumber() {
    $inPlace = 0;
    $found = 0;
    $proposedNumber = "3810";
    $arrIndexedProposedNumber = str_split($proposedNumber, 1);
    $arrGuesses = array("2679", "1234", "5678", "0183", "3801", "3810");
    for ($i = 0; $i < count($arrGuesses); $i++) {
      // $arrIndexedGuesses = str_split($arrGuesses[$i], 1);
      for ($j = 0; $j < count($arrIndexedProposedNumber); $j++) {        
        $pos = strpos($arrGuesses[$i], $arrIndexedProposedNumber[$j]);
        // echo "pos -- ".$pos.PHP_EOL;
        // var_dump($pos);
        // echo $arrIndexedProposedNumber[$j].PHP_EOL;
        // echo $j.PHP_EOL;
        // if ($pos === 0) {
        //   echo "pos -- ".$pos.PHP_EOL;
        //   echo "j -- ".$j.PHP_EOL;
        // }
        if (($pos == true && $j === $pos) || $pos ===0 && $j === $pos) {
          // echo "j -- ".$j.PHP_EOL;
          $inPlace += 1;
          $found += 1;
        } elseif (($pos == true && $j !== $pos || $pos === 0)) {
          // echo "j -- ".$j.PHP_EOL;
          // echo "pos -- ".$pos.PHP_EOL;
          $found += 1;
        } else {
        }
      }
      $answer = $found."-".$inPlace;
      echo $answer.PHP_EOL;      
      $found = 0;
      $inPlace = 0;
    }
  }

  // sumOfAllPrimes();
  // randomIntegerArraySum();
  gameGuessANumber();
?>