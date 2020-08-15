<form class="adit" name = "country" method="post" action="insert/insert_country.php" enctype="multipart/form-data"> 

    <fieldset>
    <legend>　編輯國家基本資料　</legend>
    國家代碼:　　　<input type="text" name="c_code2">
    <br>		
    國家名稱:　　　<input type="text" name="c_name2">
    <br>			
    所屬洲名:　　　<input type="text" name="c_state2">
    <br>			
    元首姓名:　　　<input type="text" name="c_president2" >
    <br>			
    外交部長姓名:　<input type="text" name="c_Fminister2">
    <br>		
    聯絡人姓名:　　<input type="text" name="c_Fcontect2">
    <br>	
    人口數:　　　　<input type="text" name="c_population2" >
    <br>		
    領土面積(km^3): <input type="text" name="c_area2">
    <br>		
    連絡電話:　　　<input type="text" name="c_phone2">
    <br>
    是否為邦交國:
    <input type="radio" name="c_deplomatic2" value ="是">是		
    <input type="radio" name="c_deplomatic2" value ="否">否
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
