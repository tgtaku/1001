<?php
if(isset($_POST['encode'])){
//print_r(mb_substr($_POST['encode'], 28));
}
$encode = mb_substr($_POST['encode'], 28);
//$encode = base64_encode(file_get_contents('lowcarbon05.pdf'));
print_r($encode);
file_put_contents('test.pdf', base64_decode($encode)); 
echo "test";
?>