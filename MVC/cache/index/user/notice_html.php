<!DOCTYPE html>
<html>
<head>
	<title>提示信息</title>
	<meta charset="utf-8">
	<meta http-equiv="refresh" content="<?=$second; ?>
	;url=<?=$url; ?>">
	<style type="text/css">
		div {
			line-height: 650px;
			background:url(public/images/b.jpg)no-repeat;
			border: 10px;
			margin: 0 auto; 
			font-size: 50px;
			color: blue;
			text-shadow:0 0 10px;   
			letter-spacing: 1px;   
			text-align: center;   
		}
		img {
			float: right;
    		margin-top: -460px;
    		margin-right: 390px;
		}
	</style>
</head>
<body>
	<div>
		<div><?=$msg; ?></div>
	    <span><img src="public/images/bg2.png" /></span>
	</div>
</body>
</html>