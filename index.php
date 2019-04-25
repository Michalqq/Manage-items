<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" type="text/css" href="style1.css">
       <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
   </head>
    <body>

<form method="post">
    <input id="checkedValue" name="checkedValue" style="position:absolute; left:600px">
    <div class="headerLogin">
        <p1 class="firstLine" style="left: 10px"><b>Login:</b></p1> 
        <input id="login" class="firstLine" type="text" name="login" style="height:25px; left: 5px" value="Michal">
        <p1 class="firstLine" style="left: 15px;"><b>Hasło:</b></p1> 
        <input id="password" class="firstLine"  type="password" name="password" style="height:25px; left:10px;" value="123">
    </div>
    <div class="secondPart">
    <input type="submit"  class="secondLine" name="mainTable" id="mainTableShow" style=" height:31px; margin-left:60px"  value="Pokaż wszystkie elementy" />
    <p1  class="secondLine" style=""><b>FILTR:</b></p1> 
    <input id="filter"  class="secondLine" type="text" name="filter" style="height:25px; margin-left:3px" value="">
    <p1  class="secondLine" style=""><b>Multiple-line:</b></p1> 
    <input type="checkbox" name="multiple_list" id="multiple_list" style="font-size:20px; width: 40px; height: 35px; vertical-align: middle;" value="0" onclick="multipleList()" >
    </div>
    <div class="rightPanel">
    <p style="top:-10px">Moja sprzedaż:</p>
    <table id="sellTable" style="margin-left:0px; width:440px; position:relative; top:40px; opacity:0.9">
    <tr class="header"><td style="width:130px">Nazwa</td><td>Cena sprzedaży</td><td>Prow [%]</td><td>Pobranie</td><td>Kwota pobrania</td></tr>
    </table>
    <p style="top:140px">Moje zakupy:</p>
    <p style="top:300px; left:300px; ">Historia działań:</p>
    <p style="top:280px; font-size:14px">Przedział czasowy:</p>
    <p style="top:120px; font-size:14px">Pobrania:</p>
    <p1  class="dateLine" style = "top:0px; left: 160px">Od daty:</p1>
    <input type="date" class="dateLine" style="top:15px; left: 155px;" id="dataStart" name="dataStart">
    <p1  class="dateLine" style = "top:0px; left: 315px">Do daty:</p1>
    <input type="date" class="dateLine" style="left: 305px; top:15px" id="dataStop" name="dataStop">
    <table id="buyTable" style="margin-left:0px; width:440px; position:absolute; top:200px">
    <tr class="header"><td style="width:35%">Nazwa</td></td><td style="width:20%">Kwota zakupu</td><td>Ilość</td><td>Sprzedawca</td></tr>
    </table>
    <p style="top:77px; left:435px; font-size:14px">Uwagi:</p>
    <input type="text" class="sellLine" name="Note" id="Note" style="left:490px; width: 126px; z-index:4"/>
    <input type="text" class="sellLine" name="Sell_price" id="Sell_price" onkeypress="validate(event, id)" style="left:145px; width: 70px;"/>
    <input type="text" class="sellLine" name="Commission_value" id="Commission_value" onkeypress="validate(event, id)" style="left:225px; width: 40px;"/>
    <input type="checkbox" class="sellLine" name="If_cash_on_delivery" id="If_cash_on_delivery" style="left:278px; width: 70px; top:48px" value="0" onclick="CashOnDelivery()" >
    <input type="text" class="sellLine" name="Cash_on_delivery" id="Cash_on_delivery" style="left:360px; width: 70px; background-color:#dddddd" onkeypress="validate(event, id)" readonly/>
    <input type="text" class="buyLine" name="Buy_price" id="Buy_price" onkeypress="validate(event, id)" style="left:150px; width: 70px;"/> 
    <input type="text" class="buyLine" name="Quantity" id="Quantity" onkeypress="validate(event, id)" style="left:242px; width: 50px;"/>
    <select id="histOption" name="histOption" class="dateLine" style="left:500px; top:50px; width:120px;">
        <option value="4">Wszystko</option>
        <option value="0">W transporcie</option>
        <option value="1">W domu</option>
        <option value="3">Sprzedane</option>
    </select>
    <div class="rightButtons">
    <input type="submit" name="sellBtn" id="sellBtn" style="width: 170px; height: 30px" value="Sprzedaj" />
    <input type="submit" name="confirmCashOnDelivery" id="confirmCashOnDelivery" style="margin-top: 50px; width: 170px; height: 30px;"  value="Potwierdź pobranie" />
    <input type="submit" name="buyBtn" id="buyBtn" style="margin-top: 50px; width: 170px; height: 30px;"  value="Dodaj zakupione do bazy" />
    <input type="submit" name="confirmDeliverToPL" id="confirmDeliverToPL" style="margin-top:10px; top: 270px; width: 170px; height: 30px;"  value="Potwierdź dostawę do PL" />
    <input type="submit" name="showHistory" id="showHistory" style="margin-top: 15px; width: 120px; height: 30px;"  value="Pokaż historię" />
    </div>
    <input type="submit" name="SellPriceSum" id="SellPriceSum" style="margin-top: 270px; margin-left:15px; width: 100px; height: 30px" value="Wart. sprzedaży"/>
    <input type="submit" name="SellPriceNet" id="SellPriceNet" style="position:absolute; margin-top: 270px; left:130px; width:100px; height:30px" value="Wart. netto"/>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script> 
