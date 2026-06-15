php
<?php
session_start();
include 'db.php';

// Check if user logged in
if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Complaint</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Add Complaint</h2>

<div class="container">
<div class="card">

<form method="POST">

    <label>Enter Complaint</label>
    <textarea name="complaint" placeholder="Describe your issue..." required></textarea>

    <label>Priority</label>
    <select name="priority">
        <option value="Low">Low</option>
        <option value="Medium">Medium</option>
        <option value="High">High</option>
    </select>

    <button name="submit">Submit Complaint</button>

</form>

<?php
if(isset($_POST['submit'])){
    $complaint = $_POST['complaint'];
    $priority = $_POST['priority'];

    $conn->query("INSERT INTO complaints (user_id, complaint, priority) 
    VALUES ($user_id, '$complaint', '$priority')");

    echo "<p style='color:green;'>Complaint submitted successfully!</p>";
}
?>

<br>
<a href="dashboard.php">← Back to Dashboard</a>

</div>
</div>

</body>
</html>

