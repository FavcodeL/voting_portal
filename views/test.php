<?php
    include("../utility/db_conn.php");
    include("../utility/misc.php");  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vote Results</title>
</head>
<body>
    <table>
        <tr>
            <th>Name</th>
            <th>Position</th>
            <th>Total</th>
        </tr>
        <?php
        $query = $conn->query("SELECT * FROM `candidates` WHERE position = 'general secretary'");
        while($fetch = $query->fetch_array()) {
            $id = $fetch['candidate_id'];
            $query1 = $conn->query("SELECT COUNT(*) as total FROM `votes` WHERE candidate_id = '$id'");
            $fetch1 = $query1->fetch_assoc();  
        ?>
            <tr>
                <td><?php echo $fetch ['first_name']. " ".$fetch ['last_name'];?></td>
                <td><?php echo $fetch["position"]; ?></td>
                <td><?php echo $fetch1 ['total'];?></td>
            </tr>
        <?php } ?>           
    </table>
</body>
</html>