<?php
  require_once('header.php');
  require_once('connect.php');
  //khi nao an nut dang ky moi bat dau thao tac
  if(isset($_POST['btnLogin'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    // $hometown = $_POST['Hometown'];

    // su dung PDO de su dung cau truy van Select
    $sql = "SELECT `username` FROM `users` WHERE `username` =? and `password` =?";
    // 2 dau ? tuong ung voi so cot o tren

    $c = new Connect();
    $dblink = $c->connectToPDO();
    $re = $dblink->prepare($sql);
    $valueArray = ["$username", "$password"];
    $stmt = $re->execute($valueArray);

    //
    $numrow = $re-> rowCount();
    $row = $re->fetch(PDO::FETCH_BOTH);
    if($numrow==1){
      // echo "Login successfully";
      setcookie("cc_usr", $row['username'],time()+3600);
      header("Location: index.php");
    }else{
      echo "Something wrong!!";
    }
  }
?>
    <div class="container">
      <h2>Member registeration</h2>
      <form action="" name="formReg" method="POST">
        <div class="row">
          <label for="" class="col-lg-2">User name: </label>
          <div class="col-lg-10">
            <input type="text" class="form-control" name="username">
          </div>
            </div>
            <div class="row mb-3">
              <label for="" class="col-lg-2">Password: </label>
          <div class="col-lg-10">
            <input type="password" class="form-control" name="password">
            </div>
          </div>
        
        <!-- <div class="row mb-3">
          <label for="" class="col-lg-2">Hometown: </label>
        <div class="col-lg-10">
          <select name="Hometown" id="" class="form-select" >
            <option value="ct">Can tho</option>
            <option value="hcm">Ho Chi Minh</option>
          </select>
        </div>
        </div> -->
      
        <div class="row mb-3">
          <div class="d-grid mx-auto col-3">
          <input type="submit" value="Register" class="btn btn-primary"  name="btnLogin">
            <!-- sau khi an submit, chay len action co phuong thuc POST, lay gia tri nay name, o ngay tại file này -->
          </div>
        </div>
      </form>
    </div>
  </body>
</html>