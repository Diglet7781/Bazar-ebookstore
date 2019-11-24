

<?php
  session_start();
include "User.php";
require_once "../backend/dblogin.php";
class Seller extends User{
    //properties
    private $sellerId;
    private $accountBalance;
    private $totalAddedProduct;
    private $productName;
    private $productType;
    private $productPrice;
    private $productQuantity;
    private $productDescription;
    private $productImage;

    //methods

    public function __construct($productName,$productType,$productDescription,$productQuantity,$productPrice,$productImage) {

        $this->sellerId=$_SESSION['userId'];
        $this->productName = $productName;
        $this->productType=$productType;
        $this->productDescription = $productDescription;
        $this->productQuantity = $productQuantity;
        $this->productPrice=$productPrice;
        $this->productImage = $productImage;

      }

      //get seller ID

      public function getsellerId(){
          return $this->sellerId;
      }


    //get product name
    public function getproductName(){
        return $this->productName;
    }
    //get product ID
    public function getproductType(){
        return $this->productType;
    }
    //get product description
    public function getproductDescription(){
        return $this->productDescription;
    }
    //get product quantity
    public function getproductQuantity(){
        return $this->productQuantity;
    }
    //get product price
    public function getproductPrice(){
        return $this->productPrice;
    }
    //get product image
    public function getproductImage(){
        return $this->productImage;
    }

    //get accountBalance
    public function getaccountBalance(){
        return $this->accountBalance;
    }
    //get totaladdedProduct
    public function totalAddedProduct(){
        return $this->totalAddedProduct;
    }
    //add items to inventory
    public function addItems(){
        $sellerId=$this->getsellerId();
        $productName= $this->getproductName();
        $productType=$this->getproductType();
        $productDescription=$this->getproductDescription();
        $productQuantity=$this->getproductQuantity();
        $productPrice=$this->getproductPrice();
        $productImage=$this->getproductImage();
        //productid	productType	productName	productDescription	quantity	price	picture	sellerid
        $query="INSERT INTO inventory(productType,productname, productdescription,quantity,price,picture,sellerid)
        VALUES ('$productType','$productName','$productDescription','$productQuantity','$productPrice','$productImage','$sellerId')";
        return $query;
    }

}
?>
