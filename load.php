<?php
$conn = mysqli_connect("localhost", "root", "", "ajax") or die("Connection failed");

$sql = "SELECT * FROM users ORDER BY id DESC";
$result = mysqli_query($conn, $sql) or die("Query Failed.");

$output = "";

if(mysqli_num_rows($result) > 0){
    while($row = mysqli_fetch_assoc($result)){
        $output .= "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                    </tr>";
    }
    echo $output;
} else {
    echo "<tr><td colspan='3'>No users found</td></tr>";
}

mysqli_close($conn);
?>
