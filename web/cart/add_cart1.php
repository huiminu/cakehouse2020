<?php
session_start();
$is_existed = "false";
//判斷購物車商品是否重覆,重複就不要再增加相同產品,並做數量更改
//session購物車做法
if(isset($_SESSION['Cart']) && $_SESSION['Cart'] != null){               
    for($i = 0 ; $i < count($_SESSION['Cart']); $i++){
      if($_POST['product_id'] == $_SESSION['Cart'][$i]['product_id']){
        $is_existed = "true";                                                         // $is_existed = "true" 判斷是重複的商品
        go_back($is_existed);
      }
    }
  }

if($is_existed == "false"){
    $temp['product_id']   = $_POST['product_id'];
    $temp['product_name'] = $_POST['product_name'];
    $temp['pic']          = $_POST['pic'];
    $temp['price']        = $_POST['price'];
    $temp['quantity']     = $_POST['quantity'];
    //將陣列資料加入到session Cart中
    $_SESSION['Cart'][] = $temp;
    go_back($is_existed);
}
//print_r($_SESSION['Cart']);


//$_SERVER['HTTP_REFERER'] 是php的返回上一頁(會帶參數) 
function go_back($is_existed){
    $location = $_SERVER['HTTP_REFERER']."&Existed=".$is_existed;
    header(sprintf('Location: %s ', $location));
}
?>
