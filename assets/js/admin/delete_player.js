$(document).on('click', '.delete-btn', function() {
    // When any "Delete" button is clicked
        // Get the patient ID from the button's data-id attribute
        console.log("Button clicked");
    //   $('#myModal').modal('show');
        const patientId = $(this).data('id');
        console.log(patientId);
        $('#deleteConfirmationModal').modal('show');

    $('#confirmDeleteButton').on('click', function () {
        $.ajax({
            url: '../../../src/functions/admin/players/deletePlayer.php', // Your PHP script
            type: 'POST', // PHP often handles DELETE requests as POST for simplicity
            data: { id: patientId }, // Send the ID to the server
            success: function (response) {
                alert(response.message);
                $('#deleteConfirmationModal').modal('hide');

                // Remove the row from the table if successful
                if (response.success) {
                    $(`button[data-id="${patientId}"]`).closest('tr').remove();
                }
            },
            error: function (xhr, status, error) {
                alert("An error occured please try again");
            }
        });    
    });
});

