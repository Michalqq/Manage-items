<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" type="text/css" href="style1.css">
   </head>
    <p style="margin-left:780px; top:30px">Moja sprzedaż:</p>
    <p style="margin-left:780px; top:170px">Moje zakupy:</p>
    <p style="margin-left:780px; top:300px">Historia działań:</p>
    <p style="margin-left:780px; top:150px; font-size:14px">Pobrania:</p>
    
    <body>
    <div style="margin-top:-20px; height:45px; width:1900px;background-color:darkgrey"></div>
<form method="post">
    <p1 class="dateLabel" style = "left: -130px">Od daty:</p1>
        <input type="date" class="dateLabel" style="left: -130px; top:35px" id="dataStart" name="dataStart">
    <p1 class="dateLabel" style = "left: 20px">Do daty:</p1>
        <input type="date" class="dateLabel" style="left: 20px; top:35px" id="dataStop" name="dataStop">
    <input type="submit" name="mainTable" id="mainTable" style="position:absolute; margin-left:15px; top:50px; height:31px;"  value="Pokaż wszystkie elementy" /><br>
    <input type="submit" class="selectBuy" name="showHistory" id="showHistory" style="margin-left:510px; top: 329px; width: 120px; height: 30px;"  value="Pokaż" />
    <p1 style="left: 230px; position:absolute; top:55px"><b>FILTR:</b></p1> 
    <input id="filter" type="text" name="filter" style="position:absolute; height:25px; margin-left:295px; top:50px" value=""><br>
    <p1 style="left: 10px; position:absolute; top:15px"><b>Login:</b></p1> 
    <input id="login" type="text" name="login" style="position:absolute; height:25px; margin-left:60px; top:4px" value="Michal">
    <p1 style="left: 245px; position:absolute; top:15px"><b>Hasło:</b></p1> 
    <input id="password" type="password" name="password" style="position:absolute; height:25px; margin-left:295px; top:4px" value="123">
    <br>
    <input type="submit" class="selectBuy" name="buyBtn" id="buyBtn" style="margin-left:450px; top: 225px; width: 170px; height: 30px;"  value="Dodaj zakupione do bazy" />
    <input type="submit" class="selectBuy" name="confirmDeliverToPL" id="confirmDeliverToPL" style="margin-left:450px; top: 270px; width: 170px; height: 30px;"  value="Potwierdź dostawę do PL" />
    <input type="submit" class="selectBuy" name="confirmCashOnDelivery" id="confirmCashOnDelivery" style="margin-left:450px; top: 160px; width: 170px; height: 30px;"  value="Potwierdź pobranie" />
    <table id="sellTable" style="margin-left:780px; width:400px; position:absolute; top:80px">
    <tr class="header"><td style="width:150px">Nazwa</td></td><td>Cena sprzedaży</td><td>Pobranie</td><td>Kwota pobrania</td></tr>
    </table>
    <table id="buyTable" style="margin-left:780px; width:400px; position:absolute; top:220px">
    <tr class="header"><td style="width:35%">Nazwa</td></td><td style="width:20%">Kwota zakupu</td><td>Ilość</td><td>Sprzedawca</td></tr>
    </table>
    <input type="text" class="select1" name="Sell_price" id="Sell_price" onkeypress="validate(event, id)" style="margin-left:150px; width: 70px;"/>
    <input type="text" class="select1" name="Cash_on_delivery" id="Cash_on_delivery" style="margin-left:325px; width: 70px; background-color:#dddddd" onkeypress="validate(event, id)" readonly/>
    <input type="submit" class="select1" name="sellBtn" id="sellBtn" style="margin-left:450px; width: 170px; height: 30px; top:115px" value="Sprzedaj" />
    <input type="text" class="selectBuy" name="Buy_price" id="Buy_price" onkeypress="validate(event, id)" style="margin-left:145px; width: 70px;"/> 
    <input type="text" class="selectBuy" name="Quantity" id="Quantity" onkeypress="validate(event, id)" style="margin-left:223px; width: 50px;"/>
    <input type="checkbox" class="select1" name="If_cash_on_delivery" id="If_cash_on_delivery" style="margin-left:235px; width: 70px; margin-top:-0px" value="0" onclick="CashOnDelivery()" >
    <select class="select1" name="select1">
    </select>
  <!--  <select class="select1" name="selectCashOnDelivery" style="margin-left:90px; top:163px">
    </select>-->
    <select class="selectBuy" name="selectBuy">
    </select>
    <select class="selectBuy" name="selectSeller" style="margin-left:280px">
    </select>

      
