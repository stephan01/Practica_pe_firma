<?php
//try to connect the PDO

try{
$conn = new PDO('mysql:host=localhost;dbname=practice', 'root', '');
//but catch orice scenariu ce va fi cuprins in catch
} catch (PDOException $e){
die ('Could not connect.');
}



