<?php
include("class.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Db connect by constructor</title>

    
    
   <!-- jquery table plugin link  -->

   <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

    <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    
</head>
<body>
    

     <div class="row mt-5">

   
      <div class="col-md-6 offset-md-3">

<?php
      $save= new Insert;
      
      if(isset($_POST["save"])){
          $save->save($_POST);
        
         }

         if(isset($_GET['deleteid'])){
        
           $id=$_GET['deleteid'];
          $save->delete($id);
         }

         if(isset($_GET['active'])){
          $id=$_GET['active'];
          echo $save->inactive($id);

         }

         if(isset($_GET['inactive'])){
          $id=$_GET['inactive'];
          echo $save->active($id);

         }

         if(isset($_GET['update'])){
          $id=$_GET['update'];
          $name=$_GET['name'];
          $email=$_GET['email'];
          $status=$_GET['status'];

          echo $save->update($id,$name,$email,$status);

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

       <table class="table" id="myTable">

       <thead>

         <tr>
         <th>#sl NO</th>
         <th>Name</th>
         <th>Email</th>
         
         <th>Action</th>
         <th>Status</th>

         </tr>

        </thead>
        <tbody>

             <?php 
               $result= $save->showdata();

            if($result->num_rows>0){

                $slno=1;
                while($res= $result->fetch_assoc()){
              //fetch data from db
              echo 
                 '<tr>
                 <td>'.$slno.' </td>
                 <td>'.$res['name'].' </td>
                 <td>'.$res['email'].' </td>
                
                   <td>

                   <button  class="btn btn-info" data-bs-toggle="modal" data-bs-target="#update'.$res["id"].'"> <i class="fa fa-solid   fa-pen-to-square "></i>  </button> 


                   <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delete'.$res["id"].'" ><i class="fa-solid fa-trash"></i></button>
                   
                   </td> ';

                   if($res['status']==1){
                    echo '<td> <form method="GET"> <button class="btn btn-primary" name="active" value="'.$res["id"].'" >Active</button></form> </td> </tr>';
                   }
                   else if($res['status']==2){
                    echo '<td> <form method="GET">  <button class="btn btn-info" name="inactive" value="'.$res["id"].'">Inactive</button> </form>  </td> </tr>';

                   }
                   else{
                    echo '<td> <button class="btn btn-danger">Suspend</button> </td> </tr>';
                   }
               $slno++;
              

               ?>

    

               
            
              
       
              <!-- Modal for delete item -->
   <div class="modal fade" id="delete<?php echo $res['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirmation Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure want to delete this user?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
         
        <form method="GET">

        <button class="btn btn-danger" name="deleteid" value="<?php echo $res['id']; ?>">Delete</button> 

        </form>
      </div>
    </div>
  </div>
</div>



 
              <!-- Modal for update data -->

              <div class="modal fade" id="update<?php echo $res['id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
 
              <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    

      <form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Name</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="name"  value="<?php echo $res['name']; ?>" >
  
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Email</label>
    <input type="email" class="form-control" id="exampleInputPassword1" name="email" value="<?php echo $res['email']; ?>">
  </div>

  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Status</label>
    <input type="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="status" value="<?php echo $res['status']; ?>">
 

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

        <button class="btn btn-success" name="update" value="<?php echo $res['id']; ?>">Update</button> 

        </form>
      </div>
    </div>
  </div>
  </div>
              </div>
              
             
           <?php  
         }
        }
         else{

               echo " <td>data not found</td>";
         }
     
     ?>

              </tbody>
       </table>
      </div>
    </div>


  

    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

     <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script> 
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


<script>
     jQuery(document).ready( function () {
          $('#myTable').DataTable();
      } );
    </script>

</body>
</html>