function validate(evt,id) {
    var theEvent = evt || window.event;
    var key = theEvent.keyCode || theEvent.which;
    if (key!="8" && key!="37" && key!="39" ){
        key = String.fromCharCode( key );
        var regex = /[0-9]|\.|\,/;        
        if( !regex.test(key) ) {
            theEvent.returnValue = false;
            if(theEvent.preventDefault) theEvent.preventDefault();
        } 
    }
    document.getElementById(id).value = document.getElementById(id).value.replace(",",".");
}
function multipleList() {
     if (document.getElementById("multiple_list").checked == true) document.getElementById("multiple_list").value=1
    else document.getElementById("multiple_list").value=0;
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
    //alert(data.getDate());
    if (data.getDate()<10) fullDataToday = data.getFullYear() + "-" + (data.getMonth()+1) + "-0" + data.getDate();
    else fullDataToday = data.getFullYear() + "-" + (data.getMonth()+1) + "-" + data.getDate();
    if (data.getDate()<11) fullDataYesterday = data.getFullYear() + "-" + (data.getMonth()+1) + "-0" + (data.getDate()-1);
    else fullDataYesterday = data.getFullYear() + "-" + (data.getMonth()+1) + "-" + (data.getDate()-1);
    if (data.getMonth()-1<10) {
        
        fullDataToday=fullDataToday.substr(0,5) + "0" + fullDataToday.substr(5,4);
        fullDataYesterday=fullDataYesterday.substr(0,5) + "0" + fullDataYesterday.substr(5,4);
    }
    document.getElementById("dataStop").value=fullDataToday;
    document.getElementById("dataStart").value=fullDataYesterday;

  var random= Math.floor(Math.random() * 6) + 0;
  var bigSize = ["url('background_image/P7252235.jpg')",
                 "url('background_image/P3095394.jpg')",
                 "url('background_image/P3095392.jpg')",
                 "url('background_image/P3095374.jpg')",
                 "url('background_image/P3095372.jpg')",
                 "url('background_image/P3095357.jpg')"];
  document.body.style.backgroundImage=bigSize[random];
}
function selectRow(x){
    document.getElementById('checkedValue').value = "";
    if (x.className == '') {
        iterateTableAndUncheck();
    }
    if (x.className != ''){
        x.style = 'background-color:' + x.className;
        x.className = ''
    }else {
        x.className = x.style.backgroundColor;
        x.style = 'background-color:#63ff8d; border: 3px solid black;';
    }  
    iterateTableGetChecked();
}
function iterateTableAndUncheck(){
    let table = document.getElementById('mainTable');
    for (let row of table.rows) 
    {
		if (row.className != '' & row.className != 'header'){
            row.style = 'background-color:' + row.className;
            row.className = ''
        }
    }  
}
function iterateTableGetChecked(){
    let table = document.getElementById('mainTable');
    for (let row of table.rows) 
    {
		if (row.className != '' & row.className != 'header'){
            document.getElementById('checkedValue').value = row.cells[2].innerText;
            //return (row.cells[2].innerText);
        }
    }  
}
</script>

