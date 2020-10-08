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
        </menu>

    <?php
    $servername = 'localhost';
    $username = 'tousdroits';
    $password = 'tWnY6fBH4SanFwCd';

    //On essaie de se connecter
    try{
        $conn = new PDO("mysql:host=$servername;dbname=basetest", $username, $password);
        //erreur PDO vers Exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        print("Connexion réussie\n");

        $nom = isset($_POST['nom']) ? $_POST['nom'] : null;//"Sarrasin";
        $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;//"Jerome";
        $date_de_naissance = isset($_POST['date']) ? $_POST['date'] : null;// "1998-03-13" ;
        $numero_CB = isset($_POST['CB']) ? $_POST['CB'] : null;//1234525465421549;
        $ville = isset($_POST['ville']) ? $_POST['ville'] : null;//"Anger";

        //$sth appartient à la classe PDOStatement
        $sth = $conn->prepare("
                        INSERT INTO utilisateur(nom, prenom, date_de_naissance, numero_CB, ville)
                        VALUES (:nom, :prenom, :date_de_naissance, :numero_CB, :ville)
                    ");
        //La constante de type par défaut est STR
        $sth->bindParam(':nom', $nom);
        $sth->bindParam(':prenom', $prenom);
        $sth->bindParam(':date_de_naissance', $date_de_naissance);
        $sth->bindParam(':numero_CB', $numero_CB, PDO::PARAM_INT);
        $sth->bindParam(':ville', $ville);
        $sth->execute();
        print("Entrée ajoutée dans la table\n");
    }

    catch(PDOException $e){
        echo "Erreur : " . $e->getMessage();
    }

    $conn = null;
    ?>
    </body>
</html>
