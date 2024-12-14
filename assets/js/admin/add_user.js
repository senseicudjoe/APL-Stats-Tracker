$(document).ready(function () {
    $('#addbtn').on('click', function () {
        $('#addModal').modal("show");   // Show the modal
        console.log("Button Clickeddd");
    });

    $('#savebtn').on('click', function() {
        const fname = $('#fname').val().trim(); 
        const lname = $('#lname').val().trim();
        const email = $('#email').val().trim();
        const role = $('#role-options').val();
        const password = $('#password').val().trim();
        const cpassword = $('#cpassword').val().trim();
        const formData = {
            fname: fname,
            lname: lname,
            email: email,
            role: role,
            password: password,
            cpassword: cpassword
        };

        if(!(password === cpassword)){
            alert("Passwords mismatch");
            return;
        }

        $.ajax({
            url: '../../../src/functions/admin/addUser.php', // Your PHP script
            type: 'POST', // PHP often handles DELETE requests as POST for simplicity
            data: formData, // Send the ID to the server
            success: function (response) {
                alert(response.message)
                $('#addModal').modal('hide');
                displayUsers();
            },
            error: function (xhr, status, error) {
                alert("An error occured please try again");
            }
        });          
           // Show the modal
    });
});


