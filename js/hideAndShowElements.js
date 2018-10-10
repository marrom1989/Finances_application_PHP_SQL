// show main content

$('#mainContent').css('display', 'none');
$('#mainContent').fadeIn(1000);

//show comment area

$('#comm').css('display', 'none');

for(var i=0; i<=17; i++){
    (function (e){
    $("#rad"+ e).click(function() { $('#comm').show("slow"); });
})(i);
}




