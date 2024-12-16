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
                    <h1 class="ps-2">MANAGE TEAMS</h1>
                    <button type="button" class="btn btn-dark btn-lg">Logout</button>
                </div> 
            </div>

            <div class="container bg-light p-3 mt-5 rounded-3 shadow">
                <table class="table fs-5">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">Team Name</th>
                            <th scope="col">Matches Played</th>
                            <th scope="col">Wins</th>
                            <th scope="col">Loses</th>
                            <th scope="col">Draws</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody id="tableBody">
                        <!-- <tr>
                        <th scope="row">1</th>
                        <td>Legends</td>
                        <td>12</td>
                        <td>2</td>
                        <td>10</td>
                        <td class = "text-center">
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#editModal"><span class="action-icon">✏️</span> Edit</button>
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"><span class="action-icon">🗑️</span> Remove</button>
                            <button type="button" class="btn btn-dark btn-lg"><span class="action-icon">📂</span> Open</button>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>HIghlanders</td>
                        <td>13</td>
                        <td>10</td>
                        <td>3</td>
                        <td class = "text-center">
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#editModal"><span class="action-icon">✏️</span> Edit</button>
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"><span class="action-icon">🗑️</span> Remove</button>
                            <button type="button" class="btn btn-dark btn-lg"><span class="action-icon">📂</span> Open</button>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td>Red Army</td>
                        <td>12</td>
                        <td>5</td>
                        <td>7</td>
                        <td class = "text-center">
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#editModal"><span class="action-icon">✏️</span> Edit</button>
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"><span class="action-icon">🗑️</span> Remove</button>
                            <button type="button" class="btn btn-dark btn-lg"><span class="action-icon">📂</span> Open</button>
                        </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>

            <button type="button" id="addbtn" class="btn btn-dark btn-lg mt-3">Add New Team</button>
        </div>


        

        
    </div>
<!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Edit Teams</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="myForm" action="#">
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="name" class="form-label"><b>Team Name*</b></label>
                                    <input type="text" id="name" class="form-control" placeholder="Enter team name" name="fname" >
                                </div>
                                <div class="col">
                                    <label for="year" class="form-label"><b>Founded Year*</b></label>
                                    <input type="number" id="year" min="1900" max="2100" class="form-control" placeholder="Enter year team was founded" name="lname" >
                                </div>
                                <div class="col">
                                    <label for="noMatches" class="form-label"><b>Matches Played*</b></label>
                                    <input type="number" id="noMatches" min="0" class="form-control"  name="noMatches" >
                                </div>
                            </div>

                            <div class="row mt-4">
                                
                                <div class="col">
                                    <label for="wins" class="form-label"><b>Wins*</b></label>
                                    <input type="number" id="wins" min="0" class="form-control"  name="wins" >
                                </div>

                                <div class="col">
                                    <label for="role" class="form-label"><b>Loses*</b></label>
                                    <input type="number" id="loss" min="0" class="form-control"  name="loss" >
                                </div>
                                <div class="col">
                                    <label for="draws" class="form-label"><b>Draws*</b></label>
                                    <input type="number" id="draws" min="0" class="form-control"  name="noMatches" >
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
                        <h3 class="modal-title" id="exampleModalLabel">Edit Teams</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="myForm" action="#">
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="aname" class="form-label"><b>Team Name*</b></label>
                                    <input type="text" id="aname" class="form-control" placeholder="Enter team name" name="fname" >
                                </div>
                                <div class="col">
                                    <label for="ayear" class="form-label"><b>Founded Year*</b></label>
                                    <input type="number" id="ayear" min="1900" max="2100" class="form-control" placeholder="Enter year team was founded" name="lname" >
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success" id="asavebtn">Save</button>
                    </div>
                </div>
            </div>
    </div>
<!-- End Modals -->
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
    <script src="../../../assets/js/admin/get_teams.js"></script>
    <script src="../../../assets/js/admin/add_team.js"></script>
    <script src="../../../assets/js/admin/edit_team.js"></script>
    <script src="../../../assets/js/admin/delete_team.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
