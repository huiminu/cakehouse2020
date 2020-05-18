<?php require_once('../functions/login_check.php'); ?>
<?php require_once('../../connection/connection.php');?>
<?php
if(isset($_POST['EditForm']) && $_POST['EditForm'] == "EDIT"){
  $sql= "UPDATE members_categories SET category= :category, updated_at= :updated_at WHERE member_categoryID = :member_categoryID";
  $sth = $db ->prepare($sql);
  $sth ->bindParam(":category", $_POST['category'], PDO::PARAM_STR);
  $sth ->bindParam(":updated_at", $_POST['updated_at'], PDO::PARAM_STR);
  $sth ->bindParam(":member_categoryID", $_POST['member_categoryID'], PDO::PARAM_INT);
  $sth ->execute();

  header('Location: list1.php');
}else{
  $query = $db->query("SELECT * FROM members_categories WHERE member_categoryID= ".$_GET['gmember_categoryID']);
  $members_categories = $query->fetch(PDO::FETCH_ASSOC); 
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
              <h1>會員分類管理</h1>
            </div>
            <div class="card-body">
              <ul class="breadcrumb mb-2">
                <li class="breadcrumb-item"> <a href="#">首頁</a> </li>
                <li class="breadcrumb-item"><a href="#">會員分類管理</a></li>
                <li class="breadcrumb-item active">新增一筆</li>
              </ul>
              <div class="row">
                <div class="col-md-12 my-3"><a class="btn btn-primary" href="list1.php">回上一頁</a></div>
              </div>
              <form id="EditForm" class="text-right" method="post" action="edit1.php">
              <div class="form-group row"> <label for="inputmailh" class="col-2 col-form-label">姓名</label>
                  <div class="col-10">
                    <input type="text" class="form-control" id="category" name="category" value="<?php echo $members_categories['category']; ?>"> </div>
                </div>
                    <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d H:i:s'); ?>">
                    <input type="hidden" name="EditForm" value="EDIT">
                    <input type="hidden" name="member_categoryID" value="<?php echo $_GET['gmember_categoryID']; ?>">
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
</body>

</html>