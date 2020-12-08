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
    echo $donnees['ville'] . " " . $donnees["haut"] . " " . $donnees["bas"] . "<br>";
}
$resultat->closeCursor();
?>

<?php


?>



 
 
 <!--ici commence formulaire-->
<form action="" method="post">
<label for="NewCountry">entrer ville</label> 
<input type="texte" name="NewCountry" id="NewCountry">

<label for="bas">entrer basse tempe</label> 
<input type="texte" name="bas">

<label for="haut">entrer haute tempe</label> 
<input type="texte" name="haut">

<input type="submit" name="submit" value="ok">
</form>
<table>    
    <tr>
    <th>ville</th>
    <th>haut</th>
    <th>bas</th>
    </tr>

<?PHP
if (isset($_POST['submit'])){
$req = $db->prepare('INSERT INTO météo (ville , bas , haut) VALUES (:ville, :bas, :haut)');
$req->execute (array(
    'ville' =>$_POST['NewCountry'],
    'bas' =>$_POST['bas'],
    'haut'=>$_POST['haut']
));
} 


    
  // <!--   ici arrive sql pour aficher tableau-->   

$resultat = $db->query('SELECT * FROM météo');
$donnees = $resultat->fetch();
    while ($donnees = $resultat->fetch())
    {
        echo "<tr>" . "<td>" . $donnees['ville'] . "</td>" .  "<td>" . $donnees["haut"] . "</td>" .  "<td> ". $donnees["bas"] ."</td>" . "</tr>";
    }
$resultat->closeCursor();
?>    
 
</table>
<br>


</body>
</html>  