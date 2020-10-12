<!DOCTYPE html>
<html>
<head>
    <title>TP Secu PHP</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h1>Bases de données</h1>
<menu type="toolbar" autofocus="true" id="menuprinc">
    <li><a href="index.php" title="Accueil">Index</a></li>
    <li><a href="form.php" title="Formulaire nouvel utilisateur">Formulaire</a></li>
    <li><a href="recherche.php" title="Recherche utilisateur">Recherche</a></li>
    <li><a href="reviews.php" title="Afficher commentaires"</li>
    <li><a hrref="all_records.php" title=" Liste utilisateurs "</li>
</menu>

<?php
echo "<table style='border: solid 1px black;'>";
echo "<tr><th>Commentaires</th></tr>";

class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width: 150px; border: 1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        echo "<tr>";
    }

    function endChildren() {
        echo "</tr>" . "\n";
    }
}
$servername = 'localhost';
$username = 'tousdroits';
$password = 'tWnY6fBH4SanFwCd';

//On essaie de se connecter
try{

    $conn = new PDO("mysql:host=$servername;dbname=basetest", $username, $password);
    //erreur PDO vers Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sth = $conn->prepare(" SELECT description FROM commentaire  ");
    $sth->execute();

    $result = $sth->setFetchMode(PDO::FETCH_ASSOC);
    foreach(new TableRows(new RecursiveArrayIterator($sth->fetchAll())) as $k=>$v) {
        echo $v;
    }
}
catch(PDOException $e){
    echo "Erreur : " . $e->getMessage();
}
echo "</table>";

$conn = null;
?>
</body>
</html>