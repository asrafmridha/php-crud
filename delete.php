 <?php

  $id=$_GET['uid'];
  $con=new mysqli("localhost","root","", "phpcrud");

   $con->query("DELETE FROM tbl_student
   WHERE id=$id");  
   
   ?> 

  <?php echo "delete Successfully"; ?>


  