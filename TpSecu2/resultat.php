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
            echo "<table style='border: solid 1px black;'>";
            echo "<tr><th>Id</th><th>Firstname</th><th>Lastname</th><th>Date de naissance</th><th>Ville</th></tr>";

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
                $conn ->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

                //erreur PDO vers Exception
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $nom = isset($_POST['nom']) ? $_POST['nom'] : null;
                //$nom = "Sarrasin";
                $prenom = isset($_POST['prenom']) ? $_POST['prenom'] : null;
                //$prenom = "Jerome";

                $sth = $conn->prepare("
                                    SELECT id, nom, prenom, date_de_naissance, ville
                                    FROM utilisateur WHERE nom = :nom AND prenom = :prenom
                                ");
                $sth->bindParam(':nom', $nom);
                $sth->bindParam(':prenom', $prenom);
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