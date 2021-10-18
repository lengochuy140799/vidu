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
           
                    
                       <H1 style="text-align: center;" >DANH SÁCH LỚP HỌC</H1>
               <!-- hiển thị bảng  --> 
                     <table id="tbmonhoc" class="table table-bordered table-hover" style="width:100%">

                        <thead>
                            <tr style="text-align: center">
                                <th hidden>Mã</th>
                                <th>STT</th>
                                <th>Tên lớp học</th>
                                <th>Phòng học</th>
                                <th>Giờ học</th>
                                <th>Giáo viên</th>
                                <th hidden> Môn học</th>
                                <th hidden>Thứ Ngày</th>
                                <th hidden>Trình độ</th>
                                <th>Chi tiết</th>
                                <th>Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
                                $sql="SELECT * FROM lophoc 
                                        
                                        inner join phong on lophoc.MaPhong = phong.MaPhong
                                        inner join thoigian on lophoc.MaTG = thoigian.MaTG
                                        inner join giaovien on lophoc.CMND = giaovien.CMND
                                        inner join monhoc on lophoc.MaMH = monhoc.MaMH
                                        inner join thungay on lophoc.MaTN = thungay.MaTN

                                          ";
                                $kq= mysqli_query($kn,$sql);
                                $stt=0;
                                while($row = mysqli_fetch_array($kq))
                                {
                                    $stt=$stt+1;
                            ?>
                            <tr>
                                <td hidden style="text-align: center"><p><?php echo $row['MaLop']; ?></p></td>
                                <td style="text-align: center"><p><?php echo $stt; ?></p></td>
                                <td><p style="margin: 7px auto;"><?php echo $row['TenLop'];?></p></td>
                                <td><p style="margin: 7px auto; text-align: center;"><?php echo $row['TenPhong'];?></p></td>
                                 <td><p style="margin: 7px auto; text-align: center;"><?php echo $row['Thoigian'];?></p></td>
                                 <td ><p style="margin: 7px auto; text-align: center;"><?php echo $row['HoTen'];?></p></td>
                                 <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['TenMH'];?></p></td>
                                  <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['ThuNgay'];?></p></td>
                                   <td hidden><p style="margin: 7px auto; text-align: center;"><?php echo $row['Trinhdo'];?></p></td>
                                   <!--  nút chi tiết -->
                                <td style="text-align: center;">
                                    <button type="button" class="smallbtn1" data-bs-toggle="modal" data-bs-target="#mdchitiet">
                                        <i class="far fa-edit"></i>
                                    </button>
                                </td>
                               <!--  nút xóa -->
                                <td style="text-align: center;">
                                    <button type="button" class="smallbtnxoa" data-bs-toggle="modal" data-bs-target="#mdxoa">
                                       <i class="fas fa-trash-alt"></i>
                                    </button>
                                </td>


                            <?php } ?>
                        </tbody>
                    </table>

                    <!-- nút thêm màn hình chính -->

                    <div style="text-align: center;">
                        
                          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#mdthem">
                            Thêm
                        </button>
                    </div>


 <!--MODOL NÚT XÓA -->
                    <div class="modal fade" id="mdxoa" tabindex="-1" aria-labelledby="xoalLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="xoalLabel">Xóa lớp học</h5>
                             <button type="button" class="smallbtn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                          </div>
                          <div class="modal-body">
                            Bạn có chắc chắn muốn xóa không?
                            <div>
                                    <p>
                                        Mã lớp
                                        <input class="form-control" type="text" name="xoamalop" id="xoamalop" style="width: 400px">
                                    </p>
                                </div>
                                  <div>
                                    <p>
                                        Tên Lớp
                                        <input class="form-control" type="text" name="txtxoatenlop" id="xoatenlop" style="width: 400px">
                                    </p>
                                </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                            <button type="submit"  name="btnxoalophoc">Xóa</button>
                          </div>
                        </div>
                      </div>
                    </div>

