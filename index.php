<?php
include("insert.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Db connect by constructor</title>

    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">
</head>
<body>
    

     <div class="row mt-5">

   
      <div class="col-md-6 offset-md-3">

<?php
      $save= new Insert;
      
      if(isset($_POST["save"])){
       
          

          $save->save($_POST);
        
         }
    
       
       

      ?>

      

      <form method="POST" >
  <div class="form-group">
    <label for="exampleInputEmail1">Your Name</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name"  name="name">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Your Email</label>
    <input type="email" class="form-control" id="exampleInputPassword1" placeholder="Enter Email" name="email">
  </div>

  <div class="form-group">
    <label for="exampleInputPassword1">Status</label>
      <select class="form-control" name="status" id="">
        <option value="#">---Select--</option>
      <option value="1">Active</option>
      <option value="2">Inactive</option>
      <option value="3">Suspend</option>
      </select>
  </div>
  
  <button name="save" type="submit" class="btn btn-primary mt-3">Submit</button>
</form>

      </div>
     </div>
   
   

   </form>


    <div class="row">
      <div class="col-md-6 offset-3">

       <table class="table">

         <th>#sl NO</th>
         <th>Name</th>
         <th>Email</th>
         <th>Status</th>

             <?php 
               $result= $save->showdata();

                $result->fetch_assoc();
                $result["name"];
      
       
             
             
             
             ?>
       </table>
      </div>
    </div>

     


   
   

</body>
</html>
