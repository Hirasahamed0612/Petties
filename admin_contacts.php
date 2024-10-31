<?php

include 'db_connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `contact` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_contacts.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manage Inquires</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>
<body>
   
<?php include 'admin_header.php'; ?>

<div class="content">
   <h1 class="title">Inquires</h1>
 <div class="table-container">
         <table>
            <thead>
            <tr>
               <th>User ID</th>
               <th>Name</th>
               <th>Email</th>
               <th>Phone Number</th>
               <th>Inquire</th>
               <th>Delete</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $select_inquires = mysqli_query($conn, "SELECT * FROM `contact`") or die('Query failed');
               if (mysqli_num_rows($select_inquires) > 0){
                  while($fetch_inquires = mysqli_fetch_assoc($select_inquires)){
            ?>
            <tr>
               <td data-label="User ID"><?php echo $fetch_inquires['id']; ?></td>
               <td data-label="Pet Name"><?php echo $fetch_inquires['name']; ?></td>
               <td data-label="Email"><?php echo $fetch_inquires['email']; ?></td>
               <td data-label="Phone Number"><?php echo $fetch_inquires['phone']; ?></td>
               <td data-label="Inquire"><?php echo $fetch_inquires['details']; ?></td>
               <td data-label="Delete"><a href="admin_contacts.php?delete=<?php echo $fetch_inquires['id']; ?>" onclick="return confirm('Delete this inquire?');" class="delete-btn"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php
               }
            } else {
               echo '<tr><td colspan="10" class="empty">No users found!</td></tr>';
            }
            ?>
         </tbody>
      </table>
   </div>
   </div>
<?php
$conn->close();
?>
<!-- admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>