<!-- MOADOL CHI TIẾT -->
                    <div class="modal fade" id="mdchitiet" tabindex="-1" aria-labelledby="chitietLabel" aria-hidden="true">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="chitietLabel">Chi tiết lớp học</h5>
                             <button type="button" class="smallbtn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                          </div>
                          <div class="modal-body">

                              <div>
                                    <p>
                                        Mã lớp
                                        <input ria-label="Disabled input example" class="form-control" type="text" name="txtmalop" id="malop" style="width: 400px">
                                    </p>
                                </div>
                                  <div>
                                    <p>
                                        Tên Lớp
                                        <input ria-label="Disabled input example" class="form-control" type="text" name="txttenlop" id="tenlop" style="width: 400px">
                                    </p>
                                </div>

                                  <div>
                                    <p>
                                        Tên phòng
                                        <input ria-label="Disabled input example" class="form-control" type="text" name="txttenphong" id="phong" style="width: 400px">
                                    </p>
                                </div>
                                  <div>
                                    <p>
                                        Thời gian
                                        <input ria-label="Disabled input example" class="form-control" type="text" name="txtthoigian" id="thoigian" style="width: 400px">
                                    </p>
                                </div>
                                  <div>
                                    <p>
                                        Giáo viên
                                        <input ria-label="Disabled input example" class="form-control" type="text" name="txtgiaovien" id="giaovien" style="width: 400px">
                                    </p>
                                </div>
                                  <div>
                                    <p>
                                        Môn học
                                        <input ria-label="Disabled input example" class="form-control" type="text" name="txtmonhoc" id="monhoc" style="width: 400px">
                                    </p>
                                </div>
                                  <div>
                                    <p>
                                        Thứ ngày
                                        <input ria-label="Disabled input example" class="form-control" type="text" name="txtthungay" id="thungay" style="width: 400px">
                                    </p>
                                </div>
                                  <div>
                                    <p>
                                        Trình độ
                                        <input ria-label="Disabled input example" class="form-control" type="text" name="txttrinhdo" id="trinhdo" style="width: 400px">
                                    </p>
                                </div>
                          </div>
                        </div>
                      </div>
                    </div>

         

<!-- MODOL NÚT THÊM-->
                    <div class="modal fade" id="mdthem" tabindex="-1" aria-labelledby="themLable" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="themLabel">Thêm lớp học</h5>
                                <button type="button" class="smallbtn" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></button>
                              </div>

                              <div class="modal-body">

                                <div>
                                    <p>
                                        Tên Lớp
                                        <input  ria-label="Disabled input example" class="form-control" type="text" name="txttenlop" style="width: 400px">
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        Giáo viên
                                        <br>
                                        <select name="giaovien" class="btn btn-secondary btn-lg dropdown-toggle" style="width: 400px">
                                            <?php 
                                                $sql4="SELECT * FROM giaovien ";
                                                $kq5=mysqli_query($kn,$sql4);
                                                while ($row=mysqli_fetch_array($kq5)){ ?>
                                                    <option value="<?php echo $row['CMND'] ?>"> <?php echo $row['HoTen']; ?> </option>
                                                        <?php }?>
                                        </select>
                                    </p>
                                </div>

                                <div >
                                    <p>
                                        Phòng
                                        <br>
                                        <select name="phong"  class="btn btn-secondary btn-lg dropdown-toggle" style="width: 400px" >
                                            <?php 
                                                 $sql2="SELECT * FROM phong ";
                                                 $kq3=mysqli_query($kn,$sql2);
                                                while ($row=mysqli_fetch_array($kq3)){ ?>
                                                         <option value="<?php echo $row['MaPhong'] ?>"> <?php echo $row['TenPhong']; ?> </option>
                                                        <?php }?>
                                         </select>
                                    </p>
                                </div>
                                 <div>
                                    <p>
                                        Môn học
                                        <br>
                                        <select name="monhoc" class="btn btn-secondary btn-lg dropdown-toggle" style="width: 400px">
                                            <?php 
                                                $sql5="SELECT * FROM monhoc ";
                                                $kq6=mysqli_query($kn,$sql5);
                                                while ($row=mysqli_fetch_array($kq6)){ ?>
                                                    <option value="<?php echo $row['MaMH'] ?>"> <?php echo $row['TenMH']; ?> </option>
                                                        <?php }?>
                                        </select>
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        Thứ ngày
                                        <br>
                                        <select name="thungay" class="btn btn-secondary btn-lg dropdown-toggle" style="width: 400px">
                                            <?php 
                                                $sql3="SELECT * FROM thungay ";
                                                $kq4=mysqli_query($kn,$sql3);
                                                while ($row=mysqli_fetch_array($kq4)){ ?>
                                                    <option value="<?php echo $row['MaTN'] ?>"> <?php echo $row['ThuNgay']; ?> </option>
                                                        <?php }?>
                                        </select>
                                    </p>
                                </div>
                                <div>
                                    <p>
                                        Giờ
                                        <br>
                                        <select name="gio" class="btn btn-secondary btn-lg dropdown-toggle" style="width: 400px">
                                            <?php 
                                                $sql3="SELECT * FROM thoigian ";
                                                $kq4=mysqli_query($kn,$sql3);
                                                while ($row=mysqli_fetch_array($kq4)){ ?>
                                                    <option value="<?php echo $row['MaTG'] ?>"> <?php echo $row['Thoigian']; ?> </option>
                                                        <?php }?>
                                        </select>
                                    </p>
                                </div>
                                   <div>
                                    <p>
                                        Trình độ
                                        <br>
                                        <input ria-label="Disabled input example" class="form-control" type="text" name="trinhdo" style="width: 400px">
                                    </p>
                                </div>           
                                 <div align="center" style="padding-top: 20px">
                                     <button type="submit" style="height: 50px;width: 100px;" name="btnthemlh">thêm</button>
                                 </div>
                              </div>    
                            </div>
                        </div>
                    </div>
        <!-- END -->

