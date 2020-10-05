<?php
if(isset($_POST['p_project'])){
    print_r($_POST['p_project']);
    //require "conn.php";
    $project = $_POST["project"];
    //$address = $_POST["address"];
    //$overview = $_POST["overview"];
    //json形式に変更
    //$json_array_project = json_encode($project);
    //$json_array_address = json_encode($address);
    //$json_array_overview = json_encode($overview);
}
print_r($project);


//$json_array_project = "1";
//$json_array_address = "1";
//$json_array_overview = "1";
    //$json_array_address = json_encode($address);
    //$json_array_overview = json_encode($overview);
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>現場情報編集</title>
        <link rel="stylesheet" href = "style.css">
    </head>
    <body>
    <main>
        <div class="main-container">
            <div class="sidebar">
                <h1>menu</h1>
                <ul class="subnav">
                    <!--<li><a href="#" class="current">管理者ページ</a></li>-->
                    <li>現場情報管理</li>
                    <li><a href="p_entry.php" >-現場登録</a></li>
                    <li><a href="p_edit.php" style="background-color:gray">-現場編集</a></li>
                    <li>施工会社管理</li>
                    <li><a href="c_entry.php">-施工会社登録</a></li>
                    <li><a href="c_edit.php">-施工会社/ユーザ編集</a></li>
                    <li>施工状況確認</li>
                    <li><a href="report.php">-報告書確認</a></li>
                </ul>
            </div>
            <div class="maincol">
                <div class="maincol-container">
    

    <h2>現場情報</h2>
    <p>
       
    </p>
    <form id="pro_form">
    <table id = "pro_info" name = "table_com">
                <tr>
                    <th style="WIDTH: 200px" id="project">現場名</th>
                    <th style="WIDTH: 200px" id="address">所在地</th>
                    <th style="WIDTH: 200px" id="overview">概要</th>
                    <th style="WIDTH: 100px" id="editButton"></th>
                </tr>
            </table>
            <!--<input type = "button" id = "pro_button" name="editpro" value = "現場編集" onclick="editpro()">-->
    </form>
    </div>
            </div>
        </div>
</main>

    </body>
</html>