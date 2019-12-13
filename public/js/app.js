for (var i = 1; i < 14; i++) {
  var ctx = document.getElementById('graph'+i).getContext('2d');


  var goalHome = document.getElementById('goalHome' + i).textContent;
  var goalAway = document.getElementById('goalAway' + i).textContent;



  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['Buts marqués à domicile', "Buts marqués à l'extérieur"],
          datasets: [{
              label: 'Statistique buts de ligue 1',
              data: [goalHome, goalAway],
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)'
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)'
              ],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });
}
