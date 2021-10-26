<?php
include "dbcon.php";

$msg = "";
if (isset($_POST['name']) && isset($_POST['email'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
  
$sql = "INSERT INTO people (name, email) VALUES (:name, :email)";
$stmt = $conn->prepare($sql);
//de fiecare data cand statement-ul va fi executat valorile vor fi urmatoarele:
if($stmt->execute([':name' => $name, ':email' => $email])) {


$msg = 'Employment action has succesfully completed !';
//optional in loc de mesaj : header("location: index.php");
// cu mesaj raman pe pagina sa mai angajez
// cu header ma retrimite la pag. principala

}
}

?>

        <?php require "header.php"; ?>

<div class="create-container">
       
    <h2>Employ a person</h2>
    <?php if (!empty($msg)): ?>
         <div class="alert alert-succes">
             <?php echo "<script>alert('$msg');</script>" ?>
         </div>
    <?php endif; ?>
     <form action="create.php" method="POST">
     <label for="name">Name: </label>
     <input type="text" name="name" id="name" placeholder="Enter the new employed person" required>
     <label for="email">Email: </label>
     <input type="email" name="email" id="email" placeholder="Enter the new employed person's email" required>
     <button type="submit" name="submit" >Employ!</button>
     </form>     
     
</div>





        <?php require "footer.php"; ?>