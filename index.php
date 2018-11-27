<!DOCTYPE html>
<html>
   <head>
    <link rel="stylesheet" type="text/css" href="style1.css">
   </head>
    
    <body>
<form method="post">
    <input type="submit" name="mainTable" id="mainTable" style="margin-left:150px"  value="Pokaż wszystkie elementy" /><br/>
    <br>
    <input type="submit" name="table2" id="table2" style="margin-left:150px"  value="Pokaż" />
    <input id="filter" type="text" name="filter" style="height:25px; margin-left:150px" value=""><br>
    <br>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<?php  
        
function lacz_bd() {  
  $db = new mysqli('127.0.0.1:3306', 'Michal', '123', 'wskazniki');  
    if (! $db) $db = new mysqli('localhost:4430', 'Michal', '123', 'wskazniki');  
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
echo '<tr class="header"><td></td><td>Index</td><td>Nazwa</td></td><td>Cena zakupu</td><td>Ilość</td><td>Data zakupu</td><td>Ile zam.</td></tr>';
//pętla po rekordach z bazy
$index = 0;
$namesIndex = array();
for ($i=0; $i <$ile_znalezionych; $i++) {
    $temp = 0;
    $wiersz = $wynik->fetch_assoc();
    $zapytanie3 = "SELECT * FROM item WHERE Name LIKE '%$Select%' AND ID=".$wiersz['Item_ID'];
    $wynik3 = $db->query($zapytanie3);
    $howRekordsDelivered = ($db->query("SELECT * FROM wskazniki WHERE Item_ID=".$wiersz['Item_ID']." AND delivered_to_Poland=1"))->num_rows;
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
echo json_encode($namesIndex);/*
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
if (isset($_POST['checklist-list'])) {
    //echo "checked!";
}

?>
    </body>
</html>