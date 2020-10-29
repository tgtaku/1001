<?php
//プロジェクトIDの取得
session_start();
$project_id = $_SESSION['count'];
$project_id_now = json_encode($project_id);

//POST情報の取得
$array_cnt = preg_split("/[\s,]+/", $_POST['cnt']); 
$array_company = preg_split("/[\s,]+/", $_POST['company']); 
$array_user = preg_split("/[\s,]+/", $_POST['user']); 
//print_r($array_cnt);
//print_r($array_company);
//print_r($array_user);
$array_company_id = [];
$array_user_id = [];
$db_user = [];

//会社IDを取得
for($i = 0; $i < count($array_company); $i++){
    require "conn.php";
    $mysql_qry = "select * from companies_information_1 where companies_name = '$array_company[$i]';";
    $result = mysqli_query($conn, $mysql_qry);
    if(mysqli_num_rows($result) > 0){
        $j = 0;
        while($row = mysqli_fetch_assoc($result)){
            array_push($array_company_id, $row['companies_id']);
            $j++;
        }
    }
}

//ユーザIDを取得
for($i = 0; $i < count($array_user); $i++){
    require "conn.php";
    $mysql_qry = "select * from users_information_1 where users_name = '$array_user[$i]';";
    $result = mysqli_query($conn, $mysql_qry);
    if(mysqli_num_rows($result) > 0){
        $j = 0;
        while($row = mysqli_fetch_assoc($result)){
            array_push($array_user_id, $row['users_id']);
            $j++;
        }
    }
}
//print_r($array_user_id);

//既存ユーザーの取得
require "conn.php";
    $mysql_qry = "select * from assign_company_information_1 where projects_id = '$project_id';";
    $result = mysqli_query($conn, $mysql_qry);
    if(mysqli_num_rows($result) > 0){
        $j = 0;
        while($row = mysqli_fetch_assoc($result)){
            array_push($db_user, $row['users_id']);
            $j++;
        }
    }
    //print_r($db_user);

//dbにないユーザーを登録
for($i = 0; $i < count($array_user_id); $i++){
    if(in_array($array_user_id[$i], $db_user)){

    }else{
        
        //会社IDの取得
        require "conn.php";
        $mysql_qry = "select * from users_information_1 where users_id = '$array_user_id[$i]';";
        $result = mysqli_query($conn, $mysql_qry);
        if(mysqli_num_rows($result) > 0){
            $j = 0;
            while($row = mysqli_fetch_assoc($result)){
                $insert_com = $row['companies_id'];
                $j++;
            }
        }
        require "conn.php";
        $sql = "INSERT INTO assign_company_information_1 VALUES ('', '$project_id', '$insert_com', '$array_user_id[$i]','');";
        $result  = mysqli_query($conn, $sql);
        //print_r($insert_com);
}
}

//POSt情報に既存ユーザーがない場合、削除
for($i = 0; $i < count($db_user); $i++){
    if(in_array($db_user[$i], $array_user_id)){

    }else{
        require "conn.php";
        $sql = "delete from assign_company_information_1 where users_id = '$db_user[$i]';";
        $result  = mysqli_query($conn, $sql);
        //print_r("delete");
    }
}
?>