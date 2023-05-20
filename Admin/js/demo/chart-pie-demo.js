// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Pie Chart Example
var ctx = document.getElementById("myPieChart");

$.ajax({
  type: 'GET',
  url: '../Admin/API/get-qty-each-category.php',
  success: (result) => {
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Phone", "Tablet", "Audio", "Watch", "Accessories"],
        datasets: [{
          data: JSON.parse(result),
          backgroundColor: ['#e74a3b', '#f6c23e', '#4e73df', '#1cc88a', '#858796'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: true,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 50,
      },
    });
  }
});