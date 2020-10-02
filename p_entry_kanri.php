<?php
//session_start();
//$user_name = $_SESSION['user_id'];
$user_name = "setupuser";
//print_r($user_name);
$json_user = json_encode($user_name);

//管理者の取得
//mysqlとの接続
$link = mysqli_connect('localhost', 'root', 'passward');
if (!$link) {
    die('Failed connecting'.mysqli_error($link));
}
//print('<p>Successed connecting</p>');

//DBの選択
$db_selected = mysqli_select_db($link , 'sys');
if (!$db_selected){
    die('Failed Selecting table'.mysqli_error($db_selected));
}

//文字列をutf8に設定
mysqli_set_charset($link , 'utf8');

//pdfテーブルの取得
$result_file  = mysqli_query($link ,"SELECT * FROM users_information_1;");
if (!$result_file) {
    die('Failed query'.mysqli_error($result_file));
}
//データ格納用配列の取得
$row_array_user = array();
$i = 0;
while ($row = mysqli_fetch_assoc ($result_file)) {
    $row_array_user[$i] = $row['users_name'];
    $i++;
    
}
$json_user_array = json_encode($row_array_user);
print_r($json_user_array);
// MySQLに対する処理
$close_flag = mysqli_close($link);

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>管理者登録画面</title>
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
                    <li><a href="p_entry.php" style="background-color:aqua">-現場登録</a></li>
                    <li><a href="p_edit.php">-現場編集</a></li>
                    <li>施工会社管理</li>
                    <li><a href="c_entry.php">-施工会社登録</a></li>
                    <li><a href="c_edit.php">-施工会社/ユーザ編集</a></li>
                    <li>施工状況確認</li>
                    <li><a href="report.php">-報告書確認</a></li>
                </ul>
            </div>
            <div class="maincol">
                <div class="maincol-container">
                    <!--<h1>現場管理アプリ</h1>-->
    <h2>管理者情報を入力してください。</h2>
    <form id="kanri_form">
    <table id = "user_kanri" name = "table_kanri">
                <tr>
                    <th style="WIDTH: 50px" id="user_company">No</th>
                    <th style="WIDTH: 300px" id="user_name">管理者名</th>
                </tr>
            </table>
            <input type = "button" id = "add_row" name="addKanri" value = "追加" onclick="addkanri()">
            <input type = "button" id = "kanri_button" name="gotKanri" value = "登録" onclick="gotkanri()">
    </form>
    <script type="text/javascript">
        //var names =[];
        var kanri ="";
        var tableLength ="";
        var cell1 = [];
        var cell2 = [];
            
            //テーブルの作成
            var table = document.getElementById("user_kanri");
            //管理者一覧
            var all_kanri = <?php echo$json_user_array; ?>;
            //会社名
                var row = table.insertRow(-1);
                cell1.push(row.insertCell(-1));
                cell2.push(row.insertCell(-1));
                cell1[0].innerHTML = "1";
                cell2[0].innerHTML = <?php echo $json_user; ?>;
                //リスト
                var row = table.insertRow(-1);
                cell1.push(row.insertCell(-1));
                cell2.push(row.insertCell(-1));
                cell1[1].innerHTML = "2";
                cell2[1].innerHTML = '<select name = "kan" name = "k" id = "kanri"/>';   
                var sel = table.rows[2].cells[1].children[0];
                var ele = document.createElement('option');
                ele.text = "";
                sel.append(ele);
                for(var a = 0; a<all_kanri.length; a++){
                    var ele2 = document.createElement('option');
                    ele2.text = all_kanri[a];
                    sel.append(ele2);
                }

                
    </script>
    
                </div>
            </div>
        </div>
</main>

<script>
       function addkanri(){
        var table = document.getElementById("user_kanri");
            //ar row = table.insertRow(-1);
            var row = table.insertRow(-1);
            cell1.push(row.insertCell(-1));
            cell2.push(row.insertCell(-1));
            var len = table.rows.length;
            
            cell1[len-2].innerHTML = len -1;
            cell2[len-2].innerHTML = '<select name = "kan" name = "k" id = "kanri"/>';
            var sel = table.rows[len-1].cells[1].children[0];
                var ele = document.createElement('option');
                ele.text = "";
                sel.append(ele);
                for(var a = 0; a<all_kanri.length; a++){
                    var ele2 = document.createElement('option');
                    ele2.text = all_kanri[a];
                    sel.append(ele2);
                }
        }

        function gotkanri(){
            var k = [];

            for(var g = 1; g < table.rows.length; g++){
                if(g == 1){
                    k.push(table.rows[g].cells[1].innerHTML);
                }else{
                    var index = table.rows[g].cells[1].children[0].selectedIndex;
                    if(index == 0){

                    }else{
                        var selected_kanri = <?php echo$json_user_array; ?>[index -1];
                        console.log(selected_kanri);
                        console.log(k.indexOf(selected_kanri));
                        if(k.indexOf(selected_kanri)==0){

                        }else{
                            k.push(selected_kanri);
                        }
                    }
                }
            //console.log(table.rows[2].cells[1].children[0].selectedIndex);
        }console.log(k);
        //httpPOST
        var le = k.length;
            for(var p = 0; p < le; p++){
                fd = new FormData();
                fd.append('kanri', k[p]);
                xhttpreq = new XMLHttpRequest();
                xhttpreq.onreadystatechange = function() {
                if (xhttpreq.readyState == 4 && xhttpreq.status == 200) {
                alert(xhttpreq.responseText);
                }
                };
                xhttpreq.open("POST", "insert_kanri.php", true);
                xhttpreq.send(fd);
                }
        }
       </script>

    </body>
    
</html>