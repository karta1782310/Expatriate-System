<form class="adit" name="country" method="post" enctype="multipart/form-data" action="insert/insert_workfor.php"> 
    <fieldset>
    <legend>　編輯員工派駐資料　</legend>
    員工身分證字號: <input type="text" name="Wssn"><br>		
    派駐國家代碼:　 <input type="text" name="Wcountry_code"><br>			            
    到職日期:　　　 <input type="date" name="end_date" ><br>			
    大使(代表)名稱: <input type="text" name="Wdeputy"><br>
    執行:  
    <input type="radio" name="act" value ="add">新增			
    <input type="radio" name="act" value ="update">更新
    <input type="radio" name="act" value ="delete">刪除<br>		
    
    <input type="submit" value="執行">
    <input type="reset">
    </fieldset>
</form>

