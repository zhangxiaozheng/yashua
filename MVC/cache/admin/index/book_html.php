<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta name="renderer" content="webkit">
    <title></title>  
    <link rel="stylesheet" href="css/pintuer.css">
    <link rel="stylesheet" href="css/admin.css">
    <script src="js/jquery.js"></script>
    <script src="js/pintuer.js"></script>  
</head>
<body>
<form action="index.php?m=admin&c=index&a=book"  method="post">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 留言管理</strong></div>
    <div class="padding border-bottom">
      <ul class="search">
        <li>
         <!--  <button type="button"  class="button border-green" id="checkall"><span class="icon-check"></span> 全选</button> -->
          <button type="submit" class="button border-red" name="sancu"><span class="icon-trash-o"></span> 批量删除</button>
        </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="120">ID</th>
        <th>姓名</th>       
        <th>电话</th>
        <th>邮箱</th>
        <th>其他</th>
        <th width="25%">内容</th>
         <th width="120">注册时间</th>
       <!--  <th>操作</th>   -->     
      </tr> 
      <?php if(!empty($select)):?>  
      <?php foreach($select as $value): ?>   
        <tr>
          <td><input type="checkbox" name="id[]" value=" <?=$value['u_uid']; ?>"/>
            <?=$value['u_uid']; ?></td>
          <td><?=$value['username']; ?></td>
          <td>13420925611</td>
          <td>564379992@qq.com</td>  
           <td>深圳市民治街道</td>         
          <td>这是一套后台UI，喜欢的朋友请多多支持谢谢。</td>
          <td><?php echo date('Y-m-d H:i:s', $value['regtime']);?></td>
        <!--   <td><div class="button-group"> <input type="submit"  value="删除"><span class="icon-trash-o" ></span></div></td>
        </tr> -->
        <?php endforeach;?>
        <?php endif;?>
      <tr>
        <td colspan="8"><div class="pagelist"> <a href="<?=$first; ?>">首页</a> &nbsp;&nbsp;<span class="current"></span><a href="<?=$prev; ?>">上一页</a>&nbsp;&nbsp;<a href=""></a><a href="<?=$next; ?>">下一页</a>&nbsp;&nbsp;<a href="<?=$end; ?>">尾页</a> </div></td>
      </tr>
    </table>
  </div>
</form>
<script type="text/javascript">
function del(id){
	if(confirm("您确定要删除吗?")){
		
	}
}

$("#checkall").click(function(){ 
  $("input[name='id[]']").each(function(){
	  if (this.checked) {
		  this.checked = false;
	  }
	  else {
		  this.checked = true;
	  }
  });
})

function DelSelect(){
	var Checkbox=false;
	 $("input[name='id[]']").each(function(){
	  if (this.checked==true) {		
		Checkbox=true;	
	  }
	});
	if (Checkbox){
		var t=confirm("您确认要删除选中的内容吗？");
		if (t==false) return false; 		
	}
	else{
		alert("请选择您要删除的内容!");
		return false;
	}
}

</script>
</body></html>