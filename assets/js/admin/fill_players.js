$(document).ready(function() {
    let url;
    function fetchPlayers(homeTeam, awayTeam) {
        if (homeTeam && awayTeam) {
            console.log(url)
            $.ajax({
                url: url, // URL to the PHP script
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Populate the select tag
                    const select = $('#player');
                    data.forEach(function(player) {
                        const option = `<option value="${player.player_id}">${player.player_name}(${player.team_name})</option>`;
                        select.append(option);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("An error occurred: " + error);
                }
            });
        }
    }

    // Event listeners for home and away options
    $('#home-options, #away-options').change(function() {
        const homeTeam = $('#home-options').val();
        const awayTeam = $('#away-options').val();
        url = '../../../src/functions/admin/stats/getPlayers.php?id1='+homeTeam+"&id2="+awayTeam;
        fetchPlayers(homeTeam, awayTeam); // Fetch players based on selections
    });
    // Fetch data from the PHP script
});