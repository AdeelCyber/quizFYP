/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */
const barConfig = {
  type: 'bar',
  data: {
    labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','August','September','November','December'],
    datasets: [
      {
        label: 'Payments',
        backgroundColor: '#0694a2',
        // borderColor: window.chartColors.red,
        borderWidth: 1,
        data: [05, 14, 52, 74, 33, 90, 70,25,35,14,25],
      },
      {
        label: 'Members',
        backgroundColor: '#7e3af2',
        // borderColor: window.chartColors.blue,
        borderWidth: 1,
        data: [66, 33, 43, 12, 54, 62, 84,25 ,63, 54, 35],
      },
    ],
  },
  options: {
    responsive: true,
    legend: {
      display: true,
    },
  },
}

const barsCtx = document.getElementById('bars')
window.myBar = new Chart(barsCtx, barConfig)
