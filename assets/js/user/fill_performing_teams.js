$(document).ready(function () {
    displayPerformingTeams();
    displayPerformingPlayers();
});


function displayPerformingTeams() {
    // URL for JSON data (replace with your actual endpoint)
    const list = $('#list');
    const url = '../../../src/functions/user/getTopPerformingTeams.php';
    // AJAX request to fetch data
    $.ajax({
        url: url,
        type: 'GET', // HTTP method
        dataType: 'json', // Expecting JSON response
        success: function (data) {
            // Assuming `data` is an array of objects like [{id: 1, name: "John", email: "john@example.com"}]
            

            // Clear the existing table content
            list.empty();

            // Loop through the data and populate the table
            data.forEach(function (team,index) {
                const row = `
                    <li class="list-group-item team-rank py-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-success me-3">${index + 1}</span>
                                <strong class="me-3">${team.team_name}</strong>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-dark fs-5 me-3">${team.total_wins} wins</span>
                                <div class="performance-container" style="width: 150px;">
                                    <div class="performance-bar bg-success" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                `;
                list.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}

function displayPerformingPlayers() {
    // URL for JSON data (replace with your actual endpoint)
    const list = $('#player_list');
    const url = '../../../src/functions/user/getTopPerformingPlayers.php';
    // AJAX request to fetch data
    $.ajax({
        url: url,
        type: 'GET', // HTTP method
        dataType: 'json', // Expecting JSON response
        success: function (data) {
            // Assuming `data` is an array of objects like [{id: 1, name: "John", email: "john@example.com"}]
            

            // Clear the existing table content
            list.empty();

            // Loop through the data and populate the table
            data.forEach(function (player,index) {
                const row = `
                    <li class="list-group-item team-rank py-3">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="d-flex align-items-center">
                                <span class="badge bg-success me-3">${index + 1}</span>
                                <strong class="me-3">${player.name}</strong>
                            </div>
                            <div class="d-flex align-items-center">
                                <span class="badge bg-dark fs-5 me-3 badgem">${player.goals} goals</span>
                                <div class="performance-container" style="width: 150px;">
                                    <div class="performance-bar bg-success" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                    </li>
                `;
                list.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}


