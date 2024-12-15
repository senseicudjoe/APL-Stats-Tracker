$(document).ready(function () {
    displayPlayers();
});


function displayPlayers() {
    // URL for JSON data (replace with your actual endpoint)
    const tableBody = $('#tableBody');
    const url = '../../../src/functions/admin/players/getPlayers.php';
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
            data.forEach(function (player) {
                const row = `
                    <tr>
                        <td>${player.names}</td>
                        <td>${player.team_names}</td>
                        <td>${player.goals}</td>
                        <td>${player.assists}</td>
                        <td class = "text-center">
                            <button type="button" class="btn btn-dark btn-lg edit-btn" data-id="${player.id}><span class="action-icon">✏️</span> Edit</button>
                            <button type="button" class="btn btn-dark btn-lg delete-btn" data-id="${player.id}><span class="action-icon">🗑️</span> Remove</button>
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


