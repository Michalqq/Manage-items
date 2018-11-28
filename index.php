<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" type="text/css" href="style2.css">
   </head>
    
    <body>
<form method="post">
    <input type="submit" name="mainTable" id="mainTable" style="position:absolute; margin-left:50px; top:20px; height:31px;"  value="Pokaż wszystkie elementy" /><br/>
    <br>
    <input id="filter" type="text" name="filter" style="position:absolute; height:25px; margin-left:250px; top:20px" value=""><br>
    <br>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script>
function test() {
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
echo '<table id="mainTable">';
echo '<tr class="header"><td></td><td>In</td><td>Nazwa</td></td><td>Cena zakupu</td><td>Ilość</td><td>Data zakupu</td><td>Ile zam.</td></tr>';
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
            echo '<form method="post"><td id="checkBtn'.($index-1).'"style="width:2%" class="checkbox-td"><input type="submit" name="checklist-list" value=" _ "></td></form>';
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
echo json_encode($namesIndex);
echo '<form method="post"><table id="second" style="margin-left:1100px; width:400px; position:absolute; top:80px">';
echo '<tr class="header"><td style="width:150px">Nazwa</td></td><td>Cena sprzedaży</td><td>Pobranie</td><td>Kwota pobrania</td></tr>';
echo '</table>';
echo '<select class="select1" name="select1">';
for ($i=0; $i <count ($namesIndex); $i++) {
    echo '<option>'.$namesIndex[$i].'</option>';
}
echo '</select>';
echo  '<input type="text" class="select1" name="Sell_price" id="Sell_price" style="margin-left:150px; width: 70px;"/><br/>';
echo '<input type="checkbox" class="select1" id="If_cash_on_delivery" style="margin-left:240px; width: 70px;" onclick="test()"/>';   
echo  '<input type="text" class="select1" name="Cash_on_delivery" id="Cash_on_delivery" style="margin-left:323px; width: 70px; background-color:#dddddd" readonly/><br/>';
echo  '<input type="submit" class="select1" name="sellBtn" id="sellBtn" style="margin-left:450px; width: 80px"  value="Zatwierdź" /></form>';
mysqli_close($db);
    /*
$zapytanie = "SELECT * FROM wskazniki";
//pobranie wyniku zapytania
$wynik = $db->query($zapytanie);
//obliczanie ilości rekordów
$ile_znalezionych = $wynik->num_rows;
//rozpoczynamy budowanie tabeli dla naszych danych
echo '<table>';
echo '<tr><td>Imie</td><td>Nazwisko</td></tr>';
//pętla po rekordach z bazy 
for ($i=0; $i <$ile_znalezionych; $i++)
        {
                $wiersz = $wynik->fetch_assoc();
                echo '<tr>';
                echo '<td>'.$wiersz['Item_ID'].'</td>';
                echo '<td>'.$wiersz['Buy_date'].'</td>';
                echo '</tr>';
        }
echo '</table>';  
        $wynik = $db->query("SELECT * FROM item WHERE Name='DEFI Boost'");
        $wiersz = $wynik->fetch_assoc();
        echo $wiersz['ID'];*/
}
if(array_key_exists('mainTable',$_POST)){
    select_From_DB($_POST['filter']);
   // select_From_DB("ADDCO BOOST");
}
if (isset($_POST['sellBtn'])) {
    //echo $_POST['select1'];
    //echo $_POST['Sell_price'];
    //echo $_POST['Cash_on_delivery'];
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
    
    //echo $ID['ID'];
    mysqli_close($db);
    
}
function closeDB ($db){
    mysqli_close($db);
}
?>
 </body>
</html>