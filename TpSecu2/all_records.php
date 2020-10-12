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

<h2>Utilisateurs</h2>

<table border="2">
    <tr>
        <td>Sr.No.</td>
        <td>Full Name</td>
        <td>Age</td>
        <td>Ville</td>
        <td>Date de naissance</td>
        <td>Delete</td>

    </tr>

    <?php

    $db = mysqli_connect("localhost","tousdroits","tWnY6fBH4SanFwCd","basetest");

    if(!$db)
    {
        die("Connection failed: " . mysqli_connect_error());
    }


    $records = mysqli_query($db,"select * from utilisateur"); // fetch data from database

    while($data = mysqli_fetch_array($records))
    {
        ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['nom']; ?></td>
            <td><?php echo $data['prenom']; ?></td>
            <td><?php echo $data['ville']; ?></td>
            <td><?php echo $data['date_de_naissance']; ?></td>
            <td><a href="deletion.php?id=<?php echo $data['id']; ?>">Delete</a></td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>

