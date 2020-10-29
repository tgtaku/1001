<?php
if(isset($_POST['company_name'])){
//各要素を配列に変更
$array_company_name = preg_split("/[\s,]+/", $_POST['company_name']); 
$array_address = preg_split("/[\s,]+/", $_POST['address']); 
$array_TEL = preg_split("/[\s,]+/", $_POST['TEL']); 
//print_r($array_company_name);
//print_r($array_address);
//print_r($array_TEL);

for($i = 0; $i < count($array_company_name); $i++){
    require "conn.php";
    $sql = "INSERT INTO companies_information_1 VALUES ('', '$array_company_name[$i]', '$array_address[$i]', '$array_TEL[$i]','');";
    $result  = mysqli_query($conn, $sql);
}
}
?>