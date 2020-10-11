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

        <form name="Formulaire d'inscription" action="valide.php" method="post">
            <div>
                <p>
                    <label>Nom : </label><input type="text" name="nom" id="nom" value=""/>
                </p>
                <p>
                    <label>Prenom : </label><input type="text" name="prenom" id="prenom" value=""/>
                </p>
                <p>
                    <label>Date de naissance : </label><input type="date" name="date" id="date" value=""/>
                </p>
                <p>
                    <label>Numero de CB : </label><input type="number" name="CB" id="CB" aria-valuemax="9999999999999999"/>
                </p>
                <p>
                    <label>Ville : </label><input type="text" name="ville" id="ville" value=""/>
                </p>
            </div>
            <div>
                <input type="submit" name="valider" id="valider" value="Valider"/>
            </div>
        </form>
    </body>
</html>
