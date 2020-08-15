<?php
require_once "repo/Database.php";
$db = Database::GetInstance();
?>

<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
	<title>資料庫網頁建置</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
 
	<span id="tab-1"></span>
	<span id="tab-2"></span>
	<span id="tab-3"></span>
	<span id="tab-4"></span>

	<div id="tab">
	
		<ul>
		  <li><a href="#tab-1">員工基本資料表</a></li>
		  <li><a href="#tab-2">國家資料表</a></li>
		  <li><a href="#tab-3">員工派駐資料表</a></li>
		  <li><a href="#tab-4">眷屬資料表</a></li>
		</ul>
		
		<div class="tab-content-1">		

			<table class = "TB_COLLAPSE" >
				<p></p>				

				<form name="form1" method="post">				
					。輸入身分證字號以查詢：
					<input name="ssn" type="text" />
					<input type='submit'>				
				</form>

				<?php
					if(isset($_POST['ssn'])){
																		
						if($_POST['ssn'] != "") {
							$sql = "select * from employee where ssn like ?";	
							$params = [["s", $_POST['ssn']]];
						}							
						else {
							$sql = "select * from employee";
							$params = [];
						}
					}
					else{
						$sql = "select * from employee";
						$params = [];						
					}

					$data = $db->Select($sql, $params); 
				?>
				
				<p></p>
				<thead>
					<tr>
						<th width="70" >姓名</th>
						<th >身分證字號</th>
						<th >職等</th>
						<th >薪資</th>
						<th >電話</th>
						<th >性別</th>
						<th >出生年月日</th>
						<th >住址</th>
						<th >照片</th>
					</tr>
				</thead>								
				
				<?php
				foreach($data as $value)
				{
					echo "<tr>";
					echo "<td>".$value['name']."</td>";
					echo "<td>".$value['ssn']."</td>";
					echo "<td>".$value['degree']."</td>";
					echo "<td>".$value['salary']."</td>";
					echo "<td>".$value['phone']."</td>";
					echo "<td>".$value['gender']."</td>";
					echo "<td>".$value['born_date']."</td>";
					echo "<td>".$value['address']."</td>";
					echo "<td><img src='data:image/jpeg;base64,".base64_encode($value['picture'])."'/></td>";
					echo "</tr>";
				}?>				

			</table>
			<p></p>

			<?php include("form/_form_employee.php"); ?>
			<p></p>
        </div>

		<div class="tab-content-2">

			<?php
				$sql = "select * from country";
				$params = [];
				$data = $db->Select($sql, $params);
			?>

			<table class = "TB_COLLAPSE">
				<p></p>

				<thead>
					<tr>
						<th width="" >國家代碼</th>
						<th >國家名稱</th>
						<th >所屬洲名</th>
						<th >元首姓名</th>
						<th >外交部長姓名	</th>
						<th >聯絡人姓名	</th>
						<th >人口數	</th>
						<th >領土面積(km^3)</th>
						<th >連絡電話</th>
						<th >是否為邦交國</th>
					</tr>
				</thead>

				<?php
				foreach($data as $value)
				{
					echo "<tr>";
					echo "<td>".$value['c_code']."</td>";
					echo "<td>".$value['c_name']."</td>";
					echo "<td>".$value['c_state']."</td>";
					echo "<td>".$value['c_president']."</td>";
					echo "<td>".$value['c_Fminister']."</td>";
					echo "<td>".$value['c_Fcontect']."</td>";
					echo "<td>".$value['c_population']."</td>";
					echo "<td>".$value['c_area']."</td>";
					echo "<td>".$value['c_phone']."</td>";
					echo "<td>".$value['c_deplomatic']."</td>";
					echo "</tr>";
				}?>	
			</table>
			<p></p>	

			<?php include("form/_form_country.php"); ?>			
			<p></p>
		</div>

		<div class="tab-content-3">
					
			<?php
				$sql = "select * from workfor";
				$params = [];
				$data = $db->Select($sql, $params);
			?>

			<table class = "TB_COLLAPSE">
				<p></p>

				<thead>
					<tr>
						<th width="" >員工身分證字號</th>
						<th >派駐國家代碼</th>
						<th >到職日期</th>
						<th >大使(代表)名稱	</th>
					</tr>
				</thead>

				<?php
				foreach($data as $value)
				{
					echo "<tr>";
					echo "<td>".$value['Wssn']."</td>";
					echo "<td>".$value['Wcountry_code']."</td>";
					echo "<td>".$value['end_date']."</td>";
					echo "<td>".$value['Wdeputy']."</td>";
					echo "</tr>";
				}?>	
			</table>
			<p></p>

			<?php include("form/_form_workfor.php"); ?>			
			<p></p>
		</div>

		<div class="tab-content-4">
			<p></p>
			<?php
				$sql = "select * from dependent";
				$params = [];
				$data = $db->Select($sql, $params);
			?>
			
			<table class = "TB_COLLAPSE">
				<thead>
					<tr>
						<th width="" >員工身分證字號</th>
						<th >眷屬身分證字號</th>
						<th >眷屬姓名</th>
						<th >眷屬性別</th>
						<th >與員工關係	</th>
						<th >出生年月日	</th>

					</tr>
				</thead>

				<?php
				foreach($data as $value)
				{
					echo "<tr>";
					echo "<td>".$value['d_Essn']."</td>";
					echo "<td>".$value['d_ssn']."</td>";
					echo "<td>".$value['d_name']."</td>";
					echo "<td>".$value['d_gender']."</td>";
					echo "<td>".$value['d_relationship']."</td>";
					echo "<td>".$value['d_born_date']."</td>";
					echo "</tr>";
				}?>	
			</table>
			<p></p>
		
			<?php include("form/_form_dependent.php"); ?>		
			<p></p>
			
			
		</div>
	</div>
 
</body>
</html>