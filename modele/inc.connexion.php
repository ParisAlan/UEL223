<?php
// On note les différentes informations qui vont nous permettre de se connecter a la base de données ! 
// Évidemment, on utilise la méthode PDO afin de faire quelque chose de fonctionnelle.
$host = 'localhost'; 
$port = '3306';      
$db_name = 'hudsonbayuni';
$username = 'hudsonbayuni';
$password = 'QstH_CU]zvqQu7UK'; 

try {
    
    $dsn = "mysql:host=$host;port=$port;dbname=$db_name;charset=utf8";

    // Connexion à la base de données
    // $bdd est un objet correspondant à la connexion à la base de données
    $bdd = new PDO($dsn, $username, $password);

    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


} catch (PDOException $e) {
    // On lance une fonction PHP qui permet de connaître l'erreur renvoyée 
    // lors de la connexion à la base (en récupérant le message lié à l'exception)
    die('<strong>Erreur détectée !!! </strong> : ' . $e->getMessage());
}
?>
