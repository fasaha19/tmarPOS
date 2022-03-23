// window.onload = function () {
 

//  $.ajax({  
//    url: 'sadash/getSaleData', 
//    method:"POST",  
//    data:{p_id:1},  
//    dataType:"json", 
//    success:function(data)  
//    {  
//     var chart = new CanvasJS.Chart("chartContainer", {
//       animationEnabled: true,
//       title:{
//         text: "Company Revenue by Year"
//       },
//       axisY: {
//         title: "Revenue in USD",
//         valueFormatString: "#0,,.",
//         suffix: "mn",
//         prefix: "$"
//       },
//       data: [{
//         type: "spline",
//         markerSize: 5,
//         xValueFormatString: "YYYY",
//         yValueFormatString: "$#,##0.##",
//         xValueType: "dateTime",
//         dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
//       }]
//     });
     
//       chart.render();


//       }  
//   });
// }

function orderchart(argument) {
  // body...
   var orderschart = document.getElementById('orders');
  
          var myLineChart = new Chart(orderschart, {
              type: 'line',
              data:{ 
              labels:orderdate, // responsible for how many bars are gonna show on the chart
            // create 12 datasets, since we have 12 items
            // data[0] = labels[0] (data for first bar - 'Standing costs') | data[1] = labels[1] (data for second bar - 'Running costs')
            // put 0, if there is no data for the particular bar
                datasets: [{
                   label: 'Orders',
                   data: totalorder,
                   fill: false,
                   borderColor: "rgba(75,192,192,1)",
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderCapStyle: 'butt',
                  borderJoinStyle: 'miter',
                  pointBorderColor: "rgba(75,192,192,1)",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(75,192,192,1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)'
                }]
            },
          });
}
function userchart(argument) {
  // body...
   var userschart = document.getElementById('users');
  
          var myLineChart = new Chart(userschart, {
              type: 'line',
              data:{ 
              labels:userdate, // responsible for how many bars are gonna show on the chart
            // create 12 datasets, since we have 12 items
            // data[0] = labels[0] (data for first bar - 'Standing costs') | data[1] = labels[1] (data for second bar - 'Running costs')
            // put 0, if there is no data for the particular bar
                datasets: [{
                   label: 'Users',
                   data: totaluser,
                   fill: false,
                   borderColor: "rgba(75,192,192,1)",
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderCapStyle: 'butt',
                  borderJoinStyle: 'miter',
                  pointBorderColor: "rgba(75,192,192,1)",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(75,192,192,1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)'
                }]
            },
          });
}

function amntchart(argument) {
  // body...
   var amntschart = document.getElementById('amount');
  
          var myLineChart = new Chart(amntschart, {
              type: 'line',
              data:{ 
              labels:amntdate, // responsible for how many bars are gonna show on the chart
            // create 12 datasets, since we have 12 items
            // data[0] = labels[0] (data for first bar - 'Standing costs') | data[1] = labels[1] (data for second bar - 'Running costs')
            // put 0, if there is no data for the particular bar
                datasets: [{
                   label: 'Amount ₹',
                   data: totalamnt,
                   fill: false,
                   borderColor: "rgba(75,192,192,1)",
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderCapStyle: 'butt',
                  borderJoinStyle: 'miter',
                  pointBorderColor: "rgba(75,192,192,1)",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(75,192,192,1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)'
                }],
            },
          });
}
function feedbackchart(argument) {
  // body...
   var feedbackschart = document.getElementById('feedback');
  
          var myLineChart = new Chart(feedbackschart, {
              type: 'line',
              data:{ 
              labels:feeddate, // responsible for how many bars are gonna show on the chart
            // create 12 datasets, since we have 12 items
            // data[0] = labels[0] (data for first bar - 'Standing costs') | data[1] = labels[1] (data for second bar - 'Running costs')
            // put 0, if there is no data for the particular bar
                datasets: [{
                   label: 'Feedbacks',
                   data: totalfeed,
                   fill: false,
                   borderColor: "rgba(75,192,192,1)",
                  borderDash: [],
                  borderDashOffset: 0.0,
                  borderCapStyle: 'butt',
                  borderJoinStyle: 'miter',
                  pointBorderColor: "rgba(75,192,192,1)",
                  pointBackgroundColor: "#fff",
                  pointBorderWidth: 1,
                  pointHoverRadius: 5,
                  pointHoverBackgroundColor: "rgba(75,192,192,1)",
                  pointHoverBorderColor: "rgba(220,220,220,1)",
                  pointHoverBorderWidth: 2,
                  pointRadius: 1,
                  pointHitRadius: 10,
                  backgroundColor: 'rgba(54, 162, 235, 0.2)'
                }],
            },
          });
}
$(document).ready(function(){
    $.ajax({  
     url: 'getSaleData', 
     method:"POST",  
     data:{p_id:1},  
     dataType:"json", 
     success:function(datas)  
     {  
      console.log(datas);
      var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        title:{
          text: "Customer This Week"
        },
        axisY: {
          title: "No. Of Customer",
          valueFormatString: "",
          suffix: "",
          prefix: ""
        },
        data: [{
          type: "column",
          markerSize: 6,
          xValueFormatString: "DD-MM-YYYY",
          yValueFormatString: "",
          xValueType: "dateTime",
          dataPoints: datas
        }]
      });
       
        chart.render();


        }  
    });
    $.ajax({  
     url: 'getSaleDataTotVal', 
     method:"POST",  
     data:{p_id:1},  
     dataType:"json", 
     success:function(datas)  
     {  
      console.log(datas);
      var chart = new CanvasJS.Chart("chartContainervalue1", {
        animationEnabled: true,
        title:{
          text: "Sale This Week"
        },
        axisY: {
          title: "Amount in Rs.",
          valueFormatString: "",
          suffix: "",
          prefix: "Rs."
        },
        data: [{
          type: "column",
          markerSize: 6,
          xValueFormatString: "DD-MM-YYYY",
          yValueFormatString: "",
          xValueType: "dateTime",
          dataPoints: datas
        }]
      });
       
        chart.render();


        }  
    });

     $.ajax({  
     url: 'getSaleDataTotprof', 
     method:"POST",  
     data:{p_id:1},  
     dataType:"json", 
     success:function(datas)  
     {  
      console.log(datas);
      var chart = new CanvasJS.Chart("chartContainervalue2", {
        animationEnabled: true,
        title:{
          text: "Profits This Week"
        },
        axisY: {
          title: "Amount in Rs.",
          valueFormatString: "",
          suffix: "",
          prefix: "Rs."
        },
        data: [{
          type: "column",
          markerSize: 6,
          xValueFormatString: "DD-MM-YYYY",
          yValueFormatString: "",
          xValueType: "dateTime",
          dataPoints: datas
        }]
      });
       
        chart.render();


        }  
    });

     $.ajax({  
     url: 'getSaleDataTotprod', 
     method:"POST",  
     data:{p_id:1},  
     dataType:"json", 
     success:function(datas)  
     {  
      console.log(datas);
      var chart = new CanvasJS.Chart("chartContainervalue3", {
        animationEnabled: true,
        title:{
          text: "Products sold This Week"
        },
        axisY: {
          title: "No Of Products.(qty)",
          valueFormatString: "",
          suffix: "",
          prefix: ""
        },
        data: [{
          type: "column",
          markerSize: 6,
          xValueFormatString: "DD-MM-YYYY",
          yValueFormatString: "",
          xValueType: "dateTime",
          dataPoints: datas
        }]
      });
       
        chart.render();


        }  
    });

});

