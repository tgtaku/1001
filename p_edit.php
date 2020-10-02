<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>現場編集</title>
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
    

    <h2>編集する現場を選択してください</h2>
    <p>
        <form action="p_edit.php" method = "post">
        会社名<input type = "text" name = "id" value = ""><br />
        ユーザー名<input type ="text" name="user_name" value = ""><br />
        概要<input type ="text" name="overview" value = ""><br />
        <input type = "submit" id = "search_com" name="search_com" value = "検索">
        </form>
    </p>
    <form id="pro_form">
    <table id = "com_info" name = "table_com">
                <tr>
                    <th style="WIDTH: 200px" id="project">現場名</th>
                    <th style="WIDTH: 200px" id="address">所在地</th>
                    <th style="WIDTH: 200px" id="overview">概要</th>
                    <th style="WIDTH: 100px" id="editButton"></th>
                </tr>
            </table>
            <input type = "button" id = "pro_button" name="editpro" value = "現場編集" onclick="editpro()">
    </form>
    </div>
            </div>
        </div>
</main>
    </body>
</html>