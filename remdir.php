<?php
if(isset($_POST['dir'])){
    //print_r($_POST['dir']);
    $moji = substr($_POST['dir'], 0, strlen($_POST['dir']) - 4);
    $d = '.\up\d';
    $di = substr($d, 0, strlen($d) - 1);
    $dir = $di.$moji;
    if(file_exists($dir)){
        $dir_num = $dir."/*";
    //print_r($dir_num);
    $glob = glob($dir_num);
    foreach ($glob as $f) {
		// is_file() を使ってファイルかどうかを判定
		if (is_file($f)) {
			// ファイルならそのまま出力
			unlink($f);
		} else {
			// ディレクトリの場合（ファイルでない場合）は再度rmdirAll()を実行
			//rmdirAll($f);
		}
	}
	// 中身を削除した後、本体削除
	rmdir($dir);
}

}
?>