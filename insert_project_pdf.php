<?php
if(isset($_POST["project_name"])){
    $project_name = $_POST["project_name"];
    $address = $_POST["address"];
    $overview = $_POST["overview"];
    $file = preg_split("/[\s,]+/", $_POST["file"]);
    $num = count($file);
    session_start();
    $project_id = $_SESSION['count'];
   
    require "conn.php";
    $sql = "INSERT INTO projects_information_1 VALUES ('', '$project_name', '$address', '$overview', '' );";
        $result  = mysqli_query($conn, $sql);
        if($result){
        echo "Data Inserted";
        }
        else{
        echo "Failed";
        }

    for($i = 0; $i < $num; $i++){
        $sql = "INSERT INTO pdf_information_1 VALUES ('', '$project_id', '$file[$i]', '' );";
        $result  = mysqli_query($conn, $sql);
        if($result){
        echo "Data Inserted";
        }
        else{
        echo "Failed";
        }
    }
    
}?>