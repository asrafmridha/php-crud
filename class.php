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
         
        $deltitem= $this->con->query("DELETE FROM tbl_student WHERE id= $id");

        if($deltitem){

          echo "delete Successfully";
        }
        else{

          echo "delete Failed";
        }
      }

      function update($id,$name,$email,$status){

        $update=$this->con->query("UPDATE tbl_student SET name='$name', email='$email' , status='$status' WHERE id='$id' ");
      }

      function inactive($id){

        $inactive=$this->con->query("UPDATE tbl_student SET status=2  WHERE id=$id ");
  }  

  function active($id){

    $active=$this->con->query("UPDATE tbl_student SET status=1  WHERE id=$id ");


}  
   
    
  
  //class er bracket      
    }

?>