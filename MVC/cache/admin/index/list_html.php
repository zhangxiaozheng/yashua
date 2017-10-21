<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="public/css/pintuer.css">
<link rel="stylesheet" href="public/css/admin.css">
<script src="public/js/jquery.js"></script>
<script src="public/js/pintuer.js"></script>
</head>
<body>
<form method="post" action="index.php?m=admin&c=index&a=list" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
       <!--  <th width="10%">排序</th> -->
        <th>作者</th>
        <th>内容</th>
      <!--   <th>属性</th>
        <th>分类名称</th> -->
        <th width="10%">留言时间</th>
        <th width="310">留言的文章id</th>
      </tr>
      <volist name="list" id="vo">
      <?php if(!empty($select)):?>
     <?php foreach($select as $values): ?>
        <tr>
          <td style="text-align:left; padding-left:20px;"><input type="checkbox" name="id[]" value=" <?=$values['tid']; ?>" />
           <?=$values['tid']; ?></td>
       <!--    <td>1 --><!-- <input type="text" name="sort[1]" value="1" style="width:50px; text-align:center; border:1px solid #ddd; padding:7px 0;" /> --><!-- </td> -->
          <td width="10%"> <?=$values['authorid']; ?><!-- <img src="images/11.jpg" alt="" width="70" height="50" /> --></td>
          <td><?=$values['content']; ?></td>
         <!--  <td><font color="#00CC99">首页</font></td>
          <td>产品分类</td> -->
          <td><?php echo date('Y-m-d H:i:s', $values['addtime']);?></td>
          <td><?=$values['pid']; ?><!-- <div class="button-group"> <a class="button border-main" href="add.html"><span class="icon-edit"></span> 修改</a> <a class="button border-red" href="javascript:void(0)" onclick="return del(1,1,1)"><span class="icon-trash-o"></span> 删除</a> </div> --></td>
        </tr>
    <?php endforeach;?>
        <?php endif;?>
      <tr>
        <td style="text-align:left; padding:19px 0;padding-left:20px;"><input type="checkbox" id="checkall"/>
          全选 </td>
         
        <td colspan="1" style="text-align:left;padding-left:20px;"><buttton type="submit" name="sanchu" value="删除"  href="javascript:void(0)" class="button border-red icon-trash-o" style="padding:5px 15px;" onclick="DelSelect()"> 删除</button></td> 
		 <td colspan="8"><div class="pagelist"> <a href="<?=$first; ?>">首页</a> &nbsp;&nbsp; <a href="<?=$prev; ?>">上一页</a>&nbsp;&nbsp; <a href="<?=$next; ?>">下一页</a>&nbsp;&nbsp;<a href="<?=$end; ?>">尾页</a> </div></td>
		 </tr>
		  </table>
		  </body>
</html>
     