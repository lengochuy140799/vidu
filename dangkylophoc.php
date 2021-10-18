<?php
    require 'site.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://kit.fontawesome.com/22403d42e6.js" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://kit.fontawesome.com/22403d42e6.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" type="text/css" href="Style/CSSButton.css">
</head>
<body>
    <form action="" method="POST">
        <!-- menu and image -->
        <div class="jumbotron text-center" style="margin-bottom:0; padding: 20px">
            <?php load_menu() ?>
        </div>
        <div style="display: flex; justify-content: center;">
            <img src="Image/Trangchu.png" style="width: 100%;">
        </div>
        <!-- END -->

        <!-- BODY Content -->
        <div style="margin-top:30px; display: flex; justify-content: center;">
            <div style="width: 70%;">
           
                    
                       <H1 style="text-align: center;" >ĐĂNG KÝ LỚP HỌC</H1>
                 
    <table id="tbmonhoc" class="table table-bordered table-hover" style="width:100%">

                        <thead>
                            <tr style="text-align: center">
                                <th hidden>Mã</th>
                                <th>STT</th>
                                <th>Tên môn học</th>
                                <th>Giáo viên</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                $sql1="SELECT * FROM lophoc inner join giaovien  on lophoc.CMND = giaovien.CMND";
                                $kq1= mysqli_query($kn,$sql1);
                                $stt=0;
                                while($row = mysqli_fetch_array($kq1))
                                {
                                    $stt=$stt+1;
                            ?>
                            <tr>
                                <td hidden style="text-align: center"><p><?php echo $row['MaLop ']; ?></p></td>
                                <td style="text-align: center"><p><?php echo $stt; ?></p></td>
                                <td><p style="margin: 7px auto;"><?php echo $row['TenLop'];?></p></td>
                                <td><p style="margin: 7px auto;"><?php echo $row['HoTen'];?></p></td>

                                <td style="text-align: center;">
                                    <button type="button" class="smallbtn" data-bs-toggle="modal" data-bs-target="#mdChitiet">
                                       <i class="fas fa-user-plus"></i>
                                    </button>
                                </td>
                            <?php } ?>
                        </tbody>
                    </table>





            </div>
        </div>
        <!-- END -->

        <!-- FOOTER -->
        <div style="margin-top:30px">
            <?php load_footer() ?>
        </div>
        <!-- END -->
    </form>
</body>
</html>