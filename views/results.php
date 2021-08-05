<?php
    session_start();
    include("../utility/db_conn.php");
    include("../utility/misc.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dist/style.css">
    <link rel="stylesheet" href="../css/dist/all.css">
    <title>Results | Online Voting Portal</title>
    <style>
        *::-webkit-scrollbar{
            width: 8px;
        }
        *::-webkit-scrollbar-thumb{
            border-radius: 10px;
            background: rgba(0,0,0,0.5);
        }
        *::-webkit-scrollbar-track{
            width: 8px;
        }
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            border-radius: 20px;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
    
</head>
<body>
    <div class="w-full bg-blue-200 min-h-screen pt-3 pb-7">
       <div class="w-4/5 m-auto bg-white h-12 flex justify-center items-center rounded-xl shadow-lg">
           <h1 class="uppercase p-1 text-2xl tracking-wider font-bold">Results</h1>
       </div>
       <!--Candidates Container-->
       <div class="w-full mt-5 px-7">
            <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">President</h1>
            <div class="w-full p-2 bg-blue-50 rounded-xl">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $query = $conn->query("SELECT * FROM `candidates` WHERE position = 'president'");
                    while($fetch = $query->fetch_array()) {
                        $id = $fetch['candidate_id'];
                        $query1 = $conn->query("SELECT COUNT(*) as total FROM `votes` WHERE candidate_id = '$id'");
                        $fetch1 = $query1->fetch_assoc();  
                    ?>
                        <tr>
                            <td class="capitalize"><?php echo $fetch ['first_name']. " ".$fetch ['last_name'];?></td>
                            <td class="capitalize"><?php echo $fetch["position"]; ?></td>
                            <td><?php echo $fetch1 ['total'];?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
       </div>
       <!--Candidates Result Container-->
       <div class="w-full mt-5 px-7">
            <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">Vice President</h1>
            <div class="w-full p-2 bg-blue-50 rounded-xl">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $query = $conn->query("SELECT * FROM `candidates` WHERE position = 'vice president'");
                    while($fetch = $query->fetch_array()) {
                        $id = $fetch['candidate_id'];
                        $query1 = $conn->query("SELECT COUNT(*) as total FROM `votes` WHERE candidate_id = '$id'");
                        $fetch1 = $query1->fetch_assoc();  
                    ?>
                        <tr>
                            <td class="capitalize"><?php echo $fetch ['first_name']. " ".$fetch ['last_name'];?></td>
                            <td class="capitalize"><?php echo $fetch["position"]; ?></td>
                            <td><?php echo $fetch1 ['total'];?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
       </div>
       <!--Candidates Result Container-->
       <div class="w-full mt-5 px-7">
            <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">General Secretary</h1>
            <div class="w-full p-2 bg-blue-50 rounded-xl">
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
                            <td class="capitalize"><?php echo $fetch ['first_name']. " ".$fetch ['last_name'];?></td>
                            <td class="capitalize"><?php echo $fetch["position"]; ?></td>
                            <td><?php echo $fetch1 ['total'];?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
       </div>
       <!--Candidates Result Container-->
       <div class="w-full mt-5 px-7">
            <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">SRC Treasurer</h1>
            <div class="w-full p-2 bg-blue-50 rounded-xl">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $query = $conn->query("SELECT * FROM `candidates` WHERE position = 'src treasurer'");
                    while($fetch = $query->fetch_array()) {
                        $id = $fetch['candidate_id'];
                        $query1 = $conn->query("SELECT COUNT(*) as total FROM `votes` WHERE candidate_id = '$id'");
                        $fetch1 = $query1->fetch_assoc();  
                    ?>
                        <tr>
                            <td class="capitalize"><?php echo $fetch ['first_name']. " ".$fetch ['last_name'];?></td>
                            <td class="capitalize"><?php echo $fetch["position"]; ?></td>
                            <td><?php echo $fetch1 ['total'];?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
       </div>
       <!--Candidates Result Container-->
       <div class="w-full mt-5 px-7">
            <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">SRC Pusug President</h1>
            <div class="w-full p-2 bg-blue-50 rounded-xl">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $query = $conn->query("SELECT * FROM `candidates` WHERE position = 'src pusug president'");
                    while($fetch = $query->fetch_array()) {
                        $id = $fetch['candidate_id'];
                        $query1 = $conn->query("SELECT COUNT(*) as total FROM `votes` WHERE candidate_id = '$id'");
                        $fetch1 = $query1->fetch_assoc();  
                    ?>
                        <tr>
                            <td class="capitalize"><?php echo $fetch ['first_name']. " ".$fetch ['last_name'];?></td>
                            <td class="capitalize"><?php echo $fetch["position"]; ?></td>
                            <td><?php echo $fetch1 ['total'];?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
       </div>
       <!--Candidates Result Container-->
       <div class="w-full mt-5 px-7">
            <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">SRC Women's Commissioner</h1>
            <div class="w-full p-2 bg-blue-50 rounded-xl">
                <table>
                    <tr>
                        <th>Name</th>
                        <th>Position</th>
                        <th>Total</th>
                    </tr>
                    <?php
                    $query = $conn->query("SELECT * FROM `candidates` WHERE position = 'src women\'s commissioner'");
                    while($fetch = $query->fetch_array()) {
                        $id = $fetch['candidate_id'];
                        $query1 = $conn->query("SELECT COUNT(*) as total FROM `votes` WHERE candidate_id = '$id'");
                        $fetch1 = $query1->fetch_assoc();  
                    ?>
                        <tr>
                            <td class="capitalize"><?php echo $fetch ['first_name']. " ".$fetch ['last_name'];?></td>
                            <td class="capitalize"><?php echo $fetch["position"]; ?></td>
                            <td><?php echo $fetch1 ['total'];?></td>
                        </tr>
                    <?php } ?>
                </table>
            </div>
       </div>
    </div>
    <script src="../js/all.js"></script>
</body>
</html>