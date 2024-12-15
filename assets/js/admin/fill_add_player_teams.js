$(document).ready(function() {
    // Fetch data from the PHP script
    const url = '../../../src/functions/admin/stats/getTeams.php';
    $.ajax({
        url: url, // URL to the PHP script
        type: 'GET',
        dataType: 'json',
        success: function(data) {
            // Populate the select tag
            const select = $('#ateam-options');
            data.forEach(function(team) {
                const option = `<option value="${team.team_id}">${team.team_name}</option>`;
                select.append(option);
            });
        },
        error: function(xhr, status, error) {
            console.error("An error occurred: " + error);
        }
    });
});