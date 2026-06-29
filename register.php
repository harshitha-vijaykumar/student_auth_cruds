<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'db.php';
$message = "";

if(isset($_POST['register']))
{
    $name = $_POST['name'];
    $email = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];

    $check = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($check);

    if($result->num_rows > 0)
    {
        $message = "<p class='error'>Email already exists</p>";
    }
    else
    {
        $sql = "INSERT INTO users(name,email,password,phone,gender,address) VALUES('$name','$email','$password','$phone','$gender','$address')";

        if($conn->query($sql))
        {
            $message = "<p class='success'>Registration Successful</p>";
        }
        else
        {
            $message = "<p class='error'>Error: " . $conn->error . "</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<div class="container">
<h2>User Registration</h2>

<?php echo $message; ?>

<form method="POST">

<input type="text" name="name" placeholder="Name" required><br><br>

<input type="email" name="email" placeholder="Email" required><br><br>

<input type="password" name="password" placeholder="Password" required><br><br>

<input type="text" name="phone" placeholder="Phone Number" required><br><br>

<select name="gender" required>
    <option value="">Select Gender</option>
    <option value="Male">Male</option>
    <option value="Female">Female</option>
    <option value="Other">Other</option>
</select><br><br>

<textarea name="address" placeholder="Address" required></textarea><br><br>

<button type="submit" name="register">Register</button>

</form>

<a href="login.php"> already have an account? Login Here</a>
</div>
</body>
</html>