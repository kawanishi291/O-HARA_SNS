<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="sns.css">
        <title>履歴</title>
//head に記載
<script type="text/javascript" src="./prototype.js"></script>
<script type="text/javascript">
var myajax;
function execute() {
	myajax = new Ajax.PeriodicalUpdater(
		"container",
		"aj_index.php",
		{
			"method": "get",
//			"parameters": "p=hoge",
			frequency: 5, // 5秒ごとに実行
			onSuccess: function(request) {
				// 成功時の処理を記述
				// alert('成功しました');
				// jsonの値を処理する場合↓↓
				//  var json;
				//  eval("json="+request.responseText);
				
				// ↓IEでもキャッシュを読み込まずに毎回リモート接続を実行するためのコード(パラメータの書き換え)
				var str = myajax.options.parameters;
				var hash = str.parseQuery();
				hash["ajax_request_id"] = Math.random();
				hash = $H(hash);
				myajax.options.parameters = hash.toQueryString();
			},
			onComplete: function(request) {
				// 完了時の処理を記述
				// alert('読み込みが完了しました');
				// jsonの値を処理する場合↓↓
				//  var json;
				//  eval("json="+request.responseText);
			},
			onFailure: function(request) {
				alert('読み込みに失敗しました');
			},
			onException: function (request) {
				alert('読み込み中にエラーが発生しました');
			}
		}
	);
}
function stop() {
	if (myajax != null && myajax != undefined) {
		myajax.stop();
	}
}
</script>
<body>
//body に記載
<div id="container"></div>
</body>
</head>