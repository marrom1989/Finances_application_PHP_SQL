// timer

function timer()
{	
				var today = new Date();
		
				var day = today.getDate();
				if(day < 10) day = "0" + day;
				var month = today.getMonth() + 1;
				if(month < 10) month = "0" + month;
				var year = today.getFullYear();
				
				var hour = today.getHours();
				if(hour < 10) hour = "0" + hour;
				var minute = today.getMinutes();
				if(minute <10) minute = "0" + minute;
				var second = today.getSeconds();
				if(second < 10) second = "0" + second;
				
		$('#clock').html(year+"/"+month+"/"+day+" | "+hour+":"+minute+":"+second);
}
function SetInternetTimer(){
setInterval("timer()",1000);
}

$(window).on('load', SetInternetTimer());



