<?php
  if (isset($_POST['dbName']) === true && empty($_POST['dbName']) === false &&
      isset($_POST['dbUser']) === true && empty($_POST['dbUser']) === false &&
      isset($_POST['dbPassword']) === true && empty($_POST['dbPassword']) === false) {
    include("dbconnect.php");
    $login = (trim($_POST['login']));
    $password = (trim($_POST['password']));
    
    $index = (int)$area - 1;
    if ((int)$area == 7) {
      $index = (int)$area - 2;
    }
    date_default_timezone_set("UTC"); // Устанавливаем часовой пояс по Гринвичу
    $time = time(); // Вот это значение отправляем в базу
    $time += 11 * 3600; // Добавляем 11 часов к времени по Гринвичу
    $dateTimeDoc = date("Y-m-d H:i:s", $time); // Выводим время пользователя, согласно его часовому поясу

    $date = date("Y-m-d H:i:s");
    $currDate = date("Y-m-d H:i:s");
    $currDate = strtotime($dateTimeDoc);
    $date = strtotime($dateTimeDoc);
    if ($accounting == "1") {
      // $date = date('Y-m-d', $date);
    } else {
      $date = strtotime("-4 day", $date);
    }
    if (empty($_POST['dateStart']) === false && empty($_POST['dateEnd']) === false) {
      $dateStart = (trim($_POST['dateStart']));
      $dateEnd = (trim($_POST['dateEnd']));
    } else {
      $dateStart = date('Y-m-d', $date);
      $dateEnd = date('Y-m-d H:i:s', $currDate);
    }
    $areaArray[0] = 'invoice_one';
    $areaArray[1] = 'invoice_two';

    $resultArray = array();
    $tempArray = array();
    if ($reportType == 'report') {
      if ($salesPartnerTrigger == false && $areaTrigger == false) {
        for ($i = 0; $i < count($areaArray); $i++) {
          $areaArrayTmp = $areaArray[$i];
          $sql = "SELECT $areaArrayTmp.ID, InvoiceNumber, AgentID, SalesPartnerID, AccountingType,
          ItemID, Quantity, Price, Total, ExchangeQuantity, ReturnQuantity, DateTimeDocLocal,
          InvoiceSum, номенклатура.Наименование, salespartners.Юр_Наименование FROM $areaArrayTmp
          INNER JOIN номенклатура ON $areaArrayTmp.ItemID = номенклатура.Артикул
          INNER JOIN salespartners ON $areaArrayTmp.SalesPartnerID = salespartners.ID
          WHERE DateTimeDocLocal BETWEEN '$dateStart' AND '$dateEnd'  ORDER BY ItemID";
          if ($result = mysqli_query($dbconnect, $sql)){
            while($row = $result->fetch_object()){
              $tempArray = $row;
              array_push($resultArray, $tempArray);
            }
          } else {
            $json["failed"] = 'Login failed. Invalid login
            and/or password';
            echo json_encode($json, JSON_UNESCAPED_UNICODE);
            mysqli_close($dbconnect);
          }
        }
      }
    }
    echo json_encode($resultArray, JSON_UNESCAPED_UNICODE);
    mysqli_close($dbconnect);
  }
?>