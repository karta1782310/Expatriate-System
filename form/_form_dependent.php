<form class="adit" name = "country" method="post" action="insert/insert_dependent.php" enctype="multipart/form-data"> 
			
    <fieldset>
    <legend>　編輯眷屬基本資料　</legend>
    員工身分證字號:<input type="text" name="d_Essn2">
    <br>		
    眷屬身分證字號:<input type="text" name="d_ssn2">
    <br>	
    眷屬姓名:　　　<input type="text" name="d_name2">
    <br>			
    眷屬性別:　　　
    <input type="radio" name="d_gender2" value ="女">   女			
    <input type="radio" name="d_gender2" value ="男">	男
    <br>			
    與員工關係:　　<input type="text" name="d_relationship2" >
    <br>			
    出生年月日:　　<input type="date" name="d_born_date2">
    <br>		
    
    執行:　  　　　
    <input type="radio" name="act" value ="add">新增			
    <input type="radio" name="act" value ="update">更新
    <input type="radio" name="act" value ="delete">刪除
    <br>		
    
    <input type="submit" value="執行"> 
    <input type="reset">
    </fieldset>
    
</form>