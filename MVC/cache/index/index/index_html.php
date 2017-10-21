<!doctype html>
<html>
<head>
<meta charset="gb2312">
<title><?=$web['WEB_NAME']; ?></title>
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
      <li><a href="index.php?m=index&c=index&a=detail" target="_self" title="个人博客模板">发表博客</a></li>
     <!--  <li><a href="/book/" target="_blank" title="图书推荐">相册</a></li>
      <li><a href="/web/" target="_blank" title="网站建设">留言板</a></li> -->
      <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">说说</a></li>
      <li><a href="/jstt/" target="_blank" title="技术探讨">个人档</a></li>
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
      <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">说说</a></li>
      <li><a href="/jstt/" target="_blank" title="技术探讨">个人档</a></li>
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
   <!--    <li><a href="/book/" target="_blank" title="图书推荐">相册</a></li>
      <li><a href="/web/" target="_blank" title="网站建设">留言板</a></li> -->
      <!-- <li><a href="/newshtml5/" target="_blank" title="HTML5 / CSS3">说说</a></li>
      <li><a href="/jstt/" target="_blank" title="技术探讨">个人档</a></li> -->
      <li><a href="/news/s/" target="_blank" title="慢生活">收藏</a></li>
       <li><a href="#" title="碎言碎语"><?=$_SESSION['username']; ?></a></li>
      <li><a href="index.php?m=admin&c=index&a=index" target="_self" title="碎言碎语">后台管理</a></li>
      <li><a href="index.php?m=index&c=index&a=pass" target="_self" title="JS 实例代码演示">密码修改</a></li>
      <li><a href="index.php?m=index&c=user&a=exit" target="_self" title="JS 实例代码演示">退出</a></li>
    </ul>
    <script src="js/silder.js"></script><!--获取当前页导航 高亮显示标题--> 
  </nav>
  <?php endif;?>
