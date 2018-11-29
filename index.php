<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" type="text/css" href="style2.css">
   </head>
    <p style="margin-left:970px;">Moja sprzedaż:</p>
    <p style="margin-left:970px; top:150px">Moje zakupy:</p>
    <p style="margin-left:970px; top:300px">Wprowadź nowe:</p>
    <body>
<form method="post">
    <input type="submit" name="mainTable" id="mainTable" style="position:absolute; margin-left:50px; top:20px; height:31px;"  value="Pokaż wszystkie elementy" /><br/>
    <br>
    <input id="filter" type="text" name="filter" style="position:absolute; height:25px; margin-left:250px; top:20px" value=""><br>
    <br>
    
    <input type="submit" class="selectBuy" name="buyBtn" id="buyBtn" style="margin-left:450px; top: 230px; width: 170px; height: 30px;"  value="Dodaj zakupione do bazy" />
    <input type="submit" class="selectBuy" name="confirmDeliverToPL" id="confirmDeliverToPL" style="margin-left:450px; top: 275px; width: 170px; height: 30px;"  value="Potwierdź dostawę do PL" />
    <table id="sellTable" style="margin-left:970px; width:400px; position:absolute; top:80px">
    <tr class="header"><td style="width:150px">Nazwa</td></td><td>Cena sprzedaży</td><td>Pobranie</td><td>Kwota pobrania</td></tr>
    </table>
    <table id="buyTable" style="margin-left:970px; width:400px; position:absolute; top:200px">
    <tr class="header"><td style="width:35%">Nazwa</td></td><td style="width:20%">Kwota zakupu</td><td>Ilość</td><td>Sprzedawca</td></tr>
    </table>
    <input type="text" class="select1" name="Sell_price" id="Sell_price" style="margin-left:150px; width: 70px;"/>
    <input type="checkbox" class="select1" name="If_cash_on_delivery" id="If_cash_on_delivery" style="margin-left:240px; width: 70px;" value="0"/>
    <input type="text" class="select1" name="Cash_on_delivery" id="Cash_on_delivery" style="margin-left:323px; width: 70px; background-color:#dddddd" readonly/>
    <input type="submit" class="select1" name="sellBtn" id="sellBtn" style="margin-left:450px; width: 170px; height: 30px;" onclick="CheckBuyValue()" value="Sprzedaj" />
    <input type="text" class="selectBuy" name="Buy_price" id="Buy_price" style="margin-left:140px; width: 70px;"/> 
    <input type="text" class="selectBuy" name="Quantity" id="Quantity" style="margin-left:220px; width: 50px;"/>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
function Cash_on_delivery() {
    if (document.getElementById("If_cash_on_delivery").checked == true) {
        document.getElementById("Cash_on_delivery").readOnly = false;
        document.getElementById("Cash_on_delivery").style.backgroundColor = 'white';
    }
    else {
        document.getElementById("Cash_on_delivery").readOnly = true;
        document.getElementById("Cash_on_delivery").style.backgroundColor = '#dddddd';
    }
    
}
</script>

<?php  
function lacz_bd() {  
  $db = new mysqli('localhost', 'Michal', '123', 'wskazniki');  
    if (! $db)
      return false;
   $db->autocommit(TRUE);
   return $db;
}

