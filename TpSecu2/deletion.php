<?php



$db = mysqli_connect("localhost","tousdroits","tWnY6fBH4SanFwCd","basetest");

if(!$db)
{
    die("Connection failed: " . mysqli_connect_error());
}

$id = $_GET['id']; // get id through query string

$del = mysqli_query($db,"delete from utlisateur where id = '$id'"); // delete query

if($del)
{
header("location:all_records.php"); // redirects to all records page
exit;
}
else
{
echo "Error deleting record"; // display error message if not delete
}
?>