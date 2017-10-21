<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>落花忆无情</title>
<meta name="keywords" content="黑色模板,个人网站模板,个人博客模板,博客模板,css3,html5,网站模板" />
<meta name="description" content="这是一个有关黑色时间轴的css3 html5 网站模板" />
<link href="public/css/styles.css" rel="stylesheet">
 
<link rel="stylesheet" href="public/editor.md/examples/css/style.css" />
<link rel="stylesheet" href="public/editor.md/css/editormd.css" />
<!-- 返回顶部调用 begin -->
<link href="public/css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="public/js/jquery.js"></script>
<script type="text/javascript" src="public/js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<style>
body{
 background:url(public/images/789.jpg) repeat;
}
</style>
</head>
<body>
<header>
<?php if(empty($_SESSION['username'])):?>
  <nav id="nav">
    <ul>
      <li><a href="index.php?m=index&c=index&a=index" >首页</a></li>
      <li><a href="index.php?m=index&c=index&a=detail" target="_self" title="个人博客模板">发表博客</a></li>
     <!--  <li><a href="/book/" target="_blank" title="图书推荐">相册</a></li>
      <li><a href="/web/" target="_blank" title="网站建设">留言板</a></li> -->
      <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">说说</a></li>
      <li><a href="/jstt/" target="_blank" title="技术探讨">个人档</a></li>
      <!-- <li><a href="/news/s/" target="_blank" title="慢生活">音乐</a></li> -->
      <li><a href="index.php?m=index&c=user&a=login" target="_self" title="碎言碎语">登陆</a></li>
      <li><a href="index.php?m=index&c=user&a=regist" target="_self" title="JS 实例代码演示">注册</a></li>
    </ul>
    <script src="js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
<?php elseif($_SESSION['undertype'] == 0):?>
  <nav id="nav">
    <ul>
      <li><a href="index.php?m=index&c=index&a=index" >首页</a></li>
      <li><a href="index.php?m=index&c=index&a=detail" target="_self" title="个人博客模板">发表博客</a></li>
     <!--  <li><a href="/book/" target="_blank" title="图书推荐">相册</a></li>
      <li><a href="/web/" target="_blank" title="网站建设">留言板</a></li> -->
      <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">说说</a></li>
      <li><a href="/jstt/" target="_blank" title="技术探讨">个人档</a></li>
      <!-- <li><a href="/news/s/" target="_blank" title="慢生活">音乐</a></li> -->
      <li><a href="#" title="碎言碎语"><?=$_SESSION['username']; ?></a></li>
      <li><a href="index.php?m=index&c=user&a=regist" target="_self" title="JS 实例代码演示">密码修改</a></li>
      <li><a href="index.php?m=index&c=user&a=exit" target="_self" title="JS 实例代码演示">退出</a></li>
    </ul>
    <script src="js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
<?php else:?>
  <nav id="nav">
    <ul>
      <li><a href="index.php?m=index&c=index&a=index" >首页</a></li>
      <li><a href="index.php?m=index&c=index&a=detail" target="_self" title="个人博客模板">发表博客</a></li>
    <!--   <li><a href="/book/" target="_blank" title="图书推荐">相册</a></li>
      <li><a href="/web/" target="_blank" title="网站建设">留言板</a></li> -->
      <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">说说</a></li>
      <li><a href="/jstt/" target="_blank" title="技术探讨">个人档</a></li>
      <!-- <li><a href="/news/s/" target="_blank" title="慢生活">音乐</a></li> -->
       <li><a href="#" title="碎言碎语"><?=$_SESSION['username']; ?></a></li>
      <li><a href="index.php?m=index&c=user&a=login" target="_self" title="碎言碎语">后台管理</a></li>
      <li><a href="index.php?m=index&c=user&a=regist" target="_self" title="JS 实例代码演示">密码修改</a></li>
      <li><a href="index.php?m=index&c=user&a=exit" target="_self" title="JS 实例代码演示">退出</a></li>
    </ul>
    <script src="js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
  <?php endif;?>
</header>
<!--header end-->
    <form action="index.php?m=index&c=Post&a=list" method="post">
       <div class="text">
         <input type="text" size="40" name="title" placeholder="请输入标题" style="height:35px" class="one"/>
      </div>
      <div id="test-editormd">
         <textarea style="display:none;" name="content"></textarea> 
      </div>
      <input type="submit" name="tijiao" value="发表" style="height:30px;width:50px;background-color:green;">
    </form>
     
<!-- 代码结束 -->
</body>
</html>
<script src="public/editor.md/examples/js/jquery.min.js"></script>
        <script src="public/editor.md/editormd.min.js"></script>
        <script type="text/javascript">
      var testEditor;

            $(function() {
                testEditor = editormd("test-editormd", {
                    width   : "60%",
                    height  : 600,
                    syncScrolling : "single",
                    path    : "public/editor.md/lib/"
                });
                
                /*
                // or
                testEditor = editormd({
                    id      : "test-editormd",
                    width   : "90%",
                    height  : 640,
                    path    : "../lib/"
                });
                */
            });
        </script>
