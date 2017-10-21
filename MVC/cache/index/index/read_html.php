<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>view-黑色时间轴个人博客模板</title>
<meta name="keywords" content="黑色模板,个人网站模板,个人博客模板,博客模板,css3,html5,网站模板" />
<meta name="description" content="这是一个有关黑色时间轴的css3 html5 网站模板" />
<link href="public/css/styles.css" rel="stylesheet">
<link href="public/css/index1.css" rel="stylesheet">
<!-- 返回顶部调用 begin -->
<link href="public/css/lrtk.css" rel="stylesheet" />
<script type="text/javascript" src="public/js/jquery.js"></script>
<script type="text/javascript" src="public/js/js.js"></script>
<!-- 返回顶部调用 end-->
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
</head>
<body>
<header>
<?php if(empty($_SESSION['username'])):?>
  <nav id="nav">
    <ul>
      <li><a href="index.php?m=index&c=index&a=index" >首页</a></li>
      <li><a href="index.php?m=index&c=index&a=detail" target="_blank" title="个人博客模板">发表博客</a></li>
     <!--  <li><a href="/book/" target="_blank" title="图书推荐">相册</a></li>
      <li><a href="/web/" target="_blank" title="网站建设">留言板</a></li> -->
      <!-- <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">说说</a></li>
      <li><a href="/jstt/" target="_blank" title="技术探讨">个人档</a></li> -->
      <li><a href="/news/s/" target="_blank" title="慢生活">收藏</a></li>
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
      <!-- <li><a href="/book/" target="_blank" title="图书推荐">相册</a></li>
      <li><a href="/web/" target="_blank" title="网站建设">留言板</a></li> -->
    <!--   <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">说说</a></li>
      <li><a href="/jstt/" target="_blank" title="技术探讨">个人档</a></li> -->
      <li><a href="/news/s/" target="_blank" title="慢生活">收藏</a></li>
      <li><a href="#" title="碎言碎语"><?=$_SESSION['username']; ?></a></li>
      <li><a href="index.php?m=index&c=index&a=pass" target="_self" title="JS 实例代码演示">密码修改</a></li>
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
     <!--  <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">说说</a></li>
      <li><a href="/jstt/" target="_blank" title="技术探讨">个人档</a></li> -->
      <li><a href="/news/s/" target="_blank" title="慢生活">收藏</a></li>
       <li><a href="#" title="碎言碎语"><?=$_SESSION['username']; ?></a></li>
      <li><a href="index.php?m=admin&c=index&a=login" target="_self" title="碎言碎语">后台管理</a></li>
      <li><a href="index.php?m=index&c=index&a=pass" target="_self" title="JS 实例代码演示">密码修改</a></li>
      <li><a href="index.php?m=index&c=user&a=exit" target="_self" title="JS 实例代码演示">退出</a></li>
    </ul>
    <script src="js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
  <?php endif;?>
</header>
<!--header end-->
<div id="mainbody">
  <div class="blogs">
    <div id="index_view">
      <h2 class="t_nav"><a href="/">网站首页</a><a href="/">慢生活</a></h2>
      <h1 class="c_titile" style="color:pink">现在，我相信爱情！</h1>
      <p class="box" style="color:red;">发布时间：2013-07-25<span>编辑：DanceSmile</span>阅读（30）</p>
      <ul>
        <p style="color:green;"> <?php  echo mb_substr( $read[0]['content'], 0, 200, 'utf-8' ) ?></p>
        <p><img src="public/images/post1.jpg"></p>
        <p style="color:green;"> <?php  echo mb_substr( $read[0]['content'], 200, 400, 'utf-8' ) ?> </p>
      </ul>
      <div class="share"> 
        <!-- Baidu Button BEGIN -->
        <div id="bdshare" class="bdshare_t bds_tools get-codes-bdshare"> <span class="bds_more">分享到：</span> <a class="bds_qzone"></a> <a class="bds_tsina"></a> <a class="bds_tqq"></a> <a class="bds_renren"></a> <a class="bds_t163"></a> <a class="shareCount"></a> </div>
        <script type="text/javascript" id="bdshare_js" data="type=tools&amp;uid=6574585" ></script> 
        <script type="text/javascript" id="bdshell_js"></script> 
        <script type="text/javascript">
document.getElementById("bdshell_js").src = "http://bdimg.share.baidu.com/static/js/shell_v2.js?cdnversion=" + Math.ceil(new Date()/3600000)
</script> 
        <!-- Baidu Button END --> 
      </div>
    </div>
    <!--bloglist end-->
    <aside>
    </aside>
  </div>
  <!--blogs end--> 
</div>
<!--mainbody end-->
<footer>
  <div class="footer-mid">
    <div class="links">
      <h2>友情链接</h2>
      <ul>
        <li><a href="/">张峥个人博客</a></li>
        <li><a href="http://www.3dst.com">3DST技术服务中心</a></li>
      </ul>
    </div>
    <div class="visitors">
      <h2>评论</h2>
      <?php if(!empty($neirong)):?>
      <?php foreach($neirong as $value): ?>
      <dl>
        <dt><img src="public/images/s8.jpg">
        <dt>
        <dd><?=$value['authorid']; ?>
          <time>49分钟前</time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-07-28/530.html#comments" class="title">如果要学习web前端开发，需要学习什么？ </a>中评论：</dd>
        <dd><?=$value['content']; ?></dd>
      </dl>
      <?php endforeach;?>
      <?php endif;?>
        <div class="dd">
        <form action="index.php?m=index&c=Send&a=huifu" method="post">
            <input type="hidden" name="id" value="<?=$id; ?>" />
            <textarea class="pp" name="txt" cols="60" rows="5" style="background-color:yellow; margin-top:5px;"></textarea>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="submit" value="回复" class="abc" size="40" />
        </form>
        </div>
        <div class="lol" style="margin-top:5px;">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="#">首页</a>
              &nbsp;<a href="#">上一页</a>
             &nbsp;<a href="#">下一页</a>
              &nbsp;<a href="#">尾页</a>
        </div>
    </div>
    <section class="flickr">
      <h2>摄影作品</h2>
      <ul>
        <li><a href="/"><img src="public/images/01.jpg"></a></li>
        <li><a href="/"><img src="public/images/02.jpg"></a></li>
        <li><a href="/"><img src="public/images/03.jpg"></a></li>
        <li><a href="/"><img src="public/images/04.jpg"></a></li>
        <li><a href="/"><img src="public/images/05.jpg"></a></li>
        <li><a href="/"><img src="public/images/06.jpg"></a></li>
        <li><a href="/"><img src="public/images/07.jpg"></a></li>
        <li><a href="/"><img src="public/images/08.jpg"></a></li>
        <li><a href="/"><img src="public/images/09.jpg"></a></li>
      </ul>
    </section>
  </div>
  <div class="footer-bottom">
    <p>Copyright 2017 Design by <a href="http://www.yangqq.com">DanceSmile</a></p>
  </div>
</footer>
<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> <a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<!-- 代码结束 -->
</body>
</html>