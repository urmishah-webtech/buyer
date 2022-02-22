// Header search bar js

$('.header-search-btn').click(function(){
    $('.header-search-bar').addClass("open-search-bar");
});
$('.search-close-btn').click(function(){
    $('.header-search-bar').removeClass("open-search-bar");
});

Chart.pluginService.register({
    beforeDraw: function (chart) {
        var width = chart.chart.width,
            height = chart.chart.height,
            ctx = chart.chart.ctx;
        ctx.restore();
        var fontSize = (height / 114).toFixed(2);
        ctx.font = fontSize + "em sans-serif";
        ctx.textBaseline = "middle";
        var text = chart.config.options.elements.center.text,
            textX = Math.round((width - ctx.measureText(text).width) / 2),
            textY = height / 2;
        ctx.fillText(text, textX, textY);
        ctx.save();
    }
});

var chartData = [{"visitor": 39, "visit": 1}, {"visitor": 18, "visit": 2}, {"visitor": 9, "visit": 3}, {"visitor": 5, "visit": 4}, {"visitor": 6, "visit": 5}, {"visitor": 5, "visit": 6}, {"visitor": 98, "visit": 6}]

var visitorData = [],
    sum = 0,
    visitData = [];

for (var i = 0; i < chartData.length; i++) {
    visitorData.push(chartData[i]['visitor'])
    visitData.push(chartData[i]['visit'])
  
    sum += chartData[i]['visitor'];
}

var textInside = sum.toString();

var myChart = new Chart(document.getElementById('mychart'), {
    type: 'doughnut',
    animation:{
        animateScale:true
    },
    data: {
        labels: visitData,
        datasets: [{
            label: 'Visitor',
            data: visitorData,
            backgroundColor: [
                "#a2d6c4",
                "#36A2EB",
                "#3e8787",
                "#579aac",
                "#7dcfe8",
                "#b3dfe7",
                "#CDDC39"
            ]
        }]
    },
    options: {
        elements: {
          center: {
            text: textInside
          }
        },
        responsive: true,
        legend: false,
        legendCallback: function(chart) {
            var legendHtml = [];
            legendHtml.push('<ul>');
            var item = chart.data.datasets[0];
            for (var i=0; i < item.data.length; i++) {
                legendHtml.push('<li>');
                legendHtml.push('<span class="chart-legend" style="background-color:' + item.backgroundColor[i] +'"></span>');
                legendHtml.push('<span class="chart-legend-label-text">' + item.data[i] + ' person - '+chart.data.labels[i]+' times</span>');
                legendHtml.push('</li>');
            }

            legendHtml.push('</ul>');
            return legendHtml.join("");
        },
        tooltips: {
             enabled: true,
             mode: 'label',
             callbacks: {
                label: function(tooltipItem, data) {
                    var indice = tooltipItem.index;
                    return data.datasets[0].data[indice] + " person visited " + data.labels[indice] + ' times';
                }
             }
         },
    }
});

$('#my-legend-con').html(myChart.generateLegend());

console.log(document.getElementById('my-legend-con'));

		
		
