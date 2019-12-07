<?php
include ('connect.php');
$sql = "select * from msginfo order by id desc ";
//执行sql语句


//$res = $db->query($sql);
$mysqli_result =$db->query($sql);
if($mysqli_result === false){
    echo "SQL错误";
}
$rows = [];
while ($row = $mysqli_result->fetch_array(MYSQLI_ASSOC)){
    $rows[] = $row;
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>留言板</title>
		<style>
			.text{
				width: 600px;
				margin: 0px auto;
			}
			.add_text{
				overflow: hidden;
			}
			.add_text  .content{
				width: 597px;
				margin: 0;
				padding: 0;
			}
			.add_text .user{
				float: left;
			}
			.add_text .btn{
				float: right;
			}
			.ul_text{
				margin: 20px 0px;
				background: #ccc;
				padding: 5px;
			}
			.ul_text .info{
				overflow: hidden;
			}
			.ul_text .user{
				float: left;
				color: blue;
			}
			.ul_text .time{
				float: right;
				color: #999;
			}
			.ul_text .content{
				width: 100%;
			}
		</style>
	</head>
	<body>
		<div class="text">

			<!--发布留言-->
			<div class="add_text">
				<form action="save.php" method="post">
					<textarea class="content" name="content" cols="82" rows="8"></textarea>
					<input class="user" name="user" type="text" />
					<input class="btn" type="submit"  value="发表留言"/>
			    </form>
			</div>
			<!--查看留言-->
			<div class="ul_text">
                <?php
                foreach ($rows as $v){
                ?>
				<div class="info">
					<span class="user"><?php echo $v['user']?></span>
					<samp class="time"><?php echo date('Y-m-d H:i:s',$v['intime'])?></samp>
				</div>
				<div class="content">
                    <?php echo $v['content']?>
				</div>
               <?php }?>
			</div>

		</div>
		
	</body>
</html>