<?php  
function lacz_bd() {
    $password = $_POST['password'];
    $login = $_POST['login'];
    $db = new mysqli('localhost', $login, $password, 'wskazniki');  
    if ($db->connect_error) {
        AddEcho("Błąd logowania <br>") ;
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
    echo '<div class="mainTableClass">';
//połaczenie z bazą
$rowColor = array("#ffffff","#e1f2e1", "#FFFF9F", "#aeb6c1");
$db = lacz_bd();
$wynik= query_DB($db, "SELECT * FROM wskazniki WHERE Sell_price IS NULL ORDER BY Buy_date");
$ile_znalezionych = $wynik->num_rows;
StartTable("mainTable", "mainTableCSS");
$parameter = array ("", "In", "Nazwa", "Cena zakupu", "Ilość", "Data zakupu", "Ile zam.");
AddTableRow(7, "header", $parameter);
$index = 0;
$namesIndex = array();
for ($i=0; $i <$ile_znalezionych; $i++) { // Create main table
    $temp = 0;
    $wiersz = $wynik->fetch_assoc();
    $wynik3= query_DB($db, "SELECT * FROM item WHERE Name LIKE '%$Select%' AND Item_ID=".$wiersz['Item_ID']);
    $howRekordsDelivered = ($db->query("SELECT * FROM wskazniki WHERE Item_ID=".$wiersz['Item_ID']." AND delivered_to_Poland=1 AND Sell_price IS NULL"))->num_rows;
    $howRekordsOnDelivery = ($db->query("SELECT * FROM wskazniki WHERE Item_ID=".$wiersz['Item_ID']." AND delivered_to_Poland IS NULL"))->num_rows;
    $wiersz3 = $wynik3->fetch_assoc();
    if ($wiersz3['Name'] != "" ) { //(&& $index != $howRekordsDelivered || $index==0)
        if (in_array ($wiersz3['Name'] , $namesIndex) == 1) $temp = 1;
        if (isset($_POST['multiple_list'])) $temp=0;
        if ($temp != 1) {  
            array_push($namesIndex, $wiersz3['Name']);
            $index += 1;
            $colorIndex = ($index % 2);
            if ($howRekordsDelivered < 2 AND $howRekordsOnDelivery<1) $colorIndex=2;
            else if ($wiersz['delivered_to_Poland'] == NULL) $colorIndex=3;
            //echo '<tr style="background-color:'.$rowColor[$colorIndex].';hover {background-color: yellow}" onclick="selectRow(this)">';
            echo '<tr style="background-color:'.$rowColor[$colorIndex].'" onclick="selectRow(this)">';
            $zapytanie2 = "SELECT Name FROM item WHERE Item_ID=".$wiersz['Item_ID'];
            $wynik2 = $db->query($zapytanie2);
            $wiersz2 = $wynik2->fetch_assoc();
            echo "<td></td>";
            echo '<td style="width:2%">'.$index.'</td>';
            echo '<td>'.$wiersz2['Name'].'</td>';
            echo '<td style="width:100px">'.$wiersz['Buy_price'].'</td>';
            echo '<td>'.$howRekordsDelivered.'</td>';
            echo '<td style="width:100px">'.$wiersz['Buy_date'].'</td>';
            echo '<td style="width:2%">'.$howRekordsOnDelivery.'</td>';
            echo '</tr>';
        }
    }
}
echo '</table>';
echo '</div>';
//echo json_encode($namesIndex);
$wynik3= query_DB($db, "SELECT * FROM item ");
$tempIndex = $wynik3 -> num_rows;
echo '<select class="selectBuy" name="selectBuy">';
for ($i=0; $i <$tempIndex; $i++) {
    $wiersz3 = $wynik3->fetch_assoc();
    echo '<option>'.$wiersz3['Name'].'</option>';
}
echo '</select>';
echo '<select class="select1" name="select1">';
for ($i=0; $i <count ($namesIndex); $i++) {
    echo '<option value=>'.$namesIndex[$i].'</option>';
}
echo '</select>';
$showSeller = ($db->query("SELECT Seller_name FROM seller")); 
if ($showSeller->num_rows > 0) {
    echo '<select class="selectBuy" style="left:305px" name="selectSeller" ';
    while($row = $showSeller->fetch_assoc()) {
        echo '<option>'.$row['Seller_name'].'</option>';
    }
    echo '</select>';
}
    // Select POBRANIA
    $showCashOnDelivery = ($db->query("SELECT * FROM wskazniki WHERE Cash_on_delivery IS NOT NULL AND delivered_to_Poland = 2")); 
    if ($showCashOnDelivery->num_rows > 0) {
    echo '<select class="select1" name="selectCashOnDelivery" style="width:300px; top:135px; left:80px">';
    while($row = $showCashOnDelivery->fetch_assoc()) {
        $showName = ($db->query("SELECT Name FROM item WHERE Item_ID=".$row['Item_ID']."")); 
        $row2 = $showName->fetch_assoc();
        //echo("<option>".strtotime($row['Sell_date'])."  ".strtotime(getFullDate(0))."</option>");
        if (strtotime(getFullDate(0))-6*24*60*60>strtotime($row['Sell_date'])) {
            echo '<option class="yellow">'.$row2["Name"] .'_Kwota:_' .$row['Cash_on_delivery'].'_Data:_' .$row['Sell_date'].'</option>';
        } 
        else{
            echo '<option>'.$row2["Name"] .'_Kwota:_' .$row['Cash_on_delivery'].'_Data:_' .$row['Sell_date'].'</option>';
        }
    }
    echo '</select>';
}
echo '</div></form>';
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
        //$selectItemId = "SELECT ID FROM item WHERE Name = '".$_POST['select1']."'";------------------------
        $selectItemId = "SELECT ID FROM item WHERE Name = '".$_POST['checkedValue']."'";
        $wynik0 = $db->query($selectItemId);
        $itemID = $wynik0->fetch_assoc();
        $selectOneItem = "SELECT ID FROM wskazniki WHERE delivered_to_Poland = 1 AND Sell_price IS NULL AND Item_ID = '".$itemID['ID']."'";
        $wynik00 = $db->query($selectOneItem);
        $ID = $wynik00->fetch_assoc();
        $todayFullDate = getFullDate(1);
        $todayDate = getFullDate(0);
        //$updateSellValue = "UPDATE wskazniki SET Sell_price=NULL ,Sell_date = NULL";
        $sell_Price = $_POST['Sell_price'] * (100 - $_POST['Commission_value'])/100;
        if ($_POST['Cash_on_delivery']=="") $sql = "UPDATE wskazniki SET Sell_price=".$sell_Price.", Sell_date='".$todayDate."', Last_action_date='".$todayFullDate."', delivered_to_Poland = 3, Notes='".$_POST['Note']."' WHERE ID=".$ID['ID'];
        else $sql = "UPDATE wskazniki SET Sell_price=".$sell_Price.", delivered_to_Poland = 2, Sell_date='".$todayDate."', Last_action_date='".$todayFullDate."', If_cash_on_delivery = 1, Cash_on_delivery=".$_POST['Cash_on_delivery'].", Notes='".$_POST['Note']."'  WHERE ID=".$ID['ID'];
        $updateSellValue = $sql;
        if ($db->query($updateSellValue)=== TRUE ) {
            AddEcho("Record updated successfully");
        } else {
            AddEcho("Error updating record: " . $db->error);
        }
        closeDB($db);
        select_From_DB($_POST['filter']);
    }
}
if (isset($_POST['buyBtn'])) { // Set record when BUY item
    if ($_POST['Buy_price']=="" Or $_POST['Quantity']=="") {
        AddEcho("Wpisz wymagane dane");
        closeDB($db);
        exit();
    } else {
        $db = lacz_bd();
        $selectItemId = "SELECT Item_ID FROM item WHERE Name = '".$_POST['selectBuy']."'";//------------------------
        //$selectItemId = "SELECT ID FROM item WHERE Name = '".$_POST['checkedValue']."'";
        $wynik0 = $db->query($selectItemId);
        $itemID = $wynik0->fetch_assoc();
        $selectSellerId = "SELECT ID FROM seller WHERE Seller_name = '".$_POST['selectSeller']."'";
        $wynik01 = $db->query($selectSellerId);
        $sellerID = $wynik01->fetch_assoc();
        $todayFullDate = getFullDate(1);
        $todayDate = getFullDate(0);
        $singleItemPrice = ($_POST['Buy_price']) / ($_POST['Quantity']);
        for ($i=0; $i<$_POST['Quantity']; $i++) {
            $insertSQL = "INSERT INTO wskazniki (Item_ID, Buy_date, Buy_price, seller_ID, Last_action_date) VALUES (".$itemID['ID'].", '".$todayDate."', ".$singleItemPrice.", ".$sellerID['ID'].", '".$todayFullDate."')";
            if ($db->query($insertSQL)=== TRUE) {
                AddEcho("New record created successfully </br>");
            } else {
                AddEcho("Error updating record: " . $db->error . " </br>");
            }
        }
    }
    closeDB($db);
    select_From_DB($_POST['filter']);
}
        
