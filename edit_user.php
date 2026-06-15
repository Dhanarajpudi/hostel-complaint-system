<?php
include 'db.php';

$id = $_GET['id'];

// Fetch existing data
$result = $conn->query("SELECT * FROM users WHERE id=$id");
$user = $result->fetch_assoc();
?>

<h2>Edit User</h2>

<form method="POST">
    <input name="name" value="<?php echo $user['name']; ?>" required>
    <input name="email" value="<?php echo $user['email']; ?>" required>
    <input name="password" value="<?php echo $user['password']; ?>" required>

    <select name="role">
        <option value="student" <?php if($user['role']=="student") echo "selected"; ?>>Student</option>
        <option value="admin" <?php if($user['role']=="admin") echo "selected"; ?>>Admin</option>
    </select>

    <button name="update">Update</button>
</form>

<?php
if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $role = $_POST['role'];

    $conn->query("UPDATE users SET 
        name='$name',
        email='$email',
        password='$pass',
        role='$role'
        WHERE id=$id
    ");

    echo "User Updated!";
}
?>
