$(document).on('click', '.edit-btn', function() {
    // When any "Delete" button is clicked
        // Get the patient ID from the button's data-id attribute
        console.log("Button clicked");
    //   $('#myModal').modal('show');
        const playerId = $(this).data('id');
        console.log(playerId);
        $.ajax({
            url: '../../../src/functions/admin/teams/getTeam.php?id=' + playerId,  // Replace with your actual API endpoint
            method: 'GET',
            success: function(user) {
                // console.log(user.first_name);
                // console.log(patient.doctor_name)
                // Populate the modal with the fetched patient data
                $('#name').val( user.team_name);
                $('#year').val( user.founded_year);
                $('#noMatches').val(user.total_matches);
                $('#wins').val(user.total_wins);
                $('#loss').val(user.total_losses);
                $('#draws').val(user.total_draws);                 
                // Show the modal
                $('#editModal').modal('show');
            },
            error: function(xhr, status, error) {
                // Handle any errors here (e.g., show an error message)
                alert('Error fetching patient data: ' + error);
            }
        });

    $('#editSaveBtn').on('click', function () {
        const formData = {
            team_name: $('#name').val().trim(),
            year: $('#year').val().trim(),
            matches: $('#noMatches').val().trim(),
            wins: $('#wins').val(),
            losses: $('#loss').val(),
            draw: $('#draws').val(),
            id: playerId
        };

        console.log(formData);
        if (!formData.team_name || !formData.year || !formData.matches || !formData.wins|| !formData.losses|| !formData.draw) {
            alert("Please fill out all fields.");
            return; // Stop execution if validation fails
        }

        $.ajax({
            url: '../../../src/functions/admin/teams/editTeam.php', // Your PHP script
            type: 'PUT', // PHP often handles DELETE requests as POST for simplicity
            contentType: 'application/json',
            data: JSON.stringify(formData), // Send the ID to the server
            success: function (response) {
                alert(response.message)
                $('#editModal').modal('hide');
                displayTeams();
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
                alert("An error occured please try again later");
            }
        });    
    });
});

