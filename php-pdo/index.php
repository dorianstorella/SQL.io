<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    

<?php 
try {
    $db = new PDO("mysql:host=localhost;dbname=weatherapp;charset=utf8",'root','');
    
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}
$resultat = $db->query('SELECT * FROM météo');
$donnees = $resultat->fetch();
while ($donnees = $resultat->fetch())
{
    echo $donnees['ville'] . " " . $donnees["haut"]." ". $donnees["bas"] ."<br>";
}
$resultat->closeCursor();
?>

<?php


?>

<table>
    <tr>
    <th>ville</th>
    <th>haut</th>
    <th>bas</th>
    </tr>
    <tr>
    <!--   ici arrive sql -->   
<?PHP
    $resultat = $db->query('SELECT * FROM météo');
$donnees = $resultat->fetch();
while ($donnees = $resultat->fetch())
{
    echo "<tr>" . "<td>" . $donnees['ville'] . "</td>" . " " . "<td>" . $donnees["haut"] . "</td>" . " " . "<td> ". $donnees["bas"] ."</td>". "</tr>";
}
$resultat->closeCursor();
?>    
    <!--
    <td>hey</td>
    <td>hey</td>
    <td>hey</td>
    </tr>
    <tr>
    <td>hey</td>
    <td>hey</td>
    <td>hey</td>
    </tr>
    <tr>
    <td>hey</td>
    <td>hey</td>
    <td>hey</td>
    </tr>-->
</table>


</body>
</html>  