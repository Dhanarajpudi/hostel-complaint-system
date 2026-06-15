php
<?php
session_start();
include 'db.php';

// Only admin
if(!isset($_SESSION['role']) || $_SESSION['role'] != 'admin'){
    echo "Access Denied";
    exit();
}

// Status count
$statusQuery = $conn->query("
    SELECT status, COUNT(*) as count 
    FROM complaints 
    GROUP BY status
");

$statusData = [];
while($row = $statusQuery->fetch_assoc()){
    $statusData[$row['status']] = $row['count'];
}

// Priority count
$priorityQuery = $conn->query("
    SELECT priority, COUNT(*) as count 
    FROM complaints 
    GROUP BY priority
");

$priorityData = [];
while($row = $priorityQuery->fetch_assoc()){
    $priorityData[$row['priority']] = $row['count'];
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Analytics Dashboard</title>
<link rel="stylesheet" href="style.css">
<meta charset="UTF-8">
</head>

<body>

<h2>Analytics Dashboard</h2>

<div class="container">
<div class="card">

<h3>Complaint Status Overview</h3>

<p>Pending: <?php echo $statusData['Pending'] ?? 0; ?></p>
<p>In Progress: <?php echo $statusData['In Progress'] ?? 0; ?></p>
<p>Resolved: <?php echo $statusData['Resolved'] ?? 0; ?></p>

</div>

<div class="card">

<h3>Complaint Priority Overview</h3>

<p class="low">Low: <?php echo $priorityData['Low'] ?? 0; ?></p>
<p class="medium">Medium: <?php echo $priorityData['Medium'] ?? 0; ?></p>
<p class="high">High: <?php echo $priorityData['High'] ?? 0; ?></p>

</div>

<a href="admin.php">← Back to Admin</a>

</div>

</body>
</html>

