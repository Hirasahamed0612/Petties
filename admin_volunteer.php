<?php

include 'db_connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   mysqli_query($conn, "DELETE FROM `volunteering_application_data` WHERE id = '$delete_id'") or die('query failed');
   header('location:admin_volunteer.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manage Users</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>
<body>
   
<?php include 'admin_header.php'; ?>

<div class="content">
   <h1 class="title">Volunteer Details</h1>
   <div class="table-container">
      <table>
         <thead>
            <tr>
               <th>User ID</th>
               <th>Username</th>
               <th>Email</th>
               <th>Phone Number</th>
               <th>Volunteering Area</th>
               <th>Joined Date</th>
               <th>Delete</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $select_users = mysqli_query($conn, "SELECT * FROM `volunteering_application_data`") or die('query failed');
               if (mysqli_num_rows($select_users) > 0){
                  while($fetch_users = mysqli_fetch_assoc($select_users)){
            ?>
            <tr>
               <td data-label="User ID"><?php echo $fetch_users['id']; ?></td>
               <td data-label="Username"><?php echo $fetch_users['name']; ?></td>
               <td data-label="Email"><?php echo $fetch_users['email']; ?></td>
               <td data-label="Phone Number"><?php echo $fetch_users['phone']; ?></td>
               <td data-label="Volunteering Area"><?php echo $fetch_users['volunteering_area']; ?></td>
               <td data-label="Joined Date"><?php echo $fetch_users['submission_date']; ?></td>
               <td data-label="Delete"><a href="admin_volunteer.php?delete=<?php echo $fetch_users['id']; ?>" onclick="return confirm('Delete this user?');" class="delete-btn"><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php
               }
            } else {
               echo '<tr><td colspan="7" class="empty">No users found!</td></tr>';
            }
            ?>
         </tbody>
      </table>
   </div>
</div>

<!-- admin js file link  -->
<script src="js/admin_script.js"></script>

</body>
</html>