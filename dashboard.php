php
<?php
session_start();
include 'db.php';

if(!isset($_SESSION['user_id'])){
    header("Location: index.php");
}

$id = $_SESSION['user_id'];
$res = $conn->query("SELECT * FROM complaints WHERE user_id=$id");
?>

<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<link rel="stylesheet" href="style.css">
</head>

<body>

<h2>Your Complaints</h2>

<div class="container">

<div class="card">
<a href="add_complaint.php">➕ Add Complaint</a> |
<a href="logout.php">Logout</a>
</div>

<div class="card">

<table>
<tr>
    <th>Complaint</th>
    <th>Priority</th>
    <th>Status</th>
</tr>

<?php
while($row = $res->fetch_assoc()){

    $priorityClass = strtolower($row['priority']);

    $statusClass = '';
    if($row['status'] == 'Pending') $statusClass = 'pending';
    if($row['status'] == 'In Progress') $statusClass = 'progress';
    if($row['status'] == 'Resolved') $statusClass = 'resolved';

    echo "<tr>
        <td>".$row['complaint']."</td>
        <td class='$priorityClass'>".$row['priority']."</td>
        <td class='$statusClass'>".$row['status']."</td>
    </tr>";
}
?>

</table>

</div>
</div>

</body>
</html>
