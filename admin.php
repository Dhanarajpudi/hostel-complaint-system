<?php
session_start();
include 'db.php';

if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    echo "Access Denied";
    exit();
}

$result = $conn->query("
    SELECT complaints.*, users.name 
    FROM complaints 
    JOIN users ON complaints.user_id = users.id
");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
</head>

<body>

<h2>Admin Dashboard</h2>

<div class="container">

<div class="card">
<a href="analytics.php">📊 Analytics</a> |
<a href="logout.php">Logout</a>
</div>

<div class="card">

<table>
<tr>
    <th>User</th>
    <th>Complaint</th>
    <th>Priority</th>
    <th>Status</th>
    <th>Action</th>
</tr>

<?php
while($row = $result->fetch_assoc()){

    $priorityClass = strtolower($row['priority']);

    $statusClass = '';
    if($row['status'] == 'Pending') $statusClass = 'pending';
    if($row['status'] == 'In Progress') $statusClass = 'progress';
    if($row['status'] == 'Resolved') $statusClass = 'resolved';

    echo "<tr>
        <td>".$row['name']."</td>
        <td>".$row['complaint']."</td>
        <td class='$priorityClass'>".$row['priority']."</td>
        <td class='$statusClass'>".$row['status']."</td>
        <td><a href='update_status.php?id=".$row['id']."'>Update</a></td>
    </tr>";
}
?>

</table>

</div>
</div>

</body>
</html>
