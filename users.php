<?php
include 'db.php';

$result = $conn->query("SELECT * FROM users");
?>

<h2>All Users</h2>

<table border="1">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Role</th>
    <th>Action</th>
</tr>

<?php
while($row = $result->fetch_assoc()){
    echo "<tr>
        <td>".$row['id']."</td>
        <td>".$row['name']."</td>
        <td>".$row['email']."</td>
        <td>".$row['role']."</td>
        <td>
            <a href='edit_user.php?id=".$row['id']."'>Edit</a>
        </td>
    </tr>";
}
?>

</table>
