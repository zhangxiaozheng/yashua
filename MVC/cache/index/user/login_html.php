<!DOCTYPE html>  
<html lang="en">  
<head>  
    <meta charset="UTF-8">  
    <title>Login</title>  
    <link rel="stylesheet" type="text/css" href="public/css/login.css"/>  
</head>  
<body>  
    <div id="login">  
        <h1>我们相遇的地方</h1>  
        <form  action="index.php?c=user&a=login" method="post">  
            <input type="text" required="required" placeholder="用户名" name="username" /> 
            <input type="password" required="required" placeholder="密码" name="password" /> 
            <input type="submit" name="login" value="登录" class="but" />  
        </form>  
    </div>  
</body>  
</html>  