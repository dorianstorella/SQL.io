<?php
/*try {
    $dbh = new PDO('mysql:host=localhost;dbname=becode', 'root', '');
    foreach($dbh->query('SELECT * from jeux_video') as $row) {
        print_r($row);
    }
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}*/


try
{
	// On se connecte à MySQL
	$bdh = new PDO('mysql:host=localhost;dbname=becode;charset=utf8', 'root', '');
}
catch(Exception $e)
{
	// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());
}
$resultat = $bdh->query('SELECT DISTINCT console FROM jeux_video');
$donnees = $resultat->fetch();
while ($donnees = $resultat->fetch())
{
    
    echo ($donnees['console'] . '<br>') ;
    
}
$resultat->closeCursor();
?>