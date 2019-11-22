  
<?php
function createConn() { 
  $dbu="root"; $dbp=""; $dbh="localhost"; $dbname="ecommerce";
  return new mysqli($dbh,$dbu,$dbp,$dbname);
 //$connect = createConn();
}
