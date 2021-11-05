<?php
    // if(isset($_GET['reg']) && $_GET['reg'] == "success"){
    //     echo "<script>alert('Tạo tài khoản thành công!')</script>";
    // }
?>
<link rel="stylesheet" href="style.css">
<form method="POST">
        <div class=box>
            <label>ID:</label>
            <input type="text" name="id" required />
        </div>
        <div class=box>
            <label>Password:</label>
            <input type="password" name="password" required />
        </div>
        <input type="submit" name="login" class="btn-submit" value="Login">
</form>
<?php
include './connection.php';
    if(isset($_POST['login'])){
        $id = $_POST['id'];
        $pass = $_POST['password'];
        $stmt = mysqli_stmt_init($conn);
        $query = "SELECT * FROM `students` WHERE ID = ? AND Pass = ?";
        if(mysqli_stmt_prepare($stmt,$query)){
            mysqli_stmt_bind_param($stmt, "ss", $id, $pass);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if(mysqli_num_rows($result) > 0){
                header('location: ./result.php?log="success"');
            }
        }
    }
?>