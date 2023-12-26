/**
 * For usage, visit Chart.js docs https://www.chartjs.org/docs/latest/
 */

const myData = [];
const dataTitle = [];
const colors = [];

$.ajax({
  url: 'php/handleChartData.php',
  method: 'POST',
  success: function (response) {
    const result = JSON.parse(response);
    getData(result);

    const pieConfig = {
      type: 'doughnut',
      data: {
        datasets: [
          {
            data: myData,
            /**
             * These colors come from Tailwind CSS palette
             * https://tailwindcss.com/docs/customizing-colors/#default-color-palette
             */
            backgroundColor: colors,
            label: 'Dataset 1',
          },
        ],
        labels: dataTitle,
      },
      options: {
        responsive: true,
        cutoutPercentage: 50,
        /**
         * Default legends are ugly and impossible to style.
         * See examples in charts.html to add your own legends
         *  */
        // legend: {
        //   display: false,
        // },
        tooltips: {
          enabled: true,
          mode: 'single',
          callbacks: {
            label: function (tooltipitem, data) {
              return data['labels'][tooltipitem['index']] + ': ' + data['datasets'][0]['data'][tooltipitem['index']] + '%';
            }
          }
        }
      },
    }
    // change this to the id of your chart element in HMTL
    const pieCtx = document.getElementById('pie')
    window.myPie = new Chart(pieCtx, pieConfig)
  },
  error: function (err) {
    alert(err);
  }
});

function getData(array) {
  let sum = 0;
  array.forEach(item => {
    sum += Number(item[1]);
    dataTitle.push(item[0]);
    colors.push(randomColor());
  });

  // sum = 100%
  // item[i] = x%
  console.log(sum);
  array.forEach(item => {
    const num = (Number(item[1]) / sum).toFixed(2) * 100;
    myData.push(num);
  });
}


function randomColor() {
  return '#' + Math.floor(Math.random() * 16777215).toString(16);
}