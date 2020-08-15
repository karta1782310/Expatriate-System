<form class= 'adit' name = "employee" method="post" enctype="multipart/form-data" action="insert/insert_employee.php"> 			
    <fieldset>
    <legend>　編輯員工基本資料　</legend>
    姓名:　　　 <input type="text" name="name2">
    <br>		
    身分證字號: <input type="text" name="ssn2">
    <br>			
    職等:　　　 <input type="text" name="degree2">
    <br>			
    薪資:　　　 <input type="text" name="salary2" >
    <br>			
    電話:　　　 <input type="text" name="phone2">
    <br>		
    性别:　　　
    <input type="radio" name="gender2" value ="女">女			
    <input type="radio" name="gender2" value ="男">	男
    <br>		
    出生年月日: <input type="date" name="born_date2" >
    <br>		
    住址: 　　　<input type="text" name="address2">
    <br>		
    照片: 　　　<input type="file"  name="picture2" accept="image/gif, image/jpeg, image/png" >
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

