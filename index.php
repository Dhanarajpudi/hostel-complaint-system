php
<?php
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<meta charset="UTF-8">
<link rel="stylesheet" href="style.css">
<style>
.login-box { max-width: 400px; margin: 80px auto; }
</style>
</head>

<body>

<h2>Hostel Complaint System</h2>

<div class="container">
<div class="card login-box">

<form method="POST">
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>

    <button name="login">Login</button>
</form>

<p>New user? <a href="register.php">Register</a></p>

<?php
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $result = $conn->query("SELECT * FROM users WHERE email='$email'");

    if($result->num_rows > 0){
        $user = $result->fetch_assoc();

        if(password_verify($pass, $user['password'])){
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];

            if($user['role'] == 'admin'){
                header("Location: admin.php");
            } else {
                header("Location: dashboard.php");
            }
        } else {
            echo "<p style='color:red;'>Invalid Password</p>";
        }
    } else {
        echo "<p style='color:red;'>User not found</p>";
    }
}
?>

</div>
</div>

</body>
</html>

