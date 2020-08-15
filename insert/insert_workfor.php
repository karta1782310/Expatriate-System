<?php	 
   
    require_once "../repo/Database.php";
    
    if(isset($_POST["Wssn"]))
    {
        $db = Database::GetInstance();
        
        try {
            $a = ["s", $_POST["Wssn"]];
            $b = ["s", $_POST["Wcountry_code"]];
            $d = ["s", $_POST["end_date"]];
            $e = ["s", $_POST["Wdeputy"]];        
        }
        $params = [$b, $d, $e, $a];

        if($_POST["act"] == "add"){

            $sql = "INSERT INTO workfor(Wcountry_code, end_date, Wdeputy, Wssn)
                    VALUES (?, ?, ?, ?)";
            
            $db->Insert($sql, $params);
        }
        elseif($_POST["act"] == "update"){

            $sql = "UPDATE workfor 
                    SET Wcountry_code=?, end_date=?, Wdeputy=?
                    WHERE Wssn=?";

            $db->Update($sql, $params);
        }
        elseif($_POST["act"] == "delete"){

            $sql = "DELETE FROM workfor WHERE Wssn=?";
                    
            $db->Delete($sql, [$a]);
        }
        
        echo "<script>alert('執行成功!');   history.back();</script>";
    }
    
?>