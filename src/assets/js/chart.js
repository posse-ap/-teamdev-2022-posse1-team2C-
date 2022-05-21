var ctx = document.getElementById("myRaderChart");
var myRadarChart = new Chart(ctx, {
  type: "radar",
  data: {
    labels: ["総合評価", "求人の質", "使いやすさ", "対応の良さ", "サポート力"],
    datasets: [
      {
        data: [2.9, 3.7, 4.5, 3.2, 4.1],
        backgroundColor: "RGBA(225,95,150, 0.5)",
        borderColor: "RGBA(225,95,150, 1)",
        borderWidth: 1,
        // pointBackgroundColor: "RGB(46,106,177)",
        pointStyle: "line",
      },
    ],
  },
  options: {
    legend: {
      display: false,
    },
    responsive: true,
    tooltips: {
      enabled: false,
    },
    title: {
      display: false,
      text: "5段階評価",
    },
    scale: {
      ticks: {
        suggestedMin: 0,
        suggestedMax: 5,
        stepSize: 1,
        callback: function (value, index, values) {
          return value;
        },
      },
    },
    // plugins: {
    //   tooltip: {
    //     usePointStyle: false,
    //   },
    // },
  },
});
