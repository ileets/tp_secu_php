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
    <li><a href="reviews.php" title="Afficher commentaires">Commentaires</a></li>
    <li><a href="all_records.php" title=" Liste utilisateurs ">Liste d'utilisateurs</a></li>
</menu>

<h2>Utilisateurs</h2>

<?php
//$user = "tousdroits";
$user = "lectureSeule";
//$mdp = "tWnY6fBH4SanFwCd";
$mdp = "ceciestmonmdp";
$db = mysqli_connect("localhost", $user, $mdp,"basetest");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}
?>

<table style="align-content: center" border="solid 2px" margin="5%" cellpadding="5%" width="100%">
    <tr>
        <th>Sr.No.</th>
        <th>Full Name</th>
        <th>Age</th>
        <th>Ville</th>
        <?php if($user == "tousdroits"){
            echo "<th>Date de naissance</th>";
            echo "<th>numero CB</th>";
        } ?>
        <th>Delete</th>
    </tr>

    <?php
    $records = mysqli_query($db,"select * from utilisateur"); // fetch data from database

    while($data = mysqli_fetch_array($records))
    {
        ?>
        <tr>
            <td><?php echo $data['id']; ?></td>
            <td><?php echo $data['nom']; ?></td>
            <td><?php echo $data['prenom']; ?></td>
            <td><?php echo $data['ville']; ?></td>
            <?php if($user == "tousdroits"){
                $date = $data['date_de_naissance'];
                $cb = $data['numero_CB'];
            echo "<td> $date </td>";
            echo "<td> $cb </td>";
            }
            ?>
            <td><a href="deletion.php?id=<?php echo $data['id']; ?>">Delete</a></td>
        </tr>
        <?php
    }
    ?>
</table>

</body>
</html>

