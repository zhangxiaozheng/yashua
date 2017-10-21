<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>后台管理中心</title>  
    <link rel="stylesheet" href="public/css/pintuer.css">
    <link rel="stylesheet" href="public/css/admin.css">
    <script src="public/js/jquery.js"></script>   
</head>
<body style="background-color:#f2f9fd;">
<div class="header bg-main">
  <div class="logo margin-big-left fadein-top">
    <h1><img src="public/images/y.jpg" class="radius-circle rotate-hover" height="50" alt="" />后台管理中心</h1>
  </div>
  <div class="head-l"><a class="button button-little bg-green" href="index.php?m=index&c=index&a=index" target="_self"><span class="icon-home"></span> 前台首页</a><!--  &nbsp;&nbsp;&nbsp;&nbsp;<a class="button button-little bg-red" href="index.php?m=index&c=index&a=index"><span class="icon-power-off"></span> 退出登录</a> --> </div>
</div>
<div class="leftnav">
  <div class="leftnav-title"><strong><span class="icon-list"></span>菜单列表</strong></div>
  <h2><span class="icon-user"></span>基本设置</h2>
  <ul style="display:block">
    <li><a href="index.php?m=admin&c=index&a=info" target="right"><span class="icon-caret-right"></span>网站设置</a></li>
    <li><a href="index.php?m=admin&c=index&a=pass" target="right"><span class="icon-caret-right"></span>修改密码</a></li>
    <!-- <li><a href="index.php?m=admin&c=index&a=page" target="right"><span class="icon-caret-right"></span>单页管理</a></li>   -->
    <!-- <li><a href="index.php?m=admin&c=index&a=adv" target="right"><span class="icon-caret-right"></span>首页轮播</a></li>    -->
    <li><a href="index.php?m=admin&c=index&a=book" target="right"><span class="icon-caret-right"></span>用户管理</a></li>     
    
  </ul>   
  <h2><span class="icon-pencil-square-o"></span>博文管理</h2>
  <ul>
    <li><a href="index.php?m=admin&c=index&a=column" target="right"><span class="icon-caret-right"></span>博文管理</a></li>
    <li><a href="index.php?m=admin&c=index&a=list" target="right"><span class="icon-caret-right"></span>留言管理</a></li>
   <!--  <li><a href="index.php?m=admin&c=index&a=add" target="right"><span class="icon-caret-right"></span>添加内容</a></li> -->
    <!-- <li><a href="index.php?m=admin&c=index&a=cate" target="right"><span class="icon-caret-right"></span>分类管理</a></li>         -->
  </ul>  
</div>
<script type="text/javascript">
$(function(){
  $(".leftnav h2").click(function(){
	  $(this).next().slideToggle(200);	
	  $(this).toggleClass("on"); 
  })
  $(".leftnav ul li a").click(function(){
	    $("#a_leader_txt").text($(this).text());
  		$(".leftnav ul li a").removeClass("on");
		$(this).addClass("on");
  })
});
</script>
<ul class="bread">
  <li><a href="{:U('Index/info')}" target="right" class="icon-home"> 首页</a></li>
  <li><a href="##" id="a_leader_txt">网站信息</a></li>
  <li><b>当前语言：</b><span style="color:red;">中文</php></span>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;切换语言：<a href="##">中文</a> &nbsp;&nbsp;<a href="##">英文</a> </li>
</ul>
<div class="admin">
  <iframe scrolling="auto" rameborder="0" src="index.php?m=admin&c=index&a=info" name="right" width="100%" height="100%" ></iframe>
</div>
<div style="text-align:center;">
<p>来源:<a href="http://www.mycodes.net/" target="_blank">源码之家</a></p>
</div>
</body>
</html>