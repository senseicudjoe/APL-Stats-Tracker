$(document).ready(function () {
    $('#addbtn').on('click', function () {
        $('#addModal').modal("show");   // Show the modal
        console.log("Button Clickeddd");
    });

    $('#asavebtn').on('click', function() {
        const fname = $('#afname').val().trim(); 
        const lname = $('#alname').val().trim();
        const position = $('#aposition-options').val();
        const jersey = $('#ajerseyNo').val().trim();
        const dob = $('#aDoB').val().trim();
        const team = $('#ateam-options').val();
        const formData = {
            fname: fname,
            lname: lname,
            position: position,
            jersey: jersey,
            dob: dob,
            team: team
        };

        $.ajax({
            url: '../../../src/functions/admin/players/addPlayer.php', // Your PHP script
            type: 'POST', // PHP often handles DELETE requests as POST for simplicity
            data: formData, // Send the ID to the server
            success: function (response) {
                alert(response.message)
                $('#addModal').modal('hide');
                displayPlayers();
            },
            error: function (xhr, status, error) {
                alert("An error occured please try again");
            }
        });          
           // Show the modal
    });
});


