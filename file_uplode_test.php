<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>現場登録画面</title>
    </head>
    <body>
    <main>
    <h2>図面情報を登録してください。</h2>
            
            <form id="my_form">
                <label for="image_file">ファイル選択</label><br>
                <!--<input type="file" name="image_file[]" id="image_file" multiple="multiple" onchange=checkFile()><br>-->
                <input type="file" name="image_file[]" id="image_file" multiple="multiple" onchange=checkFile()><br>

                
            </form>
            <input type="button" name ="add" value = "追加" onclick=add()>
            <input type="button" name ="next" value = "アップロード" onclick=File()>

    </main>
    <script>
        //データ送信用配列
        var file_info = [];
        var formdata = new FormData();

        var n = 1;
        var m = n;
        function checkFile(){
            
            //var file = document.getElementById( 'image_file' ).files[0];
            var num = document.getElementById( 'image_file' ).files.length;
            //var file = document.getElementById( 'my_form' )['image_file'].value;
            //console.log(file);
            console.log(document.getElementById( 'image_file' ).files[0]);
            console.log(num);
            for(var i = 0; i < num; i++){
                file_info.push(document.getElementById( 'image_file' ).files[i]);
                formdata.append("postedfiles", document.getElementById( 'image_file' ).files[0]);
            }
            console.log(document.getElementById( 'image_file' ).files[0].value);
            console.log(document.getElementById( 'image_file' ).value);
            console.log(file_info);
            console.log(file_info.length);
            console.log(document.getElementById('my_form').children);
            
            
        }

        function check(){
            console.log("check");
            if(document.getElementById( 'inputform_' + m ) == null){
                console.log("test");
            }
            
            console.log(document.getElementById( 'inputform_' + m ));
        }

        function File(){
            console.log(document.getElementById("my_form"));
            // フォームデータを取得
            var formdata = new FormData(document.getElementById("my_form"));
            // XMLHttpRequestによるアップロード処理
            var xhttpreq = new XMLHttpRequest();
            //formdata.append('image_file', file_info);
            xhttpreq.onreadystatechange = function() {
                if (xhttpreq.readyState == 4 && xhttpreq.status == 200) {
                    alert(xhttpreq.responseText);
                }
            };
            xhttpreq.open("POST", "file_uplode_test_post.php", true);
            xhttpreq.send(formdata);
        }

        function add(){
            var input_data = document.createElement('input');
            input_data.type = 'file';
            input_data.id = 'inputform_' + n;
            //input_data.id = 'inputform_';
            input_data.name="image_file[]";
            input_data.multiple="multiple";
            input_data.onchange=check();
            m = n;

            var parent = document.getElementById('my_form');
            parent.appendChild(input_data);
            n++ ;

            console.log(document.getElementById( 'my_form' ));
            
            

        }
    </script>

    </body>
</html>