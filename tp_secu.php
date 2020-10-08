<html>

<head>
    <title>Tp SECU/INJECTION</title>
    <meta charset="utf-8">
</head>

<body>
<h1>Formulaire HTML</h1>

<form action="thx.html" method="post">
    <div class="c100">
        <label for="nom">Prénom : </label>
        <input type="text" id="nom" name="nom" style="width:30em">
    </div>
    <div class="c100">
        <label for="prenom">Prenom : </label>
        <input type="text" id="prenom" name="prenom">
    </div>
    <div class="c100">
        <label for="date_de_naissance">Date de naissance : </label>
        <input type="date" id="date_de_naissance" name="date_de_naissance">
    </div>

    <div class="c100">
        <label for="numero_de_cb">Numero de cb : </label>
        <input type="number" id="numero_de_cb" name="numero_de_cb">
    </div>

    <div class="c100">
        <label for="ville">Ville : </label>
        <input type="ville" id="ville" name="ville">
    </div>

    <div class="c100" id="submit">
        <input type="submit" value="Envoyer">
    </div>
</form>

<?php
$servername = 'localhost';
$username = 'Jerome';
$password = 'azerty23?';

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$date_de_naissance = $_POST["date_de_naissance"];
$numero_de_cb = $_POST["numero_de_cb"];
$ville = $_POST["ville"];

//On essaie de se connecter
try {
    $conn = new PDO("mysql:host=$servername;dbname=tp_secu_si", $username, $password);
    //erreur PDO vers Exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo 'Connexion en tant que jérome réussie';

//On insère les données reçues si les champs sont remplis
    if (!empty($nom) && !empty($prenom) && !empty($date_de_naissance) && !empty($numero_de_cb) && !empty($ville)) {
        $sth = $conn->prepare("
                        INSERT INTO utilisateur(nom, prenom, date_de_naissance, numero_de_cb, ville)
                        VALUES(:nom, :prenom, :date_de_naissance, :numero_de_cb, :ville)");
        $sth->bindParam(':nom', $nom);
        $sth->bindParam(':prenom', $prenom);
        $sth->bindParam(':date_de_naissance', $date_de_naissance);
        $sth->bindParam(':numero_de_cb', $numero_de_cb);
        $sth->bindParam(':ville', $ville);
        $sth->execute();
    }


}
catch(PDOException $e){
    echo 'Impossible de traiter les données. Erreur : '.$e->getMessage();
}
?>

</body>

</html>