<?php
include "dbcon.php";

$sql = "SELECT * FROM people";
$stmt = $conn->prepare($sql);
$stmt->execute();

//fetch data from database folosind "fetch all" function
$people = $stmt->fetchAll(PDO::FETCH_OBJ);


?>

        <?php require "header.php"; ?>
<br>
<H2 class="empl">All Employers</H2>
<br>
<div class="table">
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
        <?php foreach($people as $person): ?> 
        <tr>
            <td><?php echo $person->id;?></td>
            <td><?php echo $person->name;?></td>
            <td><?php echo $person->email;?></td>
            <td class="btn">
                <a href="edit.php?id=<?php echo $person->id ?>" class="edit">Edit</a>
                <a onclick="return confirm('Are you sure you want to fire this employee?')" href="delete.php?id=<?php echo $person->id ?>" class="delete">Delete</a>
            </td>
        </tr>
        <?php endforeach; ?> 
    </table>
</div>




        <?php require "footer.php"; ?>



   
    
