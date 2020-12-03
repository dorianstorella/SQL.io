
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
    echo $donnees['ville'] ." ".$donnees["haut"]." ". $donnees["bas"] ."<br>";
}
$resultat->closeCursor();
?>

  