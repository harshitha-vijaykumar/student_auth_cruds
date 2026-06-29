<?php
include "db.php";
?>
<?php
$result = $conn->query("SELECT * FROM users");
?>
<!DOCTYPE html> 
<html>
    <head>
        <title>Manage Users</title>
        <link rel="stylesheet" type="text/css" href="style.css">
    </head>
    <body>
        <div class="container">
    
            <h2>Manage Users</h2>
            <table border="1" cellpadding="10" cellspacing="0">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>  
                    <th>Gender</th>
                    <th>Address</th>        
                    <th>Action</th>
                </tr>       
                <?php while($row = $result->fetch_assoc())
                 {
                    ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['gender']; ?></td>
                    <td><?php echo $row['address']; ?></td>
                    <td>
                        <a  class="edit" href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a> 
                        <a class="delete" href="delete_user.php?id=<?php echo $row['id']; ?>"
                        onclick="return confirm('Are you sure you want to delete this user?');">
                        Delete</a>
                    </td>
                </tr>
                <?php }
                 ?>
            </table>
        </div>
    </body>
</html>