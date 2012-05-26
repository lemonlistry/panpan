<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <link href="<?= Yii::app()->request->baseUrl?>/css/base.css" rel="stylesheet" type="text/css">
<link href="<?= Yii::app()->request->baseUrl?>/css/admin.css" rel="stylesheet" type="text/css">
</head>
<body class="input">
	<div class="body">
		<div class="inputBar">
			<h1><span class="icon">&nbsp;</span>添加门票</h1>
		</div>
            <div class="bodytotal">
               <div class="body_left">
                   <form action="<?php echo $this->createUrl('ticket/actadticket');?>" method="post">
			<table>
				<tbody>
				  <th>门票类型:</th>
				  <td><select name="ticket_class_id">
                                          <option value="">请选择</option>
                                          <?php foreach($class as $val){?>
                                          <option value="<?php echo $val['class_id']?>" <?php if(isset($info) && $val['class_id']==$info['ticket_class_id']){echo "selected='selected'";}?>><?php echo $val['class_name']?></option>
                                          <?php }?>
                                      </select></td>
				  </tr>
				<tr>
				  <th>门票名称: </th>
				  <td><input type="text" name="ticket_name" value="<?php echo  isset($info) ? $info['ticket_name'] : '';?>"></td>
				  </tr>
				<tr>
                                    <tr>
				  <th>门票市场价: </th>
				  <td><input type="text" name="ticket_market_price" value="<?php echo  isset($info) ? $info['ticket_market_price'] : '';?>"></td>
				  </tr>
                                     <tr>
				  <th>门票预约价: </th>
				  <td><input type="text" name="ticket_shop_price" value="<?php echo  isset($info) ? $info['ticket_shop_price'] : '';?>"></td>
				  </tr>
                                     <tr>
				  <th>支付方式: </th>
				  <td><input type="text" name="ticket_paystate" value="<?php echo  isset($info) ? $info['ticket_paystate'] : '';?>"></td>
				  </tr>
				<tr>
                                    <th><input type="hidden" name="ticket_id" value="<?php echo isset($info) ? $info['ticket_id'] : '';?>"></th>
                                    <td><input type="submit" value="添加"></td>
                                </tr>
			</tbody></table>
                       </form>
            </div>
           
            </div>
	</div>

</body>
</html>