<?php
if($_POST){
    
//配列の要素の確認
$num = $_POST["image_file"][0];
print_r($num);
}
if($_FILES){
print_r($_FILES);
}
/*
for($i=0; $i<$num; $i++){
    // 一時アップロード先ファイルパス
$file_tmp  = $_POST["image_file"]["tmp_name"][$i];

// 正式保存先ファイルパス
$file_save = "./up/" . $_POST["image_file"]["name"][$i];

// ファイル移動s
$result = @move_uploaded_file($file_tmp, $file_save);
if ( $result === true ) {
    echo "UPLOAD OK";
} else {
    echo "UPLOAD NG";
}

}
}*/

   
?>