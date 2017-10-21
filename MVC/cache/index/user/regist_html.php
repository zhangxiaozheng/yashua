<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>注册页面</title>  
    <link rel="stylesheet" type="text/css" href="public/css/regist.css"/>  
</head>  
<body>  
    <div id="login">  
        <h1>欢迎注册</h1>  
        <form  action="index.php?m=index&c=user&a=regist" method="POST">  
            <input type="text" required="required" placeholder="用户名" name="username"></input>  
            <input type="password" required="required" placeholder="密码" name="password"></input> 
			<input type="password" required="required" placeholder="确认密码" name="rpassword"></input> 
            <input type="text" required="required" placeholder="手机号" name="phone"></input> 
            <input type="text" required="required" placeholder="验证码" name="yzm"></input>
			<img src="index.php?m=index&c=user&a=verify" onclick="this.src='index.php?m=index&c=user&a=verify&r='+Math.random();" /><a class="co">看不清请点击图片</a>  
			<input type="submit" name="login" value="立即注册" class="but">
        </form>  
    </div>  
</body>  
</html>  