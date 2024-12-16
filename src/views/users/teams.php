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
        <?php include '../../templates/userNavbar.php'; ?>

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
        </div>


        

        
    </div>

    <script src="../../../assets/js/user/get_teams.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
