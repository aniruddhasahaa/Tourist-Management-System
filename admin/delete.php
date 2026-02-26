<?php
    if(isset($_GET['pid'])) {
        $id = $_GET['pid'];
        
        // Perform your delete operation using $id
        // For example, using SQL with a database connection:
        include '../conf.php'; // Include your database connection
        
        // Assuming your table name is 'your_table'
        $sql = "DELETE FROM `tbltourpackages` WHERE PackageId=$id";
        
        if(mysqli_query($conn,$sql)){
           
            header('Location: manage-packages.php?Delete_Successful');
        }
        else{
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "No ID provided for deletion.";
    }
?>