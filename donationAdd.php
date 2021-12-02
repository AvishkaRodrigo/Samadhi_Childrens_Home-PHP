<?php
    $name = $post =$contactnumber = $address ="";
    $errors = array('name'=>'', 'contactnumber'=>' ','address'=>'','post'=>'','Amount'=>'');

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if (empty($_POST['name'])){
            $errors["name"] = "Name is required";
        }else{
            $name = $_POST['name'];
            if (!preg_match('/^([a-zA-Z]+)$/',$name)){
                $errors["name"] = "Invalid";
            }
        }
        if (empty($_POST['contactnumber'])){
            $errors['contactnumber'] = "Conatct number is required";
        }else{
            $contactnumber = validate($_POST['contactnumber']);
            if (!preg_match('/^([0-9]+){10}/',$contactnumber)){
                $errors['contactnumber'] = "Invalid";
            }
        }
        
        if (empty($_POST['address'])){
            $errors['address'] = "Address is required";
        }else{
            $address = validate($_POST['address']);
            if (!preg_match('/^([a-zA-Z0-9\s,.\/]{50})$/',$address)){
                $errors['address'] = "Invalid";
            }
        }

        if (empty($_POST['post'])){
            $errors['post'] = "Select your gender";
        }
           
        if (empty($_POST['Amount'])){
            $errors['Amount'] = "Amount number is required";
        }else{
            $contactnumber = validate($_POST['Amount']);
            if (!preg_match('/^([0-9]+){10}/',$Amount)){
                $errors['Amount'] = "Invalid";
            }
        }
    }
   

    // if (array_filter($errors)){
    //    // echo 'Errors in form';
    // }else{
    //     echo "no erro9rs";
    // }


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="labourAdd.css">
	<title>Donation Form</title>
</head>
<body>

<!--Form3-->   

    <div class="head1">
        <b>Donation Form</b>
    </div>    

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="POST" class="form2">
        
        <div class="commonclass">
            <label for="initialname">Name : </label><br>
            <input type="text" value="<?php echo validate($name)?>" name="name" id="initialname" >
            <span class="error" style="margin-left: 10%"><?php echo $errors["name"];?></span>
        </div>

        <div class="commonclass" >
            <label for="contactno">Contact Number :</label><br>
            <input type="text" id="contactno" name="contactnumber" value="<?php echo validate($contactnumber)?>">
            <span class="error" style="margin-left: 10%"><?php echo $errors["contactnumber"];?></span>
        </div>  
        
        <div class="commonclass">
            <label for="address">Address :</label><br>
            <textarea name="address" id="textarea" rows="4" cols="50" value="<?php echo validate($address)?>" required></textarea>
        </div> 
        
        <div class="commonclass">
            <label for="post">Donation type :</label><br>
            <select name="post" id="post" value="<?php echo validate($post)?>"required>
                <option value="Cash">Cash</option>
                <option value="Items">Items</option>
                <option value="Both">Both</option>
            </select>
            <span class="error" style="margin-left: 10%"><?php echo $errors["post"];?></span>
        </div>

        <div class="commonclass" >
            <label for="Amount">Amount :</label><br>
            <input type="text" id="Amount" name="Amount" value="<?php echo validate($contactnumber)?>">
            <span class="error" style="margin-left: 10%"><?php echo $errors["Amount"];?></span>
        </div> 

        <input type="submit" name="Insert" id="insertbtn" value="Insert">
      
            
    </form>

</body>
</html>    