function select_From_DB($Select) {
//połaczenie z bazą
$rowColor = array("#ffffff","#e1f2e1");
$db = lacz_bd();
//zapytanie sql do bazy określające jakie dane mają zostać pobrane
$zapytanie = "SELECT * FROM wskazniki ORDER BY Buy_date";
//pobranie wyniku zapytania
$wynik = $db->query($zapytanie);
//obliczanie ilości rekordów
$ile_znalezionych = $wynik->num_rows;
//rozpoczynamy budowanie tabeli dla naszych danych
StartTable("mainTable");
//echo '<table id="mainTable">';
$parameter = array ("", "In", "Nazwa", "Cena zakupu", "Ilość", "Data zakupu", "Ile zam.");
AddTableRow(7, "header", $parameter);
//pętla po rekordach z bazy
$index = 0;
$namesIndex = array();
for ($i=0; $i <$ile_znalezionych; $i++) {
    $temp = 0;
    $wiersz = $wynik->fetch_assoc();
    $zapytanie3 = "SELECT * FROM item WHERE Name LIKE '%$Select%' AND ID=".$wiersz['Item_ID'];
    $wynik3 = $db->query($zapytanie3);
    $howRekordsDelivered = ($db->query("SELECT * FROM wskazniki WHERE Item_ID=".$wiersz['Item_ID']." AND delivered_to_Poland=1 AND Sell_price IS NULL"))->num_rows;
    $howRekordsOnDelivery = ($db->query("SELECT * FROM wskazniki WHERE Item_ID=".$wiersz['Item_ID']." AND delivered_to_Poland IS NULL"))->num_rows;
    $wiersz3 = $wynik3->fetch_assoc();
    if ($wiersz3['Name'] != "") {
        if (in_array ($wiersz3['Name'] , $namesIndex) == 1) $temp = 1;
        if ($temp != 1) {  
            array_push($namesIndex, $wiersz3['Name']);
            $index += 1;
            echo '<tr style="background-color:'.$rowColor[($index % 2)].';hover {background-color: yellow}">';
            echo '<td></td>';
            echo '<td style="width:2%">'.$index.'</td>';
            $zapytanie2 = "SELECT Name FROM item WHERE ID=".$wiersz['Item_ID'];
            $wynik2 = $db->query($zapytanie2);
            $wiersz2 = $wynik2->fetch_assoc();
            echo '<td>'.$wiersz2['Name'].'</td>';
            echo '<td style="width:150px">'.$wiersz['Buy_price'].'</td>';
            echo '<td>'.$howRekordsDelivered.'</td>';
            //echo '<td>'.$wiersz['Buy_price'].'</td>';
            echo '<td>'.$wiersz['Buy_date'].'</td>';
            echo '<td style="width:2%">'.$howRekordsOnDelivery.'</td>';
            echo '</tr>';
        }
    }
}
echo '</table>';
//echo json_encode($namesIndex);

echo '<select class="select1" name="select1">';
for ($i=0; $i <count ($namesIndex); $i++) {
    echo '<option>'.$namesIndex[$i].'</option>';
}
echo '</select>';

echo '<select class="selectBuy" name="selectBuy">';
for ($i=0; $i <count ($namesIndex); $i++) {
    echo '<option>'.$namesIndex[$i].'</option>';
}
echo '</select>';

$showSeller = ($db->query("SELECT Seller_name FROM seller")); 
if ($showSeller->num_rows > 0) {
    echo '<select class="selectBuy" name="selectSeller" style="margin-left:280px">';
    while($row = $showSeller->fetch_assoc()) {
        echo '<option>'.$row['Seller_name'].'</option>';
    }
    echo '</select>';
}
echo '</select>';
    echo "</form>";
closeDB($db);
}
if(array_key_exists('mainTable',$_POST)){
    select_From_DB($_POST['filter']);
   // select_From_DB("ADDCO BOOST");
}
if (isset($_POST['sellBtn'])) { // Update record when SELL item
    if ($_POST['Sell_price']=="") {
        exit();
    } else {
        $db = lacz_bd();
        $selectItemId = "SELECT ID FROM item WHERE Name = '".$_POST['select1']."'";
        $wynik0 = $db->query($selectItemId);
        $itemID = $wynik0->fetch_assoc();
        $selectOneItem = "SELECT ID FROM wskazniki WHERE delivered_to_Poland = 1 AND Item_ID = '".$itemID['ID']."'";
        $wynik00 = $db->query($selectOneItem);
        $ID = $wynik00->fetch_assoc();
        $today = getdate();
        $todayDate = $today['year']."-".$today['mon']."-".$today['mday'];
        //$updateSellValue = "UPDATE wskazniki SET Sell_price=NULL ,Sell_date = NULL";
        $updateSellValue = "UPDATE wskazniki SET Sell_price=".$_POST['Sell_price'].", Sell_date='".$todayDate."' WHERE ID=".$ID['ID'];
        if ($db->query($updateSellValue)=== TRUE ) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $db->error;
        }
        closeDB($db);
        select_From_DB($_POST['filter']);
    }
}
if (isset($_POST['buyBtn'])) { // Set record when BUY item
    if ($_POST['Buy_price']=="" Or $_POST['Quantity']=="") {
        echo ("Wpisz wymagane dane");
        closeDB($db);
        exit();
    } else {
        $db = lacz_bd();
        $selectItemId = "SELECT ID FROM item WHERE Name = '".$_POST['selectBuy']."'";
        $wynik0 = $db->query($selectItemId);
        $itemID = $wynik0->fetch_assoc();
        $selectSellerId = "SELECT ID FROM seller WHERE Seller_name = '".$_POST['selectSeller']."'";
        $wynik01 = $db->query($selectSellerId);
        $sellerID = $wynik01->fetch_assoc();
        $today = getdate();
        $todayDate = $today['year']."-".$today['mon']."-".$today['mday'];
        echo $todayDate;
        $singleItemPrice = ($_POST['Buy_price']) / ($_POST['Quantity']);
        for ($i=0; $i<$_POST['Quantity']; $i++) {
            $insertSQL = "INSERT INTO wskazniki (Item_ID, Buy_date, Buy_price, seller_ID) VALUES (".$itemID['ID'].", '".$todayDate."', ".$singleItemPrice.", ".$sellerID['ID'].")";
            if ($db->query($insertSQL)=== TRUE) {
                echo "New record created successfully </br>";
            } else {
                echo "Error updating record: " . $db->error . " </br>";
            }
        }
    }
    closeDB($db);
    select_From_DB($_POST['filter']);
}
        
