<?php require_once('../../connection/connection.php');?>
<?php
if(isset($_POST['AddForm']) && $_POST['AddForm'] == "INSERT"){
  $sql= "INSERT INTO products (name_date, price, description, created_at) VALUES ( :name_date,  
 :price, :description, :created_at)";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":name_date", $_POST['name_date'], PDO::PARAM_STR);
  $sth ->bindParam(":description", $_POST['description'], PDO::PARAM_STR);
  $sth ->bindParam(":price", $_POST['price'], PDO::PARAM_INT);
  $sth ->bindParam(":created_at", $_POST['created_at'], PDO::PARAM_STR);
  $sth ->execute();

  header('Location: list1.php');
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
              <form id="AddForm" class="text-right" method="post" action="create1.php">
                <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">品名</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="name_date" name="name_date"> </div>
                </div>
                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">價格</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="price" name="price"> </div>
                </div>
                <!-- <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label" contenteditable="true">產品描述</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="description" name="description"> </div>
                </div> -->

                <div class="form-group row"> <label for="inputpasswordh" class="col-2 col-form-label">產品描述</label>
                  <div class="col-10">
                    <textarea rows="5" class="form-control" name="description"></textarea> </div>
                    <input type="hidden" name="created_at" value="<?php echo date('Y-m-d H:i:s');?>">
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
  $(function(){
    $( "#published_date" ).datepicker({
        dateFormat: "yy-mm-dd"
          });
  });
  //套用ckeditor編輯器,記得要大寫CKEDITOR 改括號內的欄位名稱
  CKEDITOR.replace( 'description' );
  </script>
</body>

</html>