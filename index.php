<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" type="text/css" href="style1.css">
   </head>
    <p style="margin-left:970px; top:30px">Moja sprzedaż:</p>
    <p style="margin-left:970px; top:150px">Moje zakupy:</p>
    <p style="margin-left:970px; top:300px">Historia działań:</p>
    
    <body>
<form method="post">
    <p1 class="dateLabel" style = "left: 50px">Od daty:</p1>
        <input type="date" class="dateLabel" style="left: 50px; top:35px" id="dataStart" name="dataStart">
    <p1 class="dateLabel" style = "left: 200px">Do daty:</p1>
        <input type="date" class="dateLabel" style="left: 200px; top:35px" id="dataStop" name="dataStop">
    <input type="submit" name="mainTable" id="mainTable" style="position:absolute; margin-left:15px; top:50px; height:31px;"  value="Pokaż wszystkie elementy" /><br/>
    <br>
    <p1 style="left: 230px; position:absolute; top:55px"><b>FILTR:</b></p1> 
    <input id="filter" type="text" name="filter" style="position:absolute; height:25px; margin-left:295px; top:50px" value=""><br>
    <p1 style="left: 10px; position:absolute; top:15px"><b>Login:</b></p1> 
    <input id="login" type="text" name="login" style="position:absolute; height:25px; margin-left:60px; top:4px" value="Michal">
    <p1 style="left: 245px; position:absolute; top:15px"><b>Hasło:</b></p1> 
    <input id="password" type="password" name="password" style="position:absolute; height:25px; margin-left:295px; top:4px" value="123">
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
    <input type="text" class="select1" name="Cash_on_delivery" id="Cash_on_delivery" style="margin-left:323px; width: 70px; background-color:#dddddd" readonly/>
    <input type="submit" class="select1" name="sellBtn" id="sellBtn" style="margin-left:450px; width: 170px; height: 30px;" value="Sprzedaj" />
    <input type="text" class="selectBuy" name="Buy_price" id="Buy_price" style="margin-left:140px; width: 70px;"/> 
    <input type="text" class="selectBuy" name="Quantity" id="Quantity" style="margin-left:220px; width: 50px;"/>
    <input type="checkbox" class="select1" name="If_cash_on_delivery" id="If_cash_on_delivery" style="margin-left:240px; width: 70px;" value="0" onclick="CashOnDelivery()" >
    
<!--</form>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
function CashOnDelivery() {
    if (document.getElementById("If_cash_on_delivery").checked == true) {
        document.getElementById("Cash_on_delivery").readOnly = false;
        document.getElementById("Cash_on_delivery").style.backgroundColor = 'white';
    }
    else {
        document.getElementById("Cash_on_delivery").readOnly = true;
        document.getElementById("Cash_on_delivery").style.backgroundColor = '#dddddd';
    }
    
}
window.onload = function getTodayDate() {
    let data = new Date;
    let fullDataToday = data.getFullYear() + "-" + (data.getMonth()+1) + "-" + data.getDate();
    let fullDataYesterday = data.getFullYear() + "-" + (data.getMonth()+1) + "-" + (data.getDate()-1);
    document.getElementById("dataStop").value=fullDataToday;
    document.getElementById("dataStart").value=fullDataYesterday;
}
</script>

<?php  
function lacz_bd() {
    $password = $_POST['password'];
    $login = $_POST['login'];
    $db = new mysqli('localhost', $login, $password, 'wskazniki');  
    if ($db->connect_error) {
        echo "Błąd logowania <br>" ;
        die('Connect Error: ' . $db->connect_error);
        return false;
    }
    if (! $db) {
        echo "Błąd logowania";
        exit();
        return false;
    }
   $db->autocommit(TRUE);
   return $db;
}
function query_DB($db, $sql) {
    $wynik = $db->query($sql);
    return $wynik;
}
function select_From_DB($Select) {
//połaczenie z bazą
$rowColor = array("#ffffff","#e1f2e1");
    $db = lacz_bd();
//zapytanie sql do bazy określające jakie dane mają zostać pobrane
//$zapytanie = "SELECT * FROM wskazniki ORDER BY Buy_date";
//pobranie wyniku zapytania
//$wynik = $db->query($zapytanie);
$wynik= query_DB($db, "SELECT * FROM wskazniki ORDER BY Buy_date");
//obliczanie ilości rekordów
$ile_znalezionych = $wynik->num_rows;
//rozpoczynamy budowanie tabeli dla naszych danych
StartTable("mainTable");
$parameter = array ("", "In", "Nazwa", "Cena zakupu", "Ilość", "Data zakupu", "Ile zam.");
AddTableRow(7, "header", $parameter);
//pętla po rekordach z bazy
$index = 0;
$namesIndex = array();
for ($i=0; $i <$ile_znalezionych; $i++) { // Create main table
    $temp = 0;
    $wiersz = $wynik->fetch_assoc();
    //$zapytanie3 = "SELECT * FROM item WHERE Name LIKE '%$Select%' AND ID=".$wiersz['Item_ID'];
    //$wynik3 = $db->query($zapytanie3);
    $wynik3= query_DB($db, "SELECT * FROM item WHERE Name LIKE '%$Select%' AND ID=".$wiersz['Item_ID']);
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
            echo '<td>'.$wiersz['Buy_date'].'</td>';
            echo '<td style="width:2%">'.$howRekordsOnDelivery.'</td>';
            echo '</tr>';
        }
    }
}
echo '</table>';
echo json_encode($namesIndex);
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
echo '</form>';
closeDB($db);
}
if(array_key_exists('mainTable',$_POST)){
    select_From_DB($_POST['filter']);
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
        $updateSellValue = "UPDATE wskazniki SET Sell_price=".$_POST['Sell_price'].", Sell_date='".$todayDate."', Last_action_date='".$todayDate."' WHERE ID=".$ID['ID'];
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
            $insertSQL = "INSERT INTO wskazniki (Item_ID, Buy_date, Buy_price, seller_ID, Last_action_date) VALUES (".$itemID['ID'].", '".$todayDate."', ".$singleItemPrice.", ".$sellerID['ID'].", '".$todayDate."')";
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
        $today = getdate();
        $todayDate = $today['year']."-".$today['mon']."-".$today['mday'];
        if ($ile_znalezionych < $_POST['Quantity']) {
            echo ("Elementów w transporcie jest mniej niż potwierdzasz");
            closeDB($db);
            exit();  
        } else {
            for ($i=0; $i<$_POST['Quantity']; $i++) {
                $ID = $wynik00->fetch_assoc();
                $updateDeliveryToPL = "UPDATE wskazniki SET delivered_to_Poland=1, Last_action_date='".$todayDate."' WHERE ID=".$ID['ID'];
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