<!--</form>-->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script> 
    function validate(evt,id) {
  var theEvent = evt || window.event;
  var key = theEvent.keyCode || theEvent.which;
if (key!="8" && key!="37" && key!="39" ){
        key = String.fromCharCode( key );
        var regex = /[0-9]|\./;        
      if( !regex.test(key) ) {
        theEvent.returnValue = false;
        if(theEvent.preventDefault) theEvent.preventDefault();
      } 
 }
}

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
    let fullDataToday;
    let fullDataYesterday;
    if (data.getDate()<10) fullDataToday = data.getFullYear() + "-" + (data.getMonth()+1) + "-0" + data.getDate();
    else fullDataToday = data.getFullYear() + "-" + (data.getMonth()+1) + "-" + data.getDate();
    if (data.getDate()<10) fullDataYesterday = data.getFullYear() + "-" + (data.getMonth()+1) + "-0" + (data.getDate()-1);
    else fullDataYesterday = data.getFullYear() + "-" + (data.getMonth()+1) + "-0" + (data.getDate()-1);
    if (data.getMonth()-1<10) {
        fullDataToday=fullDataToday.substr(0,5) + "0" + fullDataToday.substr(5,4);
        fullDataYesterday=fullDataYesterday.substr(0,5) + "0" + fullDataYesterday.substr(5,4);
    }
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
   $db->autocommit(TRUE);
   return $db;
}
function query_DB($db, $sql) {
    $wynik = $db->query($sql);
    return $wynik;
}
function select_From_DB($Select) {
//połaczenie z bazą
$rowColor = array("#ffffff","#e1f2e1", "#FFFF9F");
$db = lacz_bd();
$wynik= query_DB($db, "SELECT * FROM wskazniki ORDER BY Buy_date");
$ile_znalezionych = $wynik->num_rows;
StartTable("mainTable", "mainTableCSS");
$parameter = array ("", "In", "Nazwa", "Cena zakupu", "Ilość", "Data zakupu", "Ile zam.");
AddTableRow(7, "header", $parameter);
$index = 0;
$namesIndex = array();
for ($i=0; $i <$ile_znalezionych; $i++) { // Create main table
    $temp = 0;
    $wiersz = $wynik->fetch_assoc();
    $wynik3= query_DB($db, "SELECT * FROM item WHERE Name LIKE '%$Select%' AND ID=".$wiersz['Item_ID']);
    $howRekordsDelivered = ($db->query("SELECT * FROM wskazniki WHERE Item_ID=".$wiersz['Item_ID']." AND delivered_to_Poland=1 AND Sell_price IS NULL"))->num_rows;
    $howRekordsOnDelivery = ($db->query("SELECT * FROM wskazniki WHERE Item_ID=".$wiersz['Item_ID']." AND delivered_to_Poland IS NULL"))->num_rows;
    $wiersz3 = $wynik3->fetch_assoc();
    if ($wiersz3['Name'] != "") {
        if (in_array ($wiersz3['Name'] , $namesIndex) == 1) $temp = 1;
        if ($temp != 1) {  
            array_push($namesIndex, $wiersz3['Name']);
            $index += 1;
            $colorIndex = ($index % 2);
            if ($howRekordsDelivered < 2 AND $howRekordsOnDelivery<1) $colorIndex=2;
            echo '<tr style="background-color:'.$rowColor[$colorIndex].';hover {background-color: yellow}">';
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
    // Select POBRANIA
    $showCashOnDelivery = ($db->query("SELECT * FROM wskazniki WHERE Cash_on_delivery IS NOT NULL AND delivered_to_Poland = 2")); 
    if ($showCashOnDelivery->num_rows > 0) {
    echo '<select class="selectBuy" name="selectCashOnDelivery" style="margin-left:90px; top:163px; width:300px">';
    while($row = $showCashOnDelivery->fetch_assoc()) {
        $showName = ($db->query("SELECT Name FROM item WHERE ID=".$row['Item_ID']."")); 
        $row2 = $showName->fetch_assoc();
        echo '<option>'.$row2["Name"] .'_Kwota:_' .$row['Cash_on_delivery'].'_Data:_' .$row['Sell_date'].'</option>';
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
        $selectOneItem = "SELECT ID FROM wskazniki WHERE delivered_to_Poland = 1 AND Sell_price IS NULL AND Item_ID = '".$itemID['ID']."'";
        $wynik00 = $db->query($selectOneItem);
        $ID = $wynik00->fetch_assoc();
        $today = getdate(); 
        $todayDate = $today['year']."-".$today['mon']."-".$today['mday'];
        $todayFullDate = $today['year']."-".$today['mon']."-".$today['mday']." ".$today['hours'].":".$today['minutes'].":".$today['seconds'].":";
        //$updateSellValue = "UPDATE wskazniki SET Sell_price=NULL ,Sell_date = NULL";
        if ($_POST['Cash_on_delivery']=="") $sql = "UPDATE wskazniki SET Sell_price=".$_POST['Sell_price'].", Sell_date='".$todayDate."', Last_action_date='".$todayFullDate."', de WHERE ID=".$ID['ID'];
        else $sql = "UPDATE wskazniki SET Sell_price=".$_POST['Sell_price'].", delivered_to_Poland = 3 Sell_date='".$todayDate."', Last_action_date='".$todayFullDate."', If_cash_on_delivery = 1, Cash_on_delivery=".$_POST['Cash_on_delivery'].", delivered_to_Poland = 2 WHERE ID=".$ID['ID'];
        $updateSellValue = $sql;
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
        $todayFullDate = $today['year']."-".$today['mon']."-".$today['mday']." ".$today['hours'].":".$today['minutes'].":".$today['seconds'].":";
        $singleItemPrice = ($_POST['Buy_price']) / ($_POST['Quantity']);
        for ($i=0; $i<$_POST['Quantity']; $i++) {
            $insertSQL = "INSERT INTO wskazniki (Item_ID, Buy_date, Buy_price, seller_ID, Last_action_date, delivered_to_Poland) VALUES (".$itemID['ID'].", '".$todayDate."', ".$singleItemPrice.", ".$sellerID['ID'].", '".$todayFullDate."', 0)";
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
        $todayFullDate = $today['year']."-".$today['mon']."-".$today['mday']." ".$today['hours'].":".$today['minutes'].":".$today['seconds'].":";
        if ($ile_znalezionych < $_POST['Quantity']) {
            echo ("Elementów w transporcie jest mniej niż potwierdzasz");
            closeDB($db);
            exit();  
        } else {
            for ($i=0; $i<$_POST['Quantity']; $i++) {
                $ID = $wynik00->fetch_assoc();
                $updateDeliveryToPL = "UPDATE wskazniki SET delivered_to_Poland=1, Last_action_date='".$todayFullDate."' WHERE ID=".$ID['ID'];
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
if (isset ($_POST['confirmCashOnDelivery'])) { //POBRANIE
    $data = explode("_", $_POST['selectCashOnDelivery']);
    $db = lacz_bd();
    $wynik0 = query_DB($db, "SELECT ID FROM item WHERE Name = '".$data[0]."'");
    $itemID = $wynik0->fetch_assoc();
    $todayFullDate = getFullDate(1);
    $updateStatus = "UPDATE wskazniki SET delivered_to_Poland=3, Last_action_date='".$todayFullDate."' WHERE Item_ID=".$itemID['ID']." AND Sell_date = '".$data[4]."' AND Cash_on_delivery = ".$data[2];
        if ($db->query($updateStatus)=== TRUE ) {
            echo "Record updated successfully  </br>";
        } else {
            echo "Error updating record: " . $db->error . " </br>";
        }
}
if (isset($_POST['showHistory'])) { // Show action history 
    historyTable("SELECT * FROM wskazniki WHERE Last_action_date BETWEEN '".$_POST['dataStart']." 00:00:00' AND '".$_POST['dataStop']." 23:59:59' ORDER BY Last_action_date DESC");
    select_From_DB($_POST['filter']);
}
function getFullDate($value) {
$today = getdate(); 
$todayDate = $today['year']."-".$today['mon']."-".$today['mday'];
$todayFullDate = $today['year']."-".$today['mon']."-".$today['mday']." ".$today['hours'].":".$today['minutes'].":".$today['seconds'].":";
    if ($value == 1) {
        return $todayFullDate;
    } else {
        return $todayDate;
    }
}
function historyTable($sqlParam){
$rowColor = array("#ffffff","#e1f2e1", "#dfe2a1", "#32933E");
$db = lacz_bd();
$wynik= query_DB($db, $sqlParam);
$ile_znalezionych = $wynik->num_rows;
    echo '<div class="hisTableCSS">';
StartTable("hisTable", 'hisTableCSS');
$parameter = array ("In", "Nazwa", "Cena zakupu","Data zakupu", "Cena sprzedaży", "Data sprzedaży", "Etap:", "Kwota pobran", "Ostatnio");
AddTableRow(9, "header1", $parameter);
$index = 1;
$etap = array ("Transp do PL", "Transport do PL","Za pobraniem", "Sprzedane");
for ($i=0; $i <$ile_znalezionych; $i++) { // Create main table
    $temp = 0;
    $wiersz = $wynik->fetch_assoc();
    $wynik2= query_DB($db, "SELECT Name FROM item WHERE ID=".$wiersz['Item_ID']);
    $wiersz2 = $wynik2->fetch_assoc();
    if ($wiersz['delivered_to_Poland'] =="") $wiersz['delivered_to_Poland'] = 0;
    echo '<tr style="font-size:11px; background-color:'.$rowColor[($wiersz['delivered_to_Poland'])].';hover {background-color: yellow}">';
    echo '<td>'.$index.'</td>';
    echo '<td style="width:35%">'.$wiersz2['Name'].'</td>';
    echo '<td style="width:10%">'.$wiersz['Buy_price'].'</td>';
    echo '<td style="width:14%">'.$wiersz['Buy_date'].'</td>';
    echo '<td style="width:10%">'.$wiersz['Sell_price'].'</td>';
    echo '<td style="width:14%">'.$wiersz['Sell_date'].'</td>';
    echo '<td style="width:5%">'.$etap[$wiersz['delivered_to_Poland']].'</td>';
    echo '<td>'.$wiersz['Cash_on_delivery'].'</td>';
    echo '<td style="width:14%">'.$wiersz['Last_action_date'].'</td>';
    echo '</tr>';
    $index += 1;
    }
echo '</table>';  
echo '</div>'; 
}
function closeDB($db) {
    mysqli_close($db);
}
function StartTable($tableID, $tableClass) {
    echo '<table id='.$tableID.' class= '.$tableClass.'>' ;
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