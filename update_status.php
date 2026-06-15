<?php
include 'db.php';

$id = $_GET['id'];
?>

<h2>Update Status</h2>

<form method="POST">
    <select name="status">
        <option value="Pending">Pending</option>
        <option value="In Progress">In Progress</option>
        <option value="Resolved">Resolved</option>
    </select>

    <button name="update">Update</button>
</form>

<?php
if(isset($_POST['update'])){
    $status = $_POST['status'];

    $conn->query("UPDATE complaints SET status='$status' WHERE id=$id");

    echo "Status Updated!";
}
?>
