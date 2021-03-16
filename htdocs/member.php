<?php
  session_start();
?>

<!DOCTYP html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>友達検索</title>
    <link rel="stylesheet" type="text/css" href="./CSS/profile.css">
</head>
<body>
    <div id="wraper">
    <h1>友達検索</h1>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <form id="form_1" method="post" accept-charset="utf-8" return false>
        <select name="class" id="class">
            <?php
                for($i=0; $i<12; $i++){
            ?>
                <option value="<?= $i ?>"><?php echo $i; ?></option>
            <?php
                }
            ?>
        <option value="0 OR class IS NOT NULL">*</option>
        </select>
    </form>
    <button class="search">検索</button>
    <input type="button" onclick="location.href='./afterlogin.php'" value="TOPへ">
    <div class="result"></div>
    <script type="text/javascript">

        $(function(){
            // Ajax button click
            $('.search').on('click',function(){
                $.ajax({
                    url:'./select.php',
                    type:'POST',
                    data:{
                        'class':$('#class').val()
                    }
                })
                // Ajaxリクエストが成功した時発動
                .done( (data) => {
                    $('.result').html(data);
                    console.log(data);
                })
                // Ajaxリクエストが失敗した時発動
                .fail( (data) => {
                    $('.result').html(data);
                    console.log(data);
                })
                // Ajaxリクエストが成功・失敗どちらでも発動
                .always( (data) => {

                });
            });
        });
    </script>
</div>
</body>
</html>