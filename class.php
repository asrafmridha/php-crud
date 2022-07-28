<?php

  class Insert{
   
   private $con;

   function __construct()
   {
      $this->con=new mysqli("localhost","root","", "phpcrud");
   }
    
     function save($data){
       
      $name=$data['name'];
      $email=$data['email'];
      $status=$data['status'];

      if(empty($name)){

         echo "please give your name </br>";
      }
     else if(empty($email)){

         echo "please give your email";
      }
      else{

       $save=  $this->con->query("INSERT INTO tbl_student(name,email,status) VALUES('$name','$email','$status')");

       if($save){

         echo  "save successfully";
       }
       else{

         echo "something went wrong";
       }

      }
   }

      function showdata(){

       $result= $this->con->query("SELECT * FROM tbl_student");
       return $result;
      }

      function delete($id){
         
        $deltitem= $this->con->query("DELETE FROM tbl_student WHERE id=$id");



      }





  }          


?>