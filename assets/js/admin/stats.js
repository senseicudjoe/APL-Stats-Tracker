$(document).ready(function () {
    // Initialize an empty object to track goal scorers
    let goalScorers = [];

    // Add Goal Scorer
    $('#addGoalScorer').on('click', function () {
        console.log("hello");
        const playerId = $('#player').val();
        const playerName = $('#player option:selected').text();
        const goals = parseInt($('#goals').val(), 10);

        // Validate input
        if (!playerId || isNaN(goals) || goals <= 0) {
            alert('Please select a valid player and enter a positive number of goals.');
            return;
        }

        // Check if player already exists in the goalScorers list
        const existingScorer = goalScorers.find(scorer => scorer.player_id === playerId);

        if (existingScorer) {
            // Update goals for the existing player
            existingScorer.goals += goals;
        } else {
            // Add a new player to the list
            goalScorers.push({ player_id: playerId, goals });
        }

        // Update the Goal Scorers UI
        updateGoalScorersUI();

        // Clear input fields
        $('#player').val('');
        $('#goals').val('');
    });

    // Remove Goal Scorer
    $('#goalScorers').on('click', '.btn-danger', function () {
        console.log(goalScorers);
        const playerId = $(this).data('player-id');

        // Remove the player from the goalScorers list
        goalScorers = goalScorers.filter(scorer => String(scorer.player_id) !== String(playerId));
        console.log(goalScorers);
        // Update the Goal Scorers UI
        updateGoalScorersUI();
    });

    // Update Goal Scorers UI
    function updateGoalScorersUI() {
        const goalScorersContainer = $('#goalScorers');
        goalScorersContainer.empty(); // Clear the container

        goalScorers.forEach(scorer => {
            const playerName = $(`#player option[value="${scorer.player_id}"]`).text();
            goalScorersContainer.append(`
                <div class="container rounded-3 color d-flex justify-content-between align-items-center mb-2" style="background-color: rgb(219, 216, 216);">
                    <p class="p-4 mb-0">${playerName} - ${scorer.goals} goals</p>
                    <button type="button" class="btn btn-danger btn-lg" data-player-id="${scorer.player_id}">Remove</button>
                </div>
            `);
        });
    }

    // Submit Match Data
    $('#submitMatch').on('click', function () {
        const matchData = {
            home_team: $('#home-options').val(),
            away_team: $('#away-options').val(),
            home_score: $('#homeScore').val(),
            away_score: $('#awayScore').val(),
            goal_scorers: JSON.stringify(goalScorers) // Pass goalScorers as JSON
        };

        $.ajax({
            url: '../../../src/functions/admin/stats/manageStats.php', // Path to the PHP script
            type: 'POST',
            data: matchData,
            success: function (response) {
                alert('Match and player statistics updated successfully!');
                console.log(response);
            },
            error: function (xhr, status, error) {
                console.error('Error:', error);
            }
        });
    });
});
