<?php
    session_start();
    include("../utility/db_conn.php");
    include("../utility/misc.php");
    if(!$_SESSION["voter_id"]){
        header("Location: sign_in.php");
    }

    $vote_success = "";
    $vote_failure = "";
    
    if(isset($_POST["vote-candidates"])){
        $president = validate_data($_POST["president"]);
        $vice_president = validate_data($_POST["vice-president"]);
        $general_secretary = validate_data($_POST["general-secretary"]);
        $src_treasurer = validate_data($_POST["src-treasurer"]);
        $src_pusug_president = validate_data($_POST["src-pusug-president"]);
        $src_women_commissioner = validate_data($_POST["src-women-commissioner"]);
        $voter_id = $_SESSION["voter_id"];

        if($voter_id){
            prepare_bind_insert_vote($president, $voter_id, "president");
            prepare_bind_insert_vote($vice_president, $voter_id, "vice president");
            prepare_bind_insert_vote($general_secretary, $voter_id, "general secretary");
            prepare_bind_insert_vote($src_treasurer, $voter_id, "src treasurer");
            prepare_bind_insert_vote($src_pusug_president, $voter_id, "src pusug president");
            prepare_bind_insert_vote($src_women_commissioner, $voter_id, "src women commissioner");

            $sql = "UPDATE `voters` SET `status` = '1' WHERE `voters`.`voter_id` = '$voter_id'";

            if($conn->query($sql) == true){
                $vote_success = "Vote sucessful.";
                log_out();
                header("refresh:3;url=../../index.html");
            }else{
                $vote_failure = "Could not complete voting process.";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/dist/style.css">
    <link rel="stylesheet" href="../css/dist/all.css">
    <title>Vote | Online Voting Portal</title>
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
    </style>
</head>
<body>
    <div class="w-full bg-blue-200 min-h-screen pt-3 pb-7">
       <div class="w-4/5 m-auto bg-white h-12 flex justify-center items-center rounded-xl shadow-lg">
           <h1 class="uppercase p-1 text-2xl tracking-wider font-bold">Welcome <?php echo $_SESSION["name"]?>, vote for desired candidates</h1>
       </div>
       <span class="text-red-600"><?php echo $vote_failure; ?></span>
        <span class="text-green-600 pl-4 text-lg"><?php echo $vote_success; ?></span>
       <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
       <!--Candidates Container-->
       <div class="w-full mt-5 px-7">
       <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">President</h1>
                <!--Candidates Container inner-->
                <div class="w-full bg-white rounded-2xl shadow-inner py-3 px-1 flex justify-start items-center">
                    <?php
                        $sql = "SELECT * FROM `candidates` WHERE `position` = 'president'";
                        $result = $conn->query($sql);
                        
                        if($result != false && $result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                    ?>
                       <!--Candidate-->
                        <div class="h-72 w-60 bg-blue-200 rounded-2xl mx-2 shadow-md pt-2 px-2">
                            <img class="mx-auto h-2/5 rounded-full shadow-md" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="">
                            <div class="h-3/6 bg-white w-full mt-4 rounded-xl shadow-md p-2">
                                <p><span class="font-bold">Name: </span> <span class="font-semibold"><?php echo $row["first_name"]." ".$row["last_name"]; ?></span></p>
                                <p><span class="font-bold">Level: </span> <span class="font-semibold"><?php echo $row["level"]; ?></span></p>
                                <p><span class="font-bold">Position: </span> <span class="font-semibold"><?php echo $row["position"]; ?></span></p>
                                <p>
                                    <span class="font-bold">Select: </span>
                                    <input class="ml-3 transform translate-y-1/4 w-4 h-4" type="radio" value="<?php echo $row["candidate_id"]; ?>" name="president">
                                </p>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
               <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">Vice President</h1>
                <!--Candidates Container inner-->
                <div class="w-full bg-white rounded-2xl shadow-inner py-3 px-1 flex justify-start items-center">
                    <?php
                        $sql = "SELECT * FROM `candidates` WHERE `position` = 'vice president'";
                        $result = $conn->query($sql);
                        
                        if($result != false && $result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                    ?>
                       <!--Candidate-->
                        <div class="h-72 w-60 bg-blue-200 rounded-2xl mx-2 shadow-md pt-2 px-2">
                            <img class="mx-auto h-2/5 rounded-full shadow-md" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="">
                            <div class="h-3/6 bg-white w-full mt-4 rounded-xl shadow-md p-2">
                                <p><span class="font-bold">Name: </span> <span class="font-semibold"><?php echo $row["first_name"]." ".$row["last_name"]; ?></span></p>
                                <p><span class="font-bold">Level: </span> <span class="font-semibold"><?php echo $row["level"]; ?></span></p>
                                <p><span class="font-bold">Position: </span> <span class="font-semibold"><?php echo $row["position"]; ?></span></p>
                                <p>
                                    <span class="font-bold">Select: </span>
                                    <input class="ml-3 transform translate-y-1/4 w-4 h-4" type="radio" value="<?php echo $row["candidate_id"]; ?>" name="vice-president">
                                </p>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
               <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">General Secretary</h1>
                <!--Candidates Container inner-->
                <div class="w-full bg-white rounded-2xl shadow-inner py-3 px-1 flex justify-start items-center">
                    <?php
                        $sql = "SELECT * FROM `candidates` WHERE `position` = 'general secretary'";
                        $result = $conn->query($sql);
                        
                        if($result != false && $result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                    ?>
                       <!--Candidate-->
                        <div class="h-72 w-60 bg-blue-200 rounded-2xl mx-2 shadow-md pt-2 px-2">
                            <img class="mx-auto h-2/5 rounded-full shadow-md" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="">
                            <div class="h-3/6 bg-white w-full mt-4 rounded-xl shadow-md p-2">
                                <p><span class="font-bold">Name: </span> <span class="font-semibold"><?php echo $row["first_name"]." ".$row["last_name"]; ?></span></p>
                                <p><span class="font-bold">Level: </span> <span class="font-semibold"><?php echo $row["level"]; ?></span></p>
                                <p><span class="font-bold">Position: </span> <span class="font-semibold"><?php echo $row["position"]; ?></span></p>
                                <p>
                                    <span class="font-bold">Select: </span>
                                    <input class="ml-3 transform translate-y-1/4 w-4 h-4" type="radio" value="<?php echo $row["candidate_id"]; ?>" name="general-secretary">
                                </p>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
               <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">SRC Treasurer</h1>
                <!--Candidates Container inner-->
                <div class="w-full bg-white rounded-2xl shadow-inner py-3 px-1 flex justify-start items-center">
                    <?php
                        $sql = "SELECT * FROM `candidates` WHERE `position` = 'src treasurer'";
                        $result = $conn->query($sql);
                        
                        if($result != false && $result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                    ?>
                       <!--Candidate-->
                        <div class="h-72 w-60 bg-blue-200 rounded-2xl mx-2 shadow-md pt-2 px-2">
                            <img class="mx-auto h-2/5 rounded-full shadow-md" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="">
                            <div class="h-3/6 bg-white w-full mt-4 rounded-xl shadow-md p-2">
                                <p><span class="font-bold">Name: </span> <span class="font-semibold"><?php echo $row["first_name"]." ".$row["last_name"]; ?></span></p>
                                <p><span class="font-bold">Level: </span> <span class="font-semibold"><?php echo $row["level"]; ?></span></p>
                                <p><span class="font-bold">Position: </span> <span class="font-semibold"><?php echo $row["position"]; ?></span></p>
                                <p>
                                    <span class="font-bold">Select: </span>
                                    <input class="ml-3 transform translate-y-1/4 w-4 h-4" value="<?php echo $row["candidate_id"]; ?>" type="radio" name="src-treasurer">
                                </p>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
               <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">SRC Pusug President</h1>
                <!--Candidates Container inner-->
                <div class="w-full bg-white rounded-2xl shadow-inner py-3 px-1 flex justify-start items-center">
                    <?php
                        $sql = "SELECT * FROM `candidates` WHERE `position` = 'src pusug president'";
                        $result = $conn->query($sql);
                        
                        if($result != false && $result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                    ?>
                       <!--Candidate-->
                        <div class="h-72 w-60 bg-blue-200 rounded-2xl mx-2 shadow-md pt-2 px-2">
                            <img class="mx-auto h-2/5 rounded-full shadow-md" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="">
                            <div class="h-3/6 bg-white w-full mt-4 rounded-xl shadow-md p-2">
                                <p><span class="font-bold">Name: </span> <span class="font-semibold"><?php echo $row["first_name"]." ".$row["last_name"]; ?></span></p>
                                <p><span class="font-bold">Level: </span> <span class="font-semibold"><?php echo $row["level"]; ?></span></p>
                                <p><span class="font-bold">Position: </span> <span class="font-semibold"><?php echo $row["position"]; ?></span></p>
                                <p>
                                    <span class="font-bold">Select: </span>
                                    <input class="ml-3 transform translate-y-1/4 w-4 h-4" type="radio" value="<?php echo $row["candidate_id"]; ?>" name="src-pusug-president">
                                </p>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
               <h1 class="rounded-xl mt-10 mb-3 text-center font-bold bg-blue-50 text-gray-900 py-1 text-xl uppercase">SRC Women's Commissioner</h1>
                <!--Candidates Container inner-->
                <div class="w-full bg-white rounded-2xl shadow-inner py-3 px-1 flex justify-start items-center">
                    <?php
                        $sql = "SELECT * FROM `candidates` WHERE `position` = 'src women\'s commissioner'";
                        $result = $conn->query($sql);
                        
                        if($result != false && $result->num_rows > 0){
                            while($row = $result->fetch_assoc()){
                    ?>
                       <!--Candidate-->
                        <div class="h-72 w-60 bg-blue-200 rounded-2xl mx-2 shadow-md pt-2 px-2">
                            <img class="mx-auto h-2/5 rounded-full shadow-md" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row["image"]); ?>" alt="">
                            <div class="h-3/6 bg-white w-full mt-4 rounded-xl shadow-md p-2">
                                <p><span class="font-bold">Name: </span> <span class="font-semibold"><?php echo $row["first_name"]." ".$row["last_name"]; ?></span></p>
                                <p><span class="font-bold">Level: </span> <span class="font-semibold"><?php echo $row["level"]; ?></span></p>
                                <p><span class="font-bold">Position: </span> <span class="font-semibold"><?php echo $row["position"]; ?></span></p>
                                <p>
                                    <span class="font-bold">Select: </span>
                                    <input class="ml-3 transform translate-y-1/4 w-4 h-4" type="radio" value="<?php echo $row["candidate_id"]; ?>" name="src-women-commissioner">
                                </p>
                            </div>
                        </div>
                    <?php }} ?>
                </div>
       </div>
       <div class="flex justify-center items-center my-10">
       <input class="bg-blue-500 w-40 text-blue-50 py-1 pb-2 text-lg shadow-sm rounded-full capitalize font-semibold  mb-4 hover:bg-blue-700 cursor-pointer" name="vote-candidates" type="submit" value="vote">
       </div>
       </form>
    </div>
    <script src="../js/all.js"></script>
</body>
</html>