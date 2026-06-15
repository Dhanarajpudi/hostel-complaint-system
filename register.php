php
<?php
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Register</h2>

<div class="container">
<div class="card">

<form method="POST">
    <input name="name" placeholder="Name" required>
    <input name="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>

    <select name="role">
        <option value="student">Student</option>
        <option value="admin">Admin</option>
    </select>

    <button name="submit">Register</button>
</form>

<?php
if(isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $role = $_POST['role'];

    $conn->query("INSERT INTO users (name,email,password,role) 
    VALUES ('$name','$email','$pass','$role')");

    echo "<p style='color:green;'>Registered Successfully</p>";
}
?>

</div>
</div>

</body>
</html>
