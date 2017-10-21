<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title>网站信息</title>  
    <link rel="stylesheet" href="public/css/pintuer.css">
    <link rel="stylesheet" href="public/css/admin.css">
    <script src="public/js/jquery.js"></script>
    <script src="public/js/pintuer.js"></script>  
</head>
<body>
<div class="panel admin-panel">
  <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong></div>
  <form action="index.php?m=admin&c=index&a=column" method="post">
  <div class="padding border-bottom">  
  <button type="submit" class="button border-yellow" value="删除" name="sanchu"><span class="icon-plus-square-o"></span> 删除博文</button>
  </div> 
  <table class="table table-hover text-center">
    <tr>
      <th width="5%">ID</th>     
      <th>博文标题</th>  
      <th>作者</th>     
      <th width="250">发表时间</th>
    </tr>
    <?php if(!empty($select)):?>
    <?php foreach($select as $value): ?>
    <tr>
      <td><input type="checkbox" name="id[]" value="<?=$value['id']; ?>"/><?=$value['id']; ?></td>      
      <td><?=$value['title']; ?></td>  
      <td><?=$value['authorid']; ?></td>  
      <td><?php echo date('Y-m-d H:i:s', $value['addtime']);?>
      </td>
    </tr> 
    <?php endforeach;?>
    <?php endif;?>
     <td colspan="8"><div class="pagelist"> <a href="<?=$first; ?>">首页</a> &nbsp;&nbsp; <a href="<?=$prev; ?>">上一页</a>&nbsp;&nbsp; <a href="<?=$next; ?>">下一页</a>&nbsp;&nbsp;<a href="<?=$end; ?>">尾页</a> </div></td>
  </table>
  </form> 
</div>
<script>
function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}
</script>
</body></html>