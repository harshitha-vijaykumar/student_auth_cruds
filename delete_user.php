<?php
include "db.php";

if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id='$id'";

    if($conn->query($sql))
    {
        header("Location: manage_user.php");
        exit();
    }
    else
    {
        echo "Error deleting user: " . $conn->error;
    }
}
else
{
    echo "Invalid request.";
}