<?php
include './connection.php';
    if (!isset($_POST["register"]))
    {
        $idErr = '';
        $phoneErr = '';
        $emailErr = '';

        $id = '';
        $username = '';
        $phone = '';
        $email = '';
        $pass = '';
    }
    else{
        $tmp = true;
        if (stripos(trim($_POST['id']),' ')){
            $idErr = 'ID không chứa dấu cách';
            $tmp = false;
        }
        else{
            $idErr = '';
        }

        $id = $_POST['id'];
        $username = $_POST['username'];
        $gender = $_POST['gender'];

        if(strlen(trim($_POST['phone'])) !==10){
            $phoneErr = 'Phone phải có độ dài là 10';
            $tmp = false;
        }
        else{
            $phoneErr = '';
        }

        $tmp1 = stripos(trim($_POST['email']),'@');
        $tmp2 = stripos(trim($_POST['email']),'.');
        if(!$tmp1 || !$tmp2){
            $emailErr = 'Email phải có định dạng username@domain.com';
            $tmp = false;
        }
        else {
            $emailErr = '';
        }
        if(empty($_POST['password'])){
            $pass = $id;
        }
        else {
            $pass = trim($_POST['password']);
        }
  
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        if($tmp){
            $stmt = mysqli_stmt_init($conn);
            $query = 'INSERT INTO students VALUES (?, ?, ?, ?, ?, ?)';
            if(mysqli_stmt_prepare($stmt,$query)){
            mysqli_stmt_bind_param($stmt, "ssisss", $id, $username, $gender, $phone, $email, $pass);
            mysqli_stmt_execute($stmt);
            header('location: ./login.php');
            mysqli_stmt_close($stmt);
            }
            mysqli_close($conn);
        } 
    }
?>

<link rel="stylesheet" href="style.css">
<form method="POST">
        <div class="box">
            <label>ID</label>
            <input type="text" name="id" value="<?php echo $id; ?>" required />
            <div class="error"><?php echo $idErr ?></div>
        </div>
        <div class="box">
            <label>Username</label>
            <input type="text" name="username" value="<?php echo $username; ?>" required />
        </div>
        <div class="box">
            <label>Gender</label>
            <div class="items">
                <input type="radio" name="gender" value="1">
                <label>Male</label>
                <input type="radio" name="gender" value="0">
                <label>Female</label>
            </div>
        </div>
        <div class="box">
            <label>Phone</label>
            <input type="text" name="phone" value="<?php echo $phone; ?>" required />
            <div class="error"><?php echo $phoneErr ?></div>
        </div>
        <div class="box">
            <label>Email</label>
            <input type="text" name="email" value="<?php echo $email; ?>" required/>
            <div class="error"><?php echo $emailErr ?></div>
        </div>
        <div class="box">
            <label>Password</label>
            <input type="password" name="password" />
        </div>
        <input type="submit" value="Register" name="register" class="btn-submit">
</form>

