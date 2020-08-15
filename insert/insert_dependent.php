<?php	 
    
    require_once "../repo/Database.php";

    if(isset($_POST['d_Essn2']))
    {
        $db = Database::GetInstance();

        $a = ["s", $_POST["d_Essn2"]];
        $b = ["s", $_POST["d_ssn2"]];
        $c = ["s", $_POST["d_name2"]];
        $d = ["s", $_POST["d_gender2"]];
        $e = ["s", $_POST["d_relationship2"]];
        $f = ["s", $_POST["d_born_date2"]];
        
        $params = [$b, $c, $d, $e, $f, $a];

        if($_POST["act"] == 'add')
        {
            $sql = "INSERT INTO dependent(d_ssn,d_name,d_gender,d_relationship,d_born_date, d_Essn) 
                    VALUES (?, ?, ?, ?, ?, ?)"

            $db->Insert($sql, $params);
        }
        elseif($_POST["act"] == 'update')
        {
            $sql = "UPDATE dependent 
                    SET d_ssn=?, d_name=?, d_gender=?, d_relationship=?, ,d_born_date=?, 
                    WHERE d_Essn=?";
                    
            $db->Update($sql, $params);
        }
        elseif($_POST["act"] == 'delete')
        {
            $sql = "DELETE FROM dependent WHERE d_Essn=?";
                    
            $db->Delete($sql, [$a]);
        }

        echo "<script>alert('執行成功!');   history.back();</script>";
    }
    
    ?>