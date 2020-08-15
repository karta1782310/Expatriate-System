<?php

    require_once "../repo/Database.php";
    
    if(isset($_POST['ssn2']))
    {
        $db = Database::GetInstance();

        $a = ["s", $_POST["name2"]];
        $b = ["s", $_POST["ssn2"]];
        $c = ["s", $_POST["degree2"]];
        $d = ["i", $_POST["salary2"]];	
        $e = ["s", $_POST["phone2"]];		
        $f = ["s", $_POST["gender2"]];		
        $g = ["s", $_POST["born_date2"]];	
        $h = ["s", $_POST["address2"]];

        $imagestring = trim($_REQUEST["upfile"]);
        $token = explode(',', $bank_image);
        $p = ["b", addslashes(file_get_contents($_FILES['upfile']['tmp_name']))];

        $params = [$a, $c, $d, $e, $f, $g, $h, $p, $b];

        if($_POST["act"] == 'add')
        {
            $sql = "INSERT INTO employee (name,degree,salary,phone,gender,born_date,address,picture,ssn) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            $db->Insert($sql, $params);
        }
        elseif($_POST["act"] == 'update')
        {
            $sql = "UPDATE employee SET name=?, degree=?, salary=?, phone=?, gender=?, born_date=?, address=?, picture=? WHERE ssn=?";
                    
            $db->Update($sql, $params);
        }
        elseif($_POST["act"] == 'delete')
        {
            $sql = "DELETE FROM  employee WHERE ssn=?";
                    
            $db->Delete($sql, [$b]);
        }

        echo "<script>alert('執行成功!');   history.back();</script>";
    }
    

?>


