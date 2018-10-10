function pie_chart() {
 
 
var chart = new CanvasJS.Chart("piechart", {
	animationEnabled: true,
	title: {
		text: "Usage Share of Desktop Browsers"
	},
	subtitles: [{
		text: "November 2017"
	}],
	data: [{
		type: "pie",
		yValueFormatString: "#,##0.00\"%\"",
		indexLabel: "{label} ({y})",
		dataPoints: <?php echo json_encode($_SESSION['dataPoints'], JSON_NUMERIC_CHECK); ?>
	}]
});
window.onload = pie_chart;
chart.render();
}
