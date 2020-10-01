<?php
session_start();
$user_name = $_SESSION['user_id'];
print_r($user_name);
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
                    <li><a href="p_entry.php">-現場登録</a></li>
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
                </div>
            </div>
        </div>
</main>

    

    </body>
</html>