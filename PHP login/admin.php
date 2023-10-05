<?php 

    session_start();
    require_once 'config/db.php';
    if (!isset($_SESSION['admin_login'])) {
        $_SESSION['error'] = 'กรุณาเข้าสู่ระบบ !';
        header('Location: signin.php');
    }

?>

<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="style03.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>
</head>
<body>
    <div class="container">
        <?php
         
            if (isset($_SESSION['admin_login'])) {
                $admin_id = $_SESSION['admin_login'];
                $stmt = $conn->query("SELECT * FROM users WHERE id = $admin_id");
                $stmt->execute();
                $row = $stmt->fetch(PDO::FETCH_ASSOC);

            }
        ?>
    <div class="white">
        <h3 class="mt-4">Welcome Admin, <?php echo $row['firstname'] . ' ' . $row['lastname']?> User</h3>
    
        <a id="test"></a>
        <h1>ประวัติส่วนตัว</h1>
        <a href="https://main.kkw-info.com/index2.php">หน้าเว็บไซต์โรงเรียน</a>
        <p> ชื่อ น.ส.สุคนธ์ทิพย์ ด้วงวังหิน ม.6/11 เลขที่ 39 ชื่อเล่น มายด์</p>
        <p>โรงเรียนขอนแก่นวิทยายน ห้องเรียนพิเศษ Platinum Programmer KKW ต.ในเมือง อ.เมือง จ.ขอนแก่น </p>
        <a href="logout.php" class="btn btn-danger">Logout</a> 
    </div>
</div>    
</body>
</html>