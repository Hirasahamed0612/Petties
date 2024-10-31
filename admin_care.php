<?php

include 'db_connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('location:admin_login.php');
};

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];
    
    $delete_query = "DELETE FROM `vet_booking_data` WHERE `id` = $delete_id";
    
    if (mysqli_query($conn, $delete_query)) {
        echo "<script>
            window.location.href = 'admin_care.php';
            alert('Booking deleted successfully.');
        </script>";
    } else {
        echo "<script>
            window.location.href = 'admin_care.php';
            alert('Failed to delete booking.');
        </script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Manage Bookings</title>
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" type="text/css" href="css/admin_style.css">
</head>
<body>
   <?php include 'admin_header.php'; ?>
   <div class="content">
      <h1 class="title">Bookings</h1>
      <div class="table-container">
         <table>
            <thead>
            <tr>
               <th>User ID</th>
               <th>Pet Name</th>
               <th>Owner Name</th>
               <th>Email</th>
               <th>Phone Number</th>
               <th>Location</th>
               <th>Date</th>
               <th>Time</th>
               <th>Service</th>
               <th>Delete</th>
            </tr>
         </thead>
         <tbody>
            <?php
               $select_care = mysqli_query($conn, "SELECT * FROM `vet_booking_data`") or die('Query failed');
               if (mysqli_num_rows($select_care) > 0){
                  while($fetch_care = mysqli_fetch_assoc($select_care)){
            ?>
            <tr>
               <td data-label="User ID"><?php echo $fetch_care['id']; ?></td>
               <td data-label="Pet Name"><?php echo $fetch_care['pet_name']; ?></td>
               <td data-label="Owner Name"><?php echo $fetch_care['owner_name']; ?></td>
               <td data-label="Email"><?php echo $fetch_care['email']; ?></td>
               <td data-label="Phone Number"><?php echo $fetch_care['phone']; ?></td>
               <td data-label="Location"><?php echo $fetch_care['location']; ?></td>
               <td data-label="Date"><?php echo $fetch_care['preferred_date']; ?></td>
               <td data-label="Time"><?php echo $fetch_care['preferred_time']; ?></td>
               <td data-label="Service"><?php echo $fetch_care['reason']; ?></td>
               <td data-label="Delete"><a href="admin_care.php?delete=<?php echo $fetch_care['id']; ?>" onclick="return confirm('Delete this booking?');" class="delete-btn"><i class="fas fa-trash-alt"></i></a></td>
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

<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
</body>
</html>