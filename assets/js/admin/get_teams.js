$(document).ready(function () {
    displayTeams();
});


function displayTeams() {
    // URL for JSON data (replace with your actual endpoint)
    const tableBody = $('#tableBody');
    const url = '../../../src/functions/admin/teams/getTeams.php';
    // AJAX request to fetch data
    $.ajax({
        url: url,
        type: 'GET', // HTTP method
        dataType: 'json', // Expecting JSON response
        success: function (data) {
            // Assuming `data` is an array of objects like [{id: 1, name: "John", email: "john@example.com"}]
            

            // Clear the existing table content
            tableBody.empty();

            // Loop through the data and populate the table
            data.forEach(function (team) {
                const row = `
                    <tr>
                        <td>${team.team_name}</td>
                        <td>${team.total_matches}</td>
                        <td>${team.total_wins}</td>
                        <td>${team.total_losses}</td>
                        <td>${team.total_draws}</td>
                        <td class = "text-center">
                            <button type="button" class="btn btn-dark btn-lg edit-btn" data-id="${team.team_id}><span class="action-icon">✏️</span> Edit</button>
                            <button type="button" class="btn btn-dark btn-lg delete-btn" data-id="${team.team_id}><span class="action-icon">🗑️</span> Remove</button>
                        </td>
                    </tr>
                `;
                tableBody.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}


