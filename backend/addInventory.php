
<?php

    require_once "dblogin.php";
    require_once "class/Seller.php";
    require_once "functions/validate.php";
   // $username=$_SESSION['username'];
   // $type= $_SESSION['type'];
   session_start();

    $sellerId=$_SESSION["userId"];
   echo  $_SESSION["userId"];
   // session_start();
   // if(isset($_SESSION['accountType']))
   // {
      //  if($_SESSION['accountType']=='seller')
       // {

    if (isset($_POST["add"])){
        $productName= test_input($_POST["itemName"]);
        $productType=test_input($_POST["productType"]);
        $productDescription=test_input($_POST["description"]);
        $productQuantity=test_input($_POST["quantity"]);
        $productPrice=test_input($_POST["price"]);
        $status = 'on';
        //For pictures
        $picName=$_FILES['picture']['picName'];
        $target_dir="upload/";
        $target_file=$target_dir .basename($_FILES["picture"]["picName"]);

        //select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        //valid file exxtensions
        $extensions_arr = array("jpg","JPG","jpeg","png","gif");

        $image_base64 = base64_encode(file_get_contents($_FILES['picture']['tmp_name']) );
        $productImage = 'data:image/'.$imageFileType.';base64,'.$image_base64;

          //validate input fields and verify
        //itemValidate($productName,$productType,$productDescription,$productQuantity,$productPrice,$productImage);
        $products= new Seller($productName,$productType,$productDescription, $productQuantity, $productPrice, $productImage);
        $connect = createConn();
        $result=$connect->query($products->addItems());

        //Upload File
        move_uploaded_file($_FILES['picture']['tmp_name'],$target_dir.$name);
        if (!$result){
            die($connect->error);
        }
        else{
            echo "item added sucessfully";
            header('Location:../frontend/viewInventory.php?addInventory=success');

        }
    }
?>