if (isset($_POST['confirmDeliverToPL'])) { // Update record when item arrived to PL
    if ($_POST['Quantity']=="") {
        AddEcho("Wpisz wymagane dane");
        exit();
    } else {
        $db = lacz_bd();
        //$selectItemId = "SELECT ID FROM item WHERE Name = '".$_POST['selectBuy']."'"; ------------------------
        $selectItemId = "SELECT Item_ID FROM item WHERE Name = '".$_POST['checkedValue']."'";
        $wynik0 = $db->query($selectItemId);
        $itemID = $wynik0->fetch_assoc();
        $selectUndeliveredItems = "SELECT ID FROM wskazniki WHERE delivered_to_Poland IS NULL AND Item_ID = '".$itemID['ID']."' ORDER BY Buy_date";
        $wynik00 = $db->query($selectUndeliveredItems);
        $ile_znalezionych = $wynik00->num_rows;
        $todayFullDate = getFullDate(1);
        if ($ile_znalezionych < $_POST['Quantity']) {
            AddEcho("Elementów w transporcie jest mniej niż potwierdzasz");
            closeDB($db);
            exit();  
        } else {
            for ($i=0; $i<$_POST['Quantity']; $i++) {
                $ID = $wynik00->fetch_assoc();
                $updateDeliveryToPL = "UPDATE wskazniki SET delivered_to_Poland=1, Last_action_date='".$todayFullDate."' WHERE ID=".$ID['ID'];
                if ($db->query($updateDeliveryToPL)=== TRUE ) {
                    AddEcho("Record updated successfully  </br>");
                } else {
                    AddEcho("Error updating record: " . $db->error . " </br>");
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
    $wynik0 = query_DB($db, "SELECT Item_ID FROM item WHERE Name = '".$data[0]."'");
    $itemID = $wynik0->fetch_assoc();
    $todayFullDate = getFullDate(1);
    $updateStatus = "UPDATE wskazniki SET delivered_to_Poland=3, Last_action_date='".$todayFullDate."' WHERE Item_ID=".$itemID['ID']." AND Sell_date = '".$data[4]."' AND Cash_on_delivery = ".$data[2];
        if ($db->query($updateStatus)=== TRUE ) {
            AddEcho("Record updated successfully");
            //echo "Record updated successfully  </br>";
        } else {
            AddEcho("Error updating record: " . $db->error . " </br>");
        }
}
if (isset($_POST['showHistory'])) { // Show action history
    $histOption = $_POST['histOption'];
    $sqlWhere="";
    if ($histOption!=4) {
        if ($histOption==0) $sqlWhere = " AND delivered_to_Poland IS NULL";
        if ($histOption==1) $sqlWhere = " AND delivered_to_Poland = 1";
        if ($histOption==3) $sqlWhere = " AND (delivered_to_Poland = 2 OR delivered_to_Poland = 3)";
    }
    historyTable("SELECT * FROM wskazniki WHERE Last_action_date BETWEEN '".$_POST['dataStart']." 00:00:00' AND '".$_POST['dataStop']." 23:59:59' ".$sqlWhere." ORDER BY Last_action_date DESC");
    select_From_DB($_POST['filter']);
}
if (isset($_POST['SellPriceSum'])){ // Show Sum Sell Price
    AddEcho(getSumSellPrice(1));
    select_From_DB($_POST['filter']);
}
if (isset($_POST['SellPriceNet'])){ // Show Netto Sell Price
    AddEcho(getSumSellPrice(2));
    select_From_DB($_POST['filter']);
}
function getSumSellPrice($index) {
    $db = lacz_bd();
    $Sell_price = query_DB($db, "SELECT SUM(Sell_price) AS count FROM wskazniki WHERE Sell_date BETWEEN '".$_POST['dataStart']." 00:00:00' AND '".$_POST['dataStop']." 23:59:59'"); 
    $Sell_price_SUM = 0;
    $rec  = $Sell_price->fetch_assoc();
    $Sell_price_SUM = round($rec['count'],2);
    if ($index==2){
        $Buy_price= query_DB($db, "SELECT SUM(Buy_price) AS count1 FROM wskazniki WHERE Sell_price IS NOT NULL AND (Sell_date BETWEEN '".$_POST['dataStart']." 00:00:00' AND '".$_POST['dataStop']." 23:59:59')");
        $Buy_price_SUM = 0;
        $rec1  = $Buy_price->fetch_assoc();
        $Buy_price_SUM = round($rec1['count1'], 2);
    }
    if ($index==2) return ($Sell_price_SUM-$Buy_price_SUM)."zł";
    else return $Sell_price_SUM."zł";
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
StartTable("hisTable", 'hisTableCSS');
$parameter = array ("In", "Nazwa", "Cena zakupu","Data zakupu", "Cena sprzedaż", "Data sprzedaży", "Etap:", "Kwota pobran", "Ostatnio", "Zysk", "Uwagi");
AddTableRow(11, "header1", $parameter);
$index = 1;
$etap = array ("Transp do PL", "W domu","Za pobraniem", "Sprzedane");
for ($i=0; $i <$ile_znalezionych; $i++) { // Create main table
    $temp = 0;
    $wiersz = $wynik->fetch_assoc();
    $wynik2= query_DB($db, "SELECT Name FROM item WHERE Item_ID=".$wiersz['Item_ID']);
    $wiersz2 = $wynik2->fetch_assoc();
    if ($wiersz['delivered_to_Poland'] =="") $wiersz['delivered_to_Poland'] = 0;
    echo '<tr style="font-size:11px; background-color:'.$rowColor[($wiersz['delivered_to_Poland'])].';hover {background-color: yellow}">';
    echo '<td>'.$index.'</td>';
    echo '<td style="width:30%">'.$wiersz2['Name'].'</td>';
    echo '<td style="width:8%">'.$wiersz['Buy_price'].'</td>';
    echo '<td style="width:14%">'.$wiersz['Buy_date'].'</td>';
    echo '<td style="width:8%">'.$wiersz['Sell_price'].'</td>';
    echo '<td style="width:12%">'.$wiersz['Sell_date'].'</td>';
    echo '<td style="width:5%">'.$etap[$wiersz['delivered_to_Poland']].'</td>';
    echo '<td>'.$wiersz['Cash_on_delivery'].'</td>';
    echo '<td style="width:14%">'.$wiersz['Last_action_date'].'</td>';
    $profit = round(($wiersz['Sell_price']*100/$wiersz['Buy_price'])-100,1);
    if ($profit == -100) $profit="---";
    else ($profit = $profit."%");
    echo '<td style="width:10%">'.$profit.'</td>';
    echo '<td style="width:18%">'.$wiersz['Notes'].'</td>';
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
function AddEcho($text) {
   echo " <div style='position:absolute; width:500px; height:10px; z-index:2; left:1050px; top:0px'>
        <p><font color='chartreuse'>".$text."</font></p></div> ";
}
?>
 </body>
</html>
