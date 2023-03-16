<?php
session_start();
require 'dbcon.php';
?>

<?php include('includes/header.php'); ?>

    
  <div class="container mt-5">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>EmployeeEdit
                        <a href="index.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>

                <div class="card-body">

                    <?php
                    if(isset($_GET['id']))
                    {
                        $employee_id = mysqli_real_escape_string($con, $_GET['id']);
                        $query = "SELECT * FROM employees WHERE id='$employee_id' ";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $employee = mysqli_fetch_array($query_run);
                            ?>

                    <form action="code.php" method="POST">
                        
                        <input type="hidden" name="employee_id" value="<?= $employee['id']; ?>">
                        
                        <div class="mb-3">
                        <lable>Employee Name</lable>
                        <input type="text" name="name" value="<?= $employee['name'];?>" class="form-control" required>
                        </div>
    
                        <div class="mb-3">
                        <lable>EmployeeEmployee Email</lable>
                        <input type="email" name="email" value="<?= $employee['email'];?>" class="form-control" required>
                        </div>
    
                        <div class="mb-3">
                        <lable>Employee Phone</lable>
                        <input type="text" name="phone" value="<?= $employee['phone'];?>" class="form-control"required>
                        </div>
    
                        <div class="mb-3">
                        <lable>Employee Address</lable>
                        <input type="text" name="address" value="<?= $employee['address'];?>" class="form-control" required>
                        </div>
    
                        <div class="mb-3">
                            <button type="submit" name="update_employee" class="btn btn-primary" required>
                                Update Employee
                            </button>
                        </div>
                    </form>
                            <?php

                        }
                        else
                        {
                            echo "<h4>No Such Id Found</h4>";
                        }

                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
  </div>

  <?php include('includes/footer.php'); ?>