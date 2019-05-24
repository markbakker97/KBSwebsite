<!DOCTYPE html>
<html>
<body>

<?php

function showNaam($naam) {
    ?>
            <label>Welkom, <?=$naam;?></label>
        </body>
        </html>
    <?php
}

?>

<?php 
function connect(){
    $db = "mysql:host=localhost;dbname=kbsdb;port=3306";
    $user = "root";
    $pass = "";
    $pdo = new PDO($db, $user, $pass);
    return $pdo;
}

if(isset($_GET["sub"])) {  
    if($_GET["sub"] == 'y') {
        haalOp();
    }
}

function haalOp(){
    $pdo = connect();
    $stmt = $pdo->prepare("SELECT max(naam) FROM data");
    $stmt->execute();

    if($row = $stmt->fetch()) {
        $naam = $row['max(naam)'];
    }
    showNaam($naam);
}

?>