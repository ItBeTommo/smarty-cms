
    $("#wait").hide();

$("#register-form").submit(function(event){
    $("#wait").show();
    event.preventDefault();
    var postedData = $(this).serializeArray();
//        console.log(postedData);
    $.ajax({
        type: "POST",
        url: "back-end/send-registration.php",
        data: postedData,
        success: function(data){
            if (data){
                $("#wait").hide();
                $("#register-msg").html(data);
            }
        },
        error: function() {
            $("#register-msg").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Try again later.</div>");
        }
    });

});

$("#login-form").submit(function(event){
    $("#wait").show();
    event.preventDefault();
    var postedData = $(this).serializeArray();
//        console.log(postedData);
    $.ajax({
        type: "POST",
        url: "back-end/send-login.php",
        data: postedData,
        success: function(data){
            if (data == "success"){
                $("#wait").hide();
                $("#login-msg").html(data);
                window.location = "dashboard.php";
            } else {
                $("#login-msg").html(data);
            }
        },
        error: function() {
            $("#login-msg").html("<div class='alert alert-danger'>There was an error with the Ajax Call. Try again later.</div>");
                $("#wait").hide();
        }
    });

});



