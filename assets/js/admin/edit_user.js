$(document).on('click', '.edit-btn', function() {
    // When any "Delete" button is clicked
        // Get the patient ID from the button's data-id attribute
        console.log("Button clicked");
    //   $('#myModal').modal('show');
        const userId = $(this).data('id');
        console.log(userId);
        $.ajax({
            url: '../../../src/functions/admin/getUser.php?id=' + userId,  // Replace with your actual API endpoint
            method: 'GET',
            success: function(user) {
                console.log(user.first_name);
                // console.log(patient.doctor_name)
                // Populate the modal with the fetched patient data
                $('#edit-fname').val( user.first_name);
                $('#edit-lname').val( user.last_name);
                $('#edit-email').val(user.email);
                $('#edit-role-options').val(user.role);
                
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
            fname: $('#edit-fname').val().trim(),
            lname: $('#edit-lname').val().trim(),
            email: $('#edit-email').val().trim(),
            role: $('#edit-role-options').val(),
            user_id: userId
        };

        console.log(formData);
        if (!formData.fname || !formData.lname || !formData.email || !formData.role) {
            alert("Please fill out all fields.");
            return; // Stop execution if validation fails
        }

        $.ajax({
            url: '../../../src/functions/admin/editUser.php', // Your PHP script
            type: 'PUT', // PHP often handles DELETE requests as POST for simplicity
            contentType: 'application/json',
            data: JSON.stringify(formData), // Send the ID to the server
            success: function (response) {
                alert(response.message)
                $('#editModal').modal('hide');
                displayUsers();
            },
            error: function (xhr, status, error) {
                alert("An error occured please try again later");
            }
        });    
    });
});

