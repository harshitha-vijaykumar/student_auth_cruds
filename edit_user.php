<?php
include "db.php";
?>
<?php
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM users WHERE id='$id'");
$user = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
    <div class="container">
        <h2>Edit User</h2>
        <form method="POST" action="">
            <input type="hidden" name="id" value="<?php echo $user['id']; ?>">
            <input type="text" name="name" placeholder="Name" value="<?php echo $user['name']; ?>" required><br><br>
            <input type="email" name="email" placeholder="Email" value="<?php echo $user['email']; ?>" required><br><br>
            <input type="text" name="phone" placeholder="Phone Number" value="<?php echo $user['phone']; ?>" required><br><br>
            <select name="gender">
                <option value="Male" <?php if($user['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                <option value="Female" <?php if($user['gender'] == 'Female') echo 'selected'; ?>>Female</option>
            </select><br><br>
            <input type="text" name="address" placeholder="Address" value="<?php echo $user['address']; ?>" required><br><br>
            <input type="submit" name="update" value="Update User">
        </form>
    </div>
</body>
</html>
<?php

if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];   

    $sql = "UPDATE users SET name='$name', email='$email', phone='$phone', gender='$gender', address='$address' WHERE id='$id'";    

    if($conn->query($sql))
    {
        header("Location: manage_user.php");
        exit();
    }
    else
    {
        echo "Error updating user: " . $conn->error;
    }
}
?>