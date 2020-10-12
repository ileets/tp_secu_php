<!DOCTYPE html>
<html>
<head>
    <title>Display all records from Database</title>
</head>
<body>

<h2>Utilisateurs</h2>

<table border="2">
    <tr>
        <td>Sr.No.</td>
        <td>Full Name</td>
        <td>Age</td>
        <td>Edit</td>
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

