<!DOCTYPE html>
<html>
<body>

<h1>Hoe heet je?</h1>
<form action="index.php?sub=y" method="POST">
    <input type="text" name="naam" value="">
    <input type="submit" value="submit">
</form>
</body>
</html>

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
        verzend();
    }
}

function verzend(){
    $pdo = connect();
    $stmt = $pdo->prepare("INSERT INTO data (naam) VALUES (:naam)");
    $stmt->bindValue(':naam', $_POST['naam']);
    $stmt->execute();
    header("Location: resultaat.php?sub=y");
}

?>