<!-- TRUYỀN VÀO MODOL XÓA -->
                <script>
                        $(document).ready(function () {
                        $('.smallbtnxoa').on('click', function () {
                            $('#mdxoa').modal('show');

                            $tr = $(this).closest('tr');

                            var data = $tr.children("td").map(function () {
                                return $(this).text();
                            }).get();

                            console.log(data);

                            $('#xoamalop').val(data[0]);
                            $('#xoatenlop').val(data[2]);
                        });
                        });
                    </script>
<!--  TRUYỀN VÀO NÚT THÊM -->

                    <script>
                        $(document).ready(function () {
                        $('.smallbtn1').on('click', function () {
                            $('#mdchitiet').modal('show');

                            $tr = $(this).closest('tr');

                            var data = $tr.children("td").map(function () {
                                return $(this).text();
                            }).get();

                            console.log(data);

                            $('#malop').val(data[0]);
                            $('#tenlop').val(data[2]);
                            $('#phong').val(data[3]);
                            $('#thoigian').val(data[4]);
                            $('#giaovien').val(data[5]);
                            $('#monhoc').val(data[6]);
                            $('#thungay').val(data[7]);
                            $('#trinhdo').val(data[8]);
                          
                        });
                        });
                    </script>

        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
        <!-- FOOTER -->
        <div style="margin-top:30px">
            <?php load_footer() ?>
        </div>
        <!-- END -->
<!-- code nút thêm -->
<?php
$txttenlop= array_key_exists('txttenlop', $_POST) ? $_POST['txttenlop'] : null;
$giaovien= array_key_exists('giaovien', $_POST) ? $_POST['giaovien'] : null;
$phong= array_key_exists('phong', $_POST) ? $_POST['phong'] : null;
$monhoc= array_key_exists('monhoc', $_POST) ? $_POST['monhoc'] : null;
$thungay=array_key_exists('thungay', $_POST) ? $_POST['thungay'] : null;
$gio= array_key_exists('gio', $_POST) ? $_POST['gio'] : null;
$trinhdo= array_key_exists('trinhdo', $_POST) ? $_POST['trinhdo'] : null;
/*code nút xóa*/
$XML=array_key_exists('xoamalop', $_POST) ? $_POST['xoamalop'] : null;
function XOA($XML){
            $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
            $sqlxoa="DELETE FROM lophoc where MaLop = '".$XML."'";
            $kq10=mysqli_query($kn,$sqlxoa);
             echo ("<meta http-equiv='refresh' content='0'>");

        };

function THEM($txttenlop,$giaovien,$phong,$monhoc,$thungay,$gio,$trinhdo){
             $kn = mysqli_connect("localhost", "root", "", "thlvn")or die("chưa kết nối");
            $sql8="insert into lophoc (MaLop,TenLop,CMND,MaPhong,MaMH,MaTN,MaTG,Trinhdo) value('','$txttenlop','$giaovien','$phong','$monhoc','$thungay','$gio','$trinhdo')";
            $kq9=mysqli_query($kn,$sql8);
        };
if($_POST){
            if(isset($_POST['btnthemlh']) AND $_SERVER['REQUEST_METHOD']=="POST")
            {
                 THEM($txttenlop,$giaovien,$phong,$monhoc,$thungay,$gio,$trinhdo);
                 echo ("<meta http-equiv='refresh' content='0'>");

            }
            if(isset($_POST['btnxoalophoc']) AND $_SERVER['REQUEST_METHOD']=="POST")
            {
                 XOA($XML);
                
            }
        }

?>

    </form>
</body>

</html>