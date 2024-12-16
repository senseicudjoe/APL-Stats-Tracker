$(document).ready(function () {
    $('#addbtn').on('click', function () {
        $('#addModal').modal("show");   // Show the modal
        console.log("Button Clickeddd");
    });

    $('#asavebtn').on('click', function() {
        const name = $('#aname').val().trim(); 
        const year = $('#ayear').val().trim();
        const formData = {
            name: name,
            year: year
        };

        $.ajax({
            url: '../../../src/functions/admin/teams/addTeam.php', // Your PHP script
            type: 'POST', // PHP often handles DELETE requests as POST for simplicity
            data: formData, // Send the ID to the server
            success: function (response) {
                alert(response.message)
                $('#addModal').modal('hide');
                displayTeams();
            },
            error: function (xhr, status, error) {
                alert("An error occured please try again");
            }
        });          
           // Show the modal
    });
});


