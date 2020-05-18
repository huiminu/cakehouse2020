<?php require_once('../../connection/connection.php');?>
<?php
if(isset($_POST['EditForm']) && $_POST['EditForm'] == "EDIT"){
  $sql= "UPDATE members SET name_date= :name_date, email= :email, phone= :phone, birthday= :birthday, address= :address, updated_at= :updated_at where memberID = :memberID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":name_date", $_POST['name_date'], PDO::PARAM_STR);
  $sth ->bindParam(":email", $_POST['email'], PDO::PARAM_STR);
  $sth ->bindParam(":phone", $_POST['phone'], PDO::PARAM_STR);
  $sth ->bindParam(":birthday", $_POST['birthday'], PDO::PARAM_STR);
  $sth ->bindParam(":address", $_POST['address'], PDO::PARAM_STR);
  $sth ->bindParam(":updated_at", $_POST['updated_at'], PDO::PARAM_STR);
  $sth ->bindParam(":memberID", $_POST['memberID'], PDO::PARAM_INT);
  $sth ->execute();

  header('Location: list1.php');
}else{
  $query = $db->query("SELECT * FROM members WHERE memberID= ".$_GET['gmemberID']);
  $members = $query->fetch(PDO::FETCH_ASSOC); 
}
?>
<!DOCTYPE html>
<html>

<?php require_once('../layouts/head.php'); ?>


<body style="">
<?php require_once('../layouts/navbar.php'); ?> 
  <div class="py-4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h1>最新消息管理</h1>
            </div>
            <div class="card-body">
              <ul class="breadcrumb mb-2">
                <li class="breadcrumb-item"> <a href="#">首頁</a> </li>
                <li class="breadcrumb-item"><a href="#">最新消息管理</a></li>
                <li class="breadcrumb-item active">新增一筆</li>
              </ul>
              <div class="row">
                <div class="col-md-12 my-3"><a class="btn btn-primary" href="list1.php">回上一頁</a></div>
              </div>
              <form id="EditForm" class="text-right" method="post" action="edit1.php">
              <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">姓名</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="name_date" name="name_date" value="<?php echo $members['name_date']; ?>"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">E-mail</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $members['email']; ?>"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">電話</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $members['phone']; ?>"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">生日</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="birthday" name="birthday" value="<?php echo $members['birthday']; ?>"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">地址</label>
                  <div class="col-10">
                    <textarea rows="5" class="form-control" name="address"><?php echo $members['address']; ?></textarea> </div>
                    <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="EditForm" value="EDIT">
                    <input type="hidden" name="memberID" value="<?php echo $_GET['gmemberID']; ?>">
                </div>
                <button type="submit" class="btn mr-3 btn-primary">取消並回上一頁</button><button type="submit" class="btn btn-secondary">確定送出</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php require_once('../layouts/footer.php'); ?> 
  <script>
  $(function(){
    $( "#birthday" ).datepicker({
        dateFormat: "yy-mm-dd"
          });
  });
  //套用ckeditor編輯器,記得要大寫CKEDITOR 改括號內的欄位名稱
  // CKEDITOR.replace( 'address' );
  </script>
</body>

</html>