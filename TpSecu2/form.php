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

        <form name="Formulaire d'inscription" action="valide.php" method="post">
            <div>
                <p>
                    <label>Nom : </label><input type="text" name="nom" id="nom" value="" required pattern="^[A-Za-z '-]+$" maxlength="20"/>
                </p>
                <p>
                    <label>Prenom : </label><input type="text" name="prenom" id="prenom" value="" required pattern="^[A-Za-z '-]+$" maxlength="20"/>
                </p>
                <p>
                    <label>Date de naissance : </label><input type="date" name="date" id="date" value="1995-04-25"/>
                </p>
                <p>
                    <label>Numero de CB : </label><input type="number" name="CB" id="CB" valuemax="9999999999999999" minlength="16" maxlength="16" " />

                </p>
                <p>
                    <label>Ville : </label><input type="text" name="ville" id="ville" value="" required pattern="^[A-Za-z '-]+$" maxlength="38"/>
                </p>
            </div>
            <div>
        </form>
    </body>
</html>
