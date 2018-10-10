// timer

function clock() {
    $.ajax({
       
            $('#clock').html(data);
			setTimeout("clock()",1000);
        
    });
}
window.onload = timer;