if (isset($_POST['confirmDeliverToPL'])) { // Update record when item arrived to PL
    if ($_POST['Quantity']=="") {
        echo ("Wpisz wymagane dane");
        exit();
    } else {
        $db = lacz_bd();
        $selectItemId = "SELECT ID FROM item WHERE Name = '".$_POST['selectBuy']."'";
        $wynik0 = $db->query($selectItemId);
        $itemID = $wynik0->fetch_assoc();
        $selectUndeliveredItems = "SELECT ID FROM wskazniki WHERE delivered_to_Poland IS NULL AND Item_ID = '".$itemID['ID']."' ORDER BY Buy_date";
        $wynik00 = $db->query($selectUndeliveredItems);
        $ile_znalezionych = $wynik00->num_rows;
        if ($ile_znalezionych < $_POST['Quantity']) {
            echo ("Elementów w transporcie jest mniej niż potwierdzasz");
            closeDB($db);
            exit();  
        } else {
            for ($i=0; $i<$_POST['Quantity']; $i++) {
                $ID = $wynik00->fetch_assoc();
                $updateDeliveryToPL = "UPDATE wskazniki SET delivered_to_Poland=1 WHERE ID=".$ID['ID'];
                if ($db->query($updateDeliveryToPL)=== TRUE ) {
                    echo "Record updated successfully  </br>";
                } else {
                    echo "Error updating record: " . $db->error . " </br>";
                }
            }
        }
        closeDB($db);
        select_From_DB($_POST['filter']);
    }
}
function closeDB($db) {
    mysqli_close($db);
}
function StartTable($tableID) {
    echo '<table id='.$tableID.'>' ;
}
function AddTableRow(int $index, $class, $parameter) {
    echo '<tr class='.$class.'>';
        for ($i=0; $i < $index; $i++) {
            echo '<td>'.$parameter[$i].'</td>';
        }
    echo '</tr>';
}
?>
 </body>
</html>