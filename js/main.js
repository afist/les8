$(".btn-main").click(function(event){
    event.preventDefault();

    var serializedData = $(this).parent().parent().serialize();
    $(this).css("display","none");
    $("#form").css("display","block");
    request = $.ajax({
        url: "form-send.php",
        type: "post",
        data: serializedData,
        success(a){
            $('#question').html(a);
        }
    });

})

 

$(".btn-form1").click(function(event){
    event.preventDefault();
    var serializedData = {answer:'yes'};
    request = $.ajax({
        url: "form-send.php",
        type: "post",
        data: serializedData,
        success(a){
            $('#question').html(a);
            checkText(a);

        }
    });

})

$(".btn-form2").click(function(event){
    event.preventDefault();
    var serializedData = {answer:'no'};
    request = $.ajax({
        url: "form-send.php",
        type: "post",
        data: serializedData,
        success(a){
            $('#question').html(a);
            checkText(a);
        }
    });

})
$(".btn-form3").click(function(event){
    event.preventDefault();
    var serializedData = {file:'yes'};
    request = $.ajax({
        url: "form-send.php",
        type: "post",
        data: serializedData,
        success(a){
            $('.hi').html(a);

        }
    });

})
function checkText(a){
    if (a.substr(0, 9) == "Pravilnux") {
        $(".btn-default").css("display","none");
        $(".btn-form3").css("display","block");
    }
}