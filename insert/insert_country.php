<?php

    require_once "../repo/Database.php";

    if(isset($_POST['c_code2']))
    {
        $db = Database::GetInstance();

        $a = ["s", $_POST["c_code2"]];
        $b = ["s", $_POST["c_name2"]];
        $c = ["s", $_POST["c_state2"]];
        $d = ["s", $_POST["c_president2"]];
        $e = ["s", $_POST["c_Fminister2"]];
        $f = ["s", $_POST["c_Fcontect2"]];
        $g = ["i", $_POST["c_population2"]];
        $h = ["i", $_POST["c_area2"]];
        $i = ["s", $_POST["c_phone2"]];
        $j = ["s", $_POST["c_deplomatic2"]];
        
        $params = [$b, $c, $d, $e, $f, $g, $h, $i, $j, $a];

        if($_POST["act"] == 'add')
        {
            $sql = "INSERT INTO country(c_name,c_state,c_president,c_Fminister,c_Fcontect,c_population,c_area,c_phone,c_deplomatic,c_code)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $db->Insert($sql, $params);
        }
        elseif($_POST["act"] == 'update')
        {
            $sql = "UPDATE country 
                    SET c_name=?, c_state=?, c_president=?, c_Fminister=?, c_Fcontect=?, c_population=?, c_area=?, c_phone=?, c_deplomatic=?
                    WHERE c_code=?";
                                
            $db->Update($sql, $params);
        }
        elseif($_POST["act"] == 'delete')
        {
            $sql = "DELETE FROM country WHERE c_code=?";

            $db->Delete($sql, [$a]);
        }

        echo "<script>alert('執行成功!');   history.back();</script>";
    }
?>