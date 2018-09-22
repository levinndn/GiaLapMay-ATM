<!DOCTYPE html>
<html>
<head>
	<title>May ATM</title>
	<link rel="stylesheet" type="text/css" href="mayATM.css">
</head>
<body>
	<?php
		$tien=0;
		$sl1=0;
		$sl2=0;
		$sl3=0;
		$sl4=0;
		$er='';
		$result=false;
		if(isset($_POST["text"])){
			$tt=$_POST["text"];
			if(is_numeric($_POST["text"])){
			if($_POST["text"]>=50000){
				 $tien=$_POST["text"];
				 $sl1=(int)($tien/500000);
				 $sl2=(int)(($tien%500000)/200000);
				 $sl3=(int)((($tien%500000)%200000)/100000);
				 $sl4=(int)(((($tien%500000)%200000)%100000)/50000);
				 $tt=(int)($tien/50000)*50000;
				 $result=true;
			}else{
				 $er="Số tiền phải lớn hơn 50000 VNĐ";
			}
		}else{
			echo '<script>';
			echo "alert('Nhập sai định dạng');";
			echo '</script>';
		}
	}
			
	?>

	<div class="box">
		<form method="post" action="">
		<table>
			<tr >
				<td style="height: 30%;"><img src="img/mayATM.jpg" style="width: 150px;height: 150px;"></td>
				<td colspan="3" class="a1" style="height: 70%;">
					<h1 id="head">Mô Phỏng máy ATM</h1>
					<p style="color: violet;">Vui lòng nhập số tiền quý khách muốn thực hiện giao dịch</p>
					<p style="color: green;"> (số tiền phải là bội số của 50k)</p>
					<input type="text" name="text" id="text" value=<?php echo '"'.$tt.'"';?> ><input type="submit" name="submit" value="Rút Tiền">
				</td>
			</tr>
			<tr class="row2">
				<td>
					<p  id="title">Mệnh giá</p>
					<p>Mệnh giá 500,000</p>
					<p>Mệnh giá 200,000</p>
					<p>Mệnh giá 100,000</p>
					<p>Mệnh giá 50,000</p>
				</td>
				<td >
					<p  id="title" style="text-align:center;">Số lượng</p>
						<?php
							 echo '<p style="text-align:center;">'.$sl1.'</p>';
							 echo '<p style="text-align:center;">'.$sl2.'</p>';
							 echo '<p style="text-align:center;">'.$sl3.'</p>';
							 echo '<p style="text-align:center;">'.$sl4.'</p>';
						?>
				</td>
				<td id="column3">
					<p  id="title" style="text-align:right;">Thành Tiền</p>
					<?php
					$tt1=$sl1*500000;
					$tt2=$sl2*200000;
					$tt3=$sl3*100000;
					$tt4=$sl4*50000;
					$tt=$tt1+$tt2+$tt3+$tt4;
						echo '<p style="text-align:right;">'.number_format($tt1).'</p>';
						echo '<p style="text-align:right;">'.number_format($tt2).'</p>';
						echo '<p style="text-align:right;">'.number_format($tt3).'</p>';
						echo '<p style="text-align:right;">'.number_format($tt4).'</p>';
					?>
				</td>
				
				
			</tr>
			<tr>
				<td colspan="3">
					<br/>
						<?php 
							if($result!=true)
								echo '<p style="text-align:right;font-weight:bold;"> '.$er.' </p>';
						?>
				</td>
				<td colspan="3">
					<?php
						if($result==true){
							echo '<p style="text-align:right;font-weight:bold;"><u>Tổng tiền:</u> '.number_format($tt).' VNĐ</p>';
						}
					?>
				</td>
			</tr>
		</table>
		</form>
	</div>
</body>
</html>