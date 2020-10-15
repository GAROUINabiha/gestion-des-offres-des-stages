var url="apis/statistique1.php";


$.ajax({
  url: url,
  method: "GET",
  data: {},
  async: false,
  dataType: "json",
  success:function(data){
    console.log(data);
    Highcharts.chart('container', {

      title: {
        text: 'Les nombres des employés selon leurs emplois ,2018-2017'
      },

     
      yAxis: {
        title: {
          text: 'Nombre des employés'
        }
      },
      legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'middle'
      },

      plotOptions: {
        series: {
          label: {
            connectorAllowed: false
          },
          pointStart: 2017
        }
      },

      series: [{
        name: 'plombérie',
        data: [0,4500]
      }, {
        name: 'électricité',
        data: [0,2916]
      }, {
        name: 'dépannage informatique',
        data: [0,1744]
      }, {
        name: 'peintre',
        data: [0,4600]
      }, {
        name: 'autre',
        data: [0,1]
      }],

      responsive: {
        rules: [{
          condition: {
            maxWidth: 5
          },
          chartOptions: {
            legend: {
              layout: 'horizontal',
              align: 'center',
              verticalAlign: 'bottom'
            }
          }
        }]
      }

    });


  }
});

