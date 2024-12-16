$(document).ready(function () {
    displayMatches();
});


function displayMatches() {
    // URL for JSON data (replace with your actual endpoint)
    const div = $('#getMaches');
    const url = '../../../src/functions/user/getMatches.php';
    // AJAX request to fetch data
    $.ajax({
        url: url,
        type: 'GET', // HTTP method
        dataType: 'json', // Expecting JSON response
        success: function (data) {
            // Assuming `data` is an array of objects like [{id: 1, name: "John", email: "john@example.com"}]
            

            // Clear the existing table content
            div.empty();

            // Loop through the data and populate the table
            data.forEach(function (team) {
                const row = `
                    <div class="list-group-item match-item py-3">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="text-start w-25">
                                <strong>${team.home_team}</strong>
                            </div>
                            <div class="text-center">
                                <span class="badge bg-secondary fs-5">${team.home_team_score} - ${team.away_team_score}</span>
                            </div>
                            <div class="text-end w-25">
                                <strong>${team.away_team}</strong>
                            </div>
                        </div>
                        <div class="text-center mt-2">
                            <small class="text-muted">Full Time</small>
                        </div>
                    </div>
                `;
                div.append(row);
            });
        },
        error: function (xhr, status, error) {
            console.error('Error fetching data:', error);
        }
    });
}


