<?php
    session_start();
    require 'dbcon.php';
?>

<?php include('includes/header.php'); ?>
  <div class="container mt-4">
    <?php 
    include('message.php');
    ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employee Details
                        <a href="employee-create.php" class="btn btn-primary float-end">Add Employees</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Employee Name</th>
                                <th>Email</th>
                                <th>PhoneNo</th>
                                <th>Address</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $query ="SELECT * FROM employees";
                                $query_run = mysqli_query($con,$query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $employee)
                                    {
                                      
                                      ?>
                                        <tr>
                                            <td><?= $employee['id']; ?></td>
                                            <td><?= $employee['name']; ?></td>
                                            <td><?= $employee['email']; ?></td>
                                            <td><?= $employee['phone']; ?></td>
                                            <td><?= $employee['address']; ?></td>
                                            <td>
                                                <a href="employee-view.php?id=<?= $employee['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="employee-edit.php?id=<?= $employee['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline">
                                                <button type="submit" name="delete_employee" value="<?=$employee['id']; ?>" class="btn btn-danger btn-sm">Delete</a>
                                                </form>
                                            </td>


                                        </tr>

                                        <?php
                                    }

                                }
                                else
                                {
                                    echo "<h5> No Record Founs</h5>";
                                }

                            ?>
                            
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
  </div>
    
  <?php include('includes/footer.php'); ?>