<?php
include "dbcon.php";
$id = $_GET['id'];
$sql = "DELETE FROM people WHERE id=:id";
$stmt = $conn->prepare($sql);
//daca se face "delete" revenim la pagina principala
if($stmt->execute([':id' => $id])){
    header("location: index.php");
}
?>

        