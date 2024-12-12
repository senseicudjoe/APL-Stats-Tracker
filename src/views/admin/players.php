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
</head>
<body>
    <div class="d-flex">
        <!-- Include Navbar -->
        <?php include '../../templates/navbar.php'; ?>

        <!-- Main Content -->
        <div class="flex-grow-1 p-4">
            <div class="container bg-light p-3 rounded-3 shadow">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="ps-2">MANAGE PLAYERS</h1>
                    <button type="button" class="btn btn-dark btn-lg">Logout</button>
                </div> 
            </div>

            <div class="container bg-light p-3 mt-5 rounded-3 shadow">
                <table class="table fs-5">
                    <thead class="table-secondary">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Player Name</th>
                            <th scope="col">Team</th>
                            <th scope="col">Goals</th>
                            <th scope="col">Assists</th>
                            <th scope="col" class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td>Kevin Cudjoe</td>
                        <td>HIghlanders</td>
                        <td>5</td>
                        <td>2</td>
                        <td class = "text-center">
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#editModal"><span class="action-icon">✏️</span> Edit</button>
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"><span class="action-icon">🗑️</span> Remove</button>
                            <button type="button" class="btn btn-dark btn-lg"><span class="action-icon">📂</span> Open</button>
                        </td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>Papa Nhyira</td>
                        <td>Kasanoma</td>
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
                        <td>Mohammed Kudus</td>
                        <td>Red Army</td>
                        <td>5</td>
                        <td>7</td>
                        <td class = "text-center">
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#editModal"><span class="action-icon">✏️</span> Edit</button>
                            <button type="button" class="btn btn-dark btn-lg" data-bs-toggle="modal" data-bs-target="#deleteConfirmationModal"><span class="action-icon">🗑️</span> Remove</button>
                            <button type="button" class="btn btn-dark btn-lg"><span class="action-icon">📂</span> Open</button>
                        </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <button type="button" class="btn btn-success btn-lg mt-3" data-bs-toggle="modal" data-bs-target="#editModal">Add New User</button>
        </div>


        

        
    </div>
<!-- Edit Modal -->
    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Edit Players</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" id="myForm" action="#">
                            <div class="row mt-4">
                                <div class="col">
                                    <label for="fname" class="form-label"><b>First Name*</b></label>
                                    <input type="text" id="fname" class="form-control" placeholder="Enter player first name" name="fname" >
                                </div>
                                <div class="col">
                                    <label for="lname" class="form-label"><b>Last Name*</b></label>
                                    <input type="text" id="lname" class="form-control" placeholder="Enter player last name" name="lname" >
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <label for="position" class="form-label"><b>Position*</b></label>
                                    <select id="position-options" name="positions" class="form-select">
                                        <option value="">Select Player Position</option>
                                        <option value="CB">CB</option>
                                        <option value="RB">RB</option>
                                        <option value="ST">ST</option>
                                        <option value="LW">LW</option>
                                        <option value="RW">RW</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <label for="jerseyNo" class="form-label"><b>Jersey Number*</b></label>
                                    <input type="number" id="jerseyNo" min="0" class="form-control"  name="jerseyNo" >
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <label for="DoB" class="form-label"><b>Date of Birth*</b></label>
                                    <input type="date" id="DoB" class="form-control"  name="DoB" >
                                </div>
                                <div class="col">
                                    <label for="country" class="form-label"><b>Nationality</b></label>
                                    <select id="country-options" name="country-options" class="form-select">
                                        <option value="">Select Nationality</option>
                                        <option value="Ghana">Ghana</option>
                                        <option value="Togo">Togo</option>
                                        <option value="Nigeria">Nigeria</option>
                                        <option value="South Africa">South Africa</option>
                                        <option value="United Kingdom">United Kingdom</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col">
                                    <label for="position" class="form-label"><b>Matches Played*</b></label>
                                    <input type="number" id="noMatches" min="0" class="form-control"  name="noMatches" >
                                </div>
                                <div class="col">
                                    <label for="goals" class="form-label"><b>Goals*</b></label>
                                    <input type="number" id="goals" min="0" class="form-control"  name="goals" >
                                </div>

                                <div class="col">
                                    <label for="assists" class="form-label"><b>Assists*</b></label>
                                    <input type="number" id="assists" min="0" class="form-control"  name="assists" >
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-success">Save changes</button>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>