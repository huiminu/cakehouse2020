<?php require_once('../functions/login_check.php'); ?>
<?php require_once('../../connection/connection.php'); ?>
<?php
if(isset($_POST['AddForm']) && $_POST['AddForm'] == "INSERT"){
  $sql= "INSERT INTO products  (name_date, description, price, created_at) VALUES ( :name_date, :description, :price, :created_at)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":name_date", $_POST['name_date'], PDO::PARAM_STR);
  $sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
  $sth ->bindParam(":price", $_POST['price'], PDO::PARAM_STR);
  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $sth ->execute();

  header('Location: list2.php');
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
              <h1>產品管理</h1>
            </div>
            <div class="card-body">
              <ul class="breadcrumb mb-2">
                <li class="breadcrumb-item"> <a href="list2.php">首頁</a> </li>
                <li class="breadcrumb-item"><a href="list2.php">產品管理</a></li>
                <li class="breadcrumb-item active">新增一筆</li>
              </ul>
              <div class="row">
                <div class="col-md-12 my-3"><a class="btn btn-primary" href="list2.php">回上一頁</a></div>
              </div>
              <form id="AddForm" class="text-right" method="post" action="create2.php">
                <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">產品名稱</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="name_date" name="name_date"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">產品內容</label>
                  <div class="col-10">
                    <textarea rows="5" class="form-control" name="description"></textarea> </div>  
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">價格</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="price" name="price"> </div>
                    <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="AddForm" value="INSERT">
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
// $(function(){
//  $( "#published_date" ).datepicker({
//    dateFormat: "yy-mm-dd"
//  });
// });
  //套用ckeditor編輯器
  CKEDITOR.replace( 'description' );
  </script>
</body>

</html>