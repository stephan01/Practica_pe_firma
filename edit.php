<?php
include "dbcon.php";
$id = $_GET['id'];
$sql = "SELECT * FROM people WHERE id=:id";
$stmt = $conn->prepare($sql);
$stmt->execute([':id' => $id]);
//not fetchAll pt. ca e vorba de un singur "obiect"
$person = $stmt->fetch(PDO::FETCH_OBJ);

if (isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
  
$sql = "UPDATE people SET name=:name, email=:email WHERE id=:id";
$stmt = $conn->prepare($sql);
//de fiecare data cand statement-ul va fi executat valorile vor fi urmatoarele:
if($stmt->execute([':name' => $name, ':email' => $email, ':id' => $id])) {



header("location: index.php");
}
}

?>

        <?php require "header.php"; ?>

<div class="create-container">
       
    <h2>Edit this employee: </h2>
  
     <form action="" method="POST">
     <label for="name">Name: </label>
     <input value="<?php echo $person->name ?>" type="text" name="name" id="name" placeholder="Edit employee name" required>
     <label for="email">Email: </label>
     <input value="<?php echo $person->email ?>" type="email" name="email" id="email" placeholder="Eedit employee's email" required>
     <button type="submit" name="submit" >Edit!</button>
     </form>     
     
</div>





        <?php require "footer.php"; ?>