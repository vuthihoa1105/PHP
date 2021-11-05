<?php
    if(isset($_GET['log']) && $_GET['log'] === 'success'){
        echo "<script>alert('Đăng nhập thành công')</script>";
    }
?>
<table border=1 cellspacing=0 cellpadding= 10px>
    <thead>
        <th>ID</th>
        <th>Họ tên</th>
        <th>Giới tính</th>
        <th>Điện thoại</th>
        <th>Email</th>
        <th>Mật khẩu</th>
    </thead>
    <tbody>
        <?php 
            include './connection.php';
            $sql = "SELECT * FROM students";
            $result = mysqli_query($conn, $sql);
            
            if(mysqli_num_rows($result) > 0){
                while($student = mysqli_fetch_assoc($result)){ 
                    if($student['Gender'] == 0){
                        $tmp = 'Nữ';
                        $color = '#f44e3b';
                    }
                    else{
                        $tmp = 'Nam';
                        $color = '#7bdcb5';
                    }
                    echo " <tr bgcolor = $color>
                            <td>".$student['ID']."</td>
                            <td>".$student['Name']."</td>
                            <td>".$tmp."</td>
                            <td>".$student['Phone']."</td>
                            <td>".$student['Email']."</td>
                            <td>".$student['Pass']."</td>
                        </tr>
                    ";
                }
            }
        ?>
    </tbody>
</table>