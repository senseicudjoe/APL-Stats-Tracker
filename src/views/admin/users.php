<?php include "../../functions/admin/adminSession.php" ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../../../assets/css/nav.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<body>
    <div class="d-flex">
        <!-- Include Navbar -->
        <?php include '../../templates/navbar.php'; ?>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <div class="container bg-light p-3 rounded-3 shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="ps-2">MANAGE USERS</h1>
                    <a href="../../auth/logout.php" class="btn btn-dark btn-lg">Logout</a>
                </div> 
            </div>

            <div class="container bg-light p-3 mt-5 rounded-3 shadow">
                <table class="table fs-5">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Role</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- <tr>
                        <td>Mark Otto</td>
                        <td>mark.otto@gmail.com</td>
                        <td>Admin</td>
                        <td class = "text-center">
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#editModal"><span class="action-icon">✏️</span> Edit</button>
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"><span class="action-icon">🗑️</span> Remove</button>
                            <button type="button" class="btn btn-dark btn-lg"><span class="action-icon">📂</span> Open</button>
                        </td>
                        </tr>
                        <tr>
                        <td>Jacob Thornton</td>
                        <td>jacob.Thorton@gmail.com</td>
                        <td>Regular</td>
                        <td class = "text-center">
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#editModal"><span class="action-icon">✏️</span> Edit</button>
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"><span class="action-icon">🗑️</span> Remove</button>
                            <button type="button" class="btn btn-dark btn-lg"><span class="action-icon">📂</span> Open</button>
                        </td>
                        </tr>
                        <tr>
                        <td>Larry Bird</td>
                        <td>Larry.Bird@gmail.com</td>
                        <td>Regular</td>
                        <td class = "text-center">
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#editModal"><span class="action-icon">✏️</span> Edit</button>
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"><span class="action-icon">🗑️</span> Remove</button>
                            <button type="button" class="btn btn-dark btn-lg"><span class="action-icon">📂</span> Open</button>
                        </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <button type="button" class="btn btn-dark btn-lg mt-3" id="addbtn">Add New User</button>
        </div>


        

        
    </div>
<!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Edit User</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="myForm" action="#">
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="fname" class="form-label"><b>First Name*</b></label>
                                    <input type="text" id="edit-fname" class="form-control" placeholder="Enter first name" name="fname" >
                                </div>
                                <div class="col">
                                    <label for="lname" class="form-label"><b>Last Name*</b></label>
                                    <input type="text" id="edit-lname" class="form-control" placeholder="Enter last name" name="lname" >
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <label for="email" class="form-label"><b>Email*</b></label>
                                    <input type="email" id="edit-email" class="form-control" placeholder="Enter Email" name="email" >
                                </div>

                                <div class="col">
                                    <label for="role" class="form-label"><b>Role*</b></label>
                                    <select id="edit-role-options" name="role" class="form-select">
                                        <option value="">Select User Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="editSaveBtn">Save changes</button>
                    </div>
                </div>
            </div>
    </div>

<!-- Delete Modal -->

    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="deleteConfirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteConfirmationModalLabel">Confirm Deletion</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>To confirm deletion, type <strong>"DELETE"</strong> in the field below:</p>
                    <input type="text" id="confirmDeleteInput" class="form-control" placeholder="Type 'DELETE'" />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" id="confirmDeleteButton" class="btn btn-danger" disabled>Delete</button>
                </div>
            </div>
        </div>
    </div>

<!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Add User</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="addForm" action="#">
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="fname" class="form-label"><b>First Name*</b></label>
                                    <input type="text" id="fname" class="form-control" placeholder="Enter first name" name="fname" >
                                </div>
                                <div class="col">
                                    <label for="lname" class="form-label"><b>Last Name*</b></label>
                                    <input type="text" id="lname" class="form-control" placeholder="Enter last name" name="lname" >
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <label for="email" class="form-label"><b>Email*</b></label>
                                    <input type="email" id="email" class="form-control" placeholder="Enter Email" name="email" >
                                </div>

                                <div class="col">
                                    <label for="role" class="form-label"><b>Role*</b></label>
                                    <select id="role-options" name="role" class="form-select">
                                        <option value="">Select User Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">Regular</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <label for="password" class="form-label"><b>Password*</b></label>
                                    <input type="password" id="password" class="form-control" placeholder="Enter password" name="password" >
                                </div>
                                <div class="col">
                                    <label for="cpassword" class="form-label"><b>Last Name*</b></label>
                                    <input type="password" id="cpassword" class="form-control" placeholder="confirm password" name="cpassword" >
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="savebtn">Save changes</button>
                    </div>
                </div>
            </div>
    </div>
<!-- End of Modal -->


    <script>
        $(document).ready(function () {
            // Monitor the input field for changes
            $('#confirmDeleteInput').on('input', function () {
            const userInput = $(this).val(); // Get the current value of the input field
            const deleteButton = $('#confirmDeleteButton'); // Reference the Delete button

            // Check if the input matches "DELETE"
            if (userInput === 'DELETE') {
                deleteButton.prop('disabled', false); // Enable the button
            } else {
                deleteButton.prop('disabled', true); // Disable the button
            }
            });
        });
    </script>
    <script src="../../../assets/js/admin/get_users.js"></script>
    <script src="../../../assets/js/admin/add_user.js"></script>
    <script src="../../../assets/js/admin/edit_user.js"></script>
    <script src="../../../assets/js/admin/delete_user.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
