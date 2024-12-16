$(document).on('click', '.edit-btn', function() {
    // When any "Delete" button is clicked
        // Get the patient ID from the button's data-id attribute
        console.log("Button clicked");
    //   $('#myModal').modal('show');
        const playerId = $(this).data('id');
        console.log(playerId);
        $.ajax({
            url: '../../../src/functions/admin/players/getPlayer.php?id=' + playerId,  // Replace with your actual API endpoint
            method: 'GET',
            success: function(user) {
                // console.log(user.first_name);
                // console.log(patient.doctor_name)
                // Populate the modal with the fetched patient data
                $('#fname').val( user.first_name);
                $('#lname').val( user.last_name);
                $('#position-options').val(user.position);
                $('#jerseyNo').val(user.jersey_number);
                $('#DoB').val(user.date_of_birth);
                $('#team-options').val(user.team_id);
                $('#noMatches').val(user.games_played);
                $('#goals').val(user.goals);
                $('#assists').val(user.assists);                 
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
            fname: $('#fname').val().trim(),
            lname: $('#lname').val().trim(),
            position: $('#position-options').val().trim(),
            jersey: $('#jerseyNo').val(),
            DoB: $('#DoB').val(),
            team_id: $('#team-options').val(),
            total_matches: $('#noMatches').val(),
            goals: $('#goals').val(),
            assists: $('#assists').val(),
            id: playerId
        };

        console.log(formData);
        if (!formData.fname || !formData.lname || !formData.position || !formData.jersey|| !formData.DoB|| !formData.team_id|| !formData.total_matches|| !formData.goals|| !formData.assists|| !formData.id) {
            alert("Please fill out all fields.");
            return; // Stop execution if validation fails
        }

        $.ajax({
            url: '../../../src/functions/admin/players/editPlayer.php', // Your PHP script
            type: 'PUT', // PHP often handles DELETE requests as POST for simplicity
            contentType: 'application/json',
            data: JSON.stringify(formData), // Send the ID to the server
            success: function (response) {
                alert(response.message);
                $('#editModal').modal('hide');
                displayPlayers();
            },
            error: function (xhr, status, error) {
                console.error("Error:", error);
                alert("An error occured please try again later");
            }
        });    
    });
});