</header>
<!--header end-->
<div id="mainbody">
  <div class="info">
    <figure> <img src="public/images/art.jpg"  alt="Panama Hat">
      <figcaption><strong>渡人如渡己，渡已，亦是渡</strong> 当我们被误解时，会花很多时间去辩白。 但没有用，没人愿意听，大家习惯按自己的所闻、理解做出判别，每个人其实都很固执。与其努力且痛苦的试图扭转别人的评判，不如默默承受，给大家多一点时间和空间去了解。而我们省下辩解的功夫，去实现自身更久远的人生价值。其实，渡人如渡己，渡已，亦是渡人。</figcaption>
    </figure>
    <div class="card">
      <h1>我的名片</h1>
      <p>网名：<?=$web['WEB_LOGO']; ?></p>
      <p>职业：<?=$web['WEB_ZHIYE']; ?></p>
      <p>电话：<?=$web['WEB_PHONE']; ?></p>
      <p>Email：<?=$web['WEB_EMAIL']; ?></p>
      <ul class="linkmore">
        <li><a href="/" class="talk" title="给我留言"></a></li>
        <li><a href="/" class="address" title="联系地址"></a></li>
        <!-- <li><a href="/" class="email" title="给我写信"></a></li> -->
        <li><a target="_blank" href="http://mail.qq.com/cgi-bin/qm_share?t=qm_mailme&email=MwIHCgIKBwMCCwpzQkIdUFxe" class="email"></a></li>
        <li><a href="/" class="photos" title="生活照片"></a></li>
        <li><a href="/" class="heart" title="关注我"></a></li>
      </ul>
    </div>
  </div>
  <!--info end-->
  <div class="blank"></div>
  <div class="blogs">
  
    <ul class="bloglist">
      <li>
       <?php if(!empty($select)):?>
        <?php foreach($select as $values): ?>
        <div class="arrow_box">
          <div class="ti"></div>
          <!--三角形-->
          <div class="ci"></div>
          <!--圆形-->
          <h2 class="title"><a href="index.php?m=index&c=index&a=read&id=<?=$values['id']; ?>" target="_self"><?=$values['title']; ?></a></h2>
          <ul class="textinfo">
            <a href="/"><img src="public/images/s1.jpg"></a>
            <p><?php  echo mb_substr( $values['content'], 0, 200, 'utf-8' ) ?></p>
          </ul>
          <ul class="details">
           <!-- 点赞 -->
            <?php if($values['zan'] == 0):?>
            <li class="likes"><a href="index.php?m=index&c=index&a=love&id=<?=$values['id']; ?>&state=1"><?=$values['smiley']; ?></a></li>
            <?php else:?>
            <li class="likes"><a href="index.php?m=index&c=index&a=love&id=<?=$values['id']; ?>&state=2"><?=$values['smiley']; ?></a></li>
            <?php endif;?>
            <!-- 评论 -->
            <li class="comments"><a href="#"><?=$values['replycount']; ?></a></li>
            <!-- 收藏次数 -->
               <?php if($values['coll'] == 0):?>
              <li class="comments"><a href="index.php?m=index&c=index&a=xiao&id=<?=$values['id']; ?>&stat=1"><?=$values['sollect']; ?></a></li>
              <?php else:?>
              <li class="comments"><a href="index.php?m=index&c=index&a=xiao&id=<?=$values['id']; ?>&stat=2"><?=$values['sollect']; ?></a></li>
              <?php endif;?>
            <li class="icon-time"><a href="#"><?php echo date('Y-m-d H:i:s', $values['addtime']);?></a></li>
          </ul>
         <?php endforeach;?>
    <?php endif;?>  
        </div>
        <!--arrow_box end--> 
      </li>
      <div class="page" style="height:20px;margin-bottom:10px;">
       &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;<a href="<?=$first; ?>">首页</a>
       &nbsp;<a href="<?=$prev; ?>">上一页</a>
       &nbsp;<a href="<?=$next; ?>">下一页</a>
       &nbsp;<a href="<?=$end; ?>">尾一页</a>
   <!--    &nbsp;<span style="color:green;"> 共几页</span> -->
      </div>
    </ul>
      
    <!--bloglist end-->
    <aside>
      <div class="search">
        <form class="searchform" method="get" action="#">
          <input type="text" name="s" value="搜索" onfocus="this.value=''" onblur="this.value='Search'">
        </form>
      </div>
      <div class="tuijian">
        <h2>推荐文章</h2>
        <ol>
          <li><span><strong>1</strong></span><a href="./view.html">有一种思念，是淡淡的幸福,一个心情一行文字</a></li>
          <li><span><strong>2</strong></span><a href="/">励志人生-要做一个潇洒的女人</a></li>
          <li><span><strong>3</strong></span><a href="/">女孩都有浪漫的小情怀――浪漫的求婚词</a></li>
          <li><span><strong>4</strong></span><a href="/">Green绿色小清新的夏天-个人博客模板</a></li>
          <li><span><strong>5</strong></span><a href="/">女生清新个人博客网站模板</a></li>
          <li><span><strong>6</strong></span><a href="/">Wedding-婚礼主题、情人节网站模板</a></li>
          <li><span><strong>7</strong></span><a href="/">Column 三栏布局 个人网站模板</a></li>
          <li><span><strong>8</strong></span><a href="/">时间煮雨-个人网站模板</a></li>
          <li><span><strong>9</strong></span><a href="/">花气袭人是酒香―个人网站模板</a></li>
        </ol>
      </div>
      <div class="toppic">
      <iframe allowtransparency="true" frameborder="0" width="140" height="278" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=2&z=3&t=0&v=1&d=3&bd=0&k=&f=&q=1&e=1&a=1&c=54511&w=140&h=278&align=center"></iframe>
      </div>
      <div class="viny">
        <dl>
          <dt class="art"><img src="public/images/artwork.png" alt="专辑"></dt>
          <dd class="icon-song"><span></span>南方姑娘</dd>
          <dd class="icon-artist"><span></span>歌手：赵雷</dd>
          <dd class="icon-album"><span></span>所属专辑：《赵小雷》</dd>
          <dd class="icon-like"><span></span><a href="/">喜欢</a></dd>
          <dd class="music">
            <audio src="public/images/7777.mp3"  controls></audio>
          </dd>
          <!--也可以添加loop属性 音频加载到末尾时，会重新播放-->
        </dl>
      </div>
    </aside>
  </div>
  <!--blogs end--> 
</div>
<a class="bshareDiv" href="http://www.bshare.cn/share">分享按钮</a><script type="text/javascript" charset="utf-8" src="http://static.bshare.cn/b/buttonLite.js#uuid=&amp;style=3&amp;fs=4&amp;textcolor=#fff&amp;bgcolor=#F90&amp;text=分享到"></script>
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
      <h2>最新评论</h2>
      <?php if(!empty($new)):?>
      <?php foreach($new as $valuess): ?>
      <dl>
        <dt><img src="public/images/s8.jpg">
        <dt>
        <dd><?=$valuess['authorid']; ?>
          <time><?php echo date('Y-m-d H:i:s', $valuess['addtime']);?></time>
        </dd>
        <dd>在 <a href="http://www.yangqq.com/jstt/bj/2013-07-28/530.html" class="title">如果要学习web前端开发，需要学习什么？ </a>中评论：</dd>
        <dd><?=$valuess['content']; ?></dd>
      </dl>
      <dl>
      <?php endforeach;?>
      <?php endif;?>
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
  <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=849484478&site=qq&menu=yes"><img border="0" src="http://wpa.qq.com/pa?p=2:849484478:53" style="width:80px;height:90px;margin-left: 249px;margin-top: -80px;" alt="点击这里给我发消息" title="点击这里给我发消息"/></a>
  <div class="footer-bottom">
    <p>Copyright 2017 Design by <a href="http://www.1491940189@qq.com">DanceSmile</a></p>
  </div>
</footer>
<!-- jQuery仿腾讯回顶部和建议 代码开始 -->
<div id="tbox"> <a id="togbook" href="/e/tool/gbook/?bid=1"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
<!-- 代码结束 -->
</body>
</html>