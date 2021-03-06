  <!-- Footer -->
  <footer class="sticky-footer bg-white">
    <div class="container my-auto">
      <div class="copyright text-center my-auto">
        <span>Copyright &copy; IoT Monitoring 2020</span>
      </div>
    </div>
  </footer>
  <!-- End of Footer -->

  </div>
  <!-- End of Content Wrapper -->
  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
  <script src="<?= base_url('assets/'); ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('assets/'); ?>vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
  <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>

  <script src="<?= base_url('assets/'); ?>dist/sweetalert2.all.min.js"></script>

  <script>
    // CARD-PULSE-EFFECT
    // Pseudo code
    // Jquery tolong carikan elemen tag '' | let indicator = document.getElementsByTagName()
    // jika nilai pada variabel indicator kurang dari sama dengan 24 dan lebih dari sama dengan 31, maka div yang mempunyai id="indicator" akan menambhkan class="bg-danger";
    // selain itu bg="default"

    const indicate = document.getElementsByClassName("parameter-actual");
    const dataActual = <?= $suhu_air['suhu'];  ?>;

    if (dataActual >= <?= $setValue['temp_min']; ?> && dataActual <= <?= $setValue['temp_max']; ?>) {
      indicate[0].classList.add("bg-default");
      indicate[0].classList.add("border-left-primary");
    }
    // else if (dataActual >= <?= $setValue['amoniak_min']; ?> && dataActual <= <?= $setValue['amoniak_max']; ?>) {
    //   indicate[0].classList.add("bg-default");
    //   indicate[0].classList.add("border-left-primary");
    // } 
    else {
      indicate[0].classList.add("bg-danger");
      indicate[0].classList.add("text-white");
      indicate[0].classList.add("pulse");
    }
    // ./card-pulse-effect
    //====================================================================


    //====================================================================
    //CHART
    // var a1 = [];
    // var index = 0;
    // <?php foreach ($data_grafik as $sektor) :  ?>
    //   a1[index] = "<?= $sektor['suhu_air'] . ',';  ?>";
    //   index++;
    // <?php endforeach  ?>
    // alert(a1);

    // home/area-chart/suhu
    var ctx = document.getElementById("home-area-chart-suhu");
    var myLineChart = new Chart(ctx, {
      type: "line",
      data: {

        // labels: [
        //   "uhuy",
        //   "Feb",
        //   "Mar",
        //   "Apr",
        //   "May",
        //   "Jun",
        //   "Jul",
        //   "Aug",
        //   "Sep",
        //   "Oct",
        //   "Nov",
        //   "Dec",
        // ],
        labels: [
          <?php foreach ($data_grafik as $sektor) : ?>
            <?= '"' . substr($sektor['data_waktu'], 11, 5) . '"' . ',';  ?>
          <?php endforeach ?>
        ],


        datasets: [{
          label: "Suhu",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,

          // data: [
          //   0,
          //   10000,
          //   5000,
          //   15000,
          //   10000,
          //   20000,
          //   15000,
          //   25000,
          //   20000,
          //   30000,
          //   25000,
          //   40000,
          // ],

          data: [
            <?php foreach ($data_grafik as $sektor) :  ?>
              <?= $sektor['suhu_air'] . ',';  ?>
            <?php endforeach;  ?>
          ],

        }, ],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0,
          },
        },
        scales: {
          xAxes: [{
            time: {
              unit: "date",
            },
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              maxTicksLimit: 7,
            },
          }, ],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,

            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2],
            },
          }, ],
        },
        legend: {
          display: false,
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: "#6e707e",
          titleFontSize: 14,
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: "index",
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel =
                chart.datasets[tooltipItem.datasetIndex].label || "";
              return datasetLabel + " " + tooltipItem.yLabel + " Celcius";
            },
          },
        },
      },
    });

    // home/area-chart/amoniak
    var ctx = document.getElementById("home-area-chart-amoniak");
    var myLineChart = new Chart(ctx, {
      type: "line",
      data: {

        // labels: [
        //   "uhuy",
        //   "Feb",
        //   "Mar",
        //   "Apr",
        //   "May",
        //   "Jun",
        //   "Jul",
        //   "Aug",
        //   "Sep",
        //   "Oct",
        //   "Nov",
        //   "Dec",
        // ],
        labels: [
          <?php foreach ($data_grafik as $sektor) : ?>
            <?= '"' . substr($sektor['data_waktu'], 11, 5) . '"' . ',';  ?>
          <?php endforeach ?>
        ],


        datasets: [{
          label: "Amoniak",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,

          // data: [
          //   0,
          //   10000,
          //   5000,
          //   15000,
          //   10000,
          //   20000,
          //   15000,
          //   25000,
          //   20000,
          //   30000,
          //   25000,
          //   40000,
          // ],

          data: [
            <?php foreach ($data_grafik as $sektor) :  ?>
              <?= $sektor['amoniak'] . ',';  ?>
            <?php endforeach  ?>
          ],

        }, ],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0,
          },
        },
        scales: {
          xAxes: [{
            time: {
              unit: "date",
            },
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              maxTicksLimit: 7,
            },
          }, ],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return (value) + ` ppm`;
              },
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2],
            },
          }, ],
        },
        legend: {
          display: false,
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: "#6e707e",
          titleFontSize: 14,
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: "index",
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel =
                chart.datasets[tooltipItem.datasetIndex].label || "";
              return datasetLabel + " " + tooltipItem.yLabel + " Part Per Million";
            },
          },
        },
      },
    });

    // home/area-chart/volume
    var ctx = document.getElementById("home-area-chart-volume");
    var myLineChart = new Chart(ctx, {
      type: "line",
      data: {

        // labels: [
        //   "uhuy",
        //   "Feb",
        //   "Mar",
        //   "Apr",
        //   "May",
        //   "Jun",
        //   "Jul",
        //   "Aug",
        //   "Sep",
        //   "Oct",
        //   "Nov",
        //   "Dec",
        // ],
        labels: [
          <?php foreach ($data_grafik as $sektor) : ?>
            <?= '"' . substr($sektor['data_waktu'], 11, 5) . '"' . ',';  ?>
          <?php endforeach ?>
        ],


        datasets: [{
          label: "Volume",
          lineTension: 0.3,
          backgroundColor: "rgba(78, 115, 223, 0.05)",
          borderColor: "rgba(78, 115, 223, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(78, 115, 223, 1)",
          pointBorderColor: "rgba(78, 115, 223, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,

          // data: [
          //   0,
          //   10000,
          //   5000,
          //   15000,
          //   10000,
          //   20000,
          //   15000,
          //   25000,
          //   20000,
          //   30000,
          //   25000,
          //   40000,
          // ],

          data: [
            <?php
            $volumeCalc = ($setValue['field_length'] * $setValue['field_width'] * ($setValue['field_height'] - $volume_air['hc_sr04'])) / 1000;
            ?>
            <?php foreach ($data_grafik as $sektor) :  ?>

              <?= $volumeCalc . ',';  ?>
            <?php endforeach  ?>
          ],

        }, ],
      },
      options: {
        maintainAspectRatio: false,
        layout: {
          padding: {
            left: 10,
            right: 25,
            top: 25,
            bottom: 0,
          },
        },
        scales: {
          xAxes: [{
            time: {
              unit: "date",
            },
            gridLines: {
              display: false,
              drawBorder: false,
            },
            ticks: {
              maxTicksLimit: 7,
            },
          }, ],
          yAxes: [{
            ticks: {
              maxTicksLimit: 5,
              padding: 10,
              // Include a dollar sign in the ticks
              callback: function(value, index, values) {
                return value + ` L`;
              },
            },
            gridLines: {
              color: "rgb(234, 236, 244)",
              zeroLineColor: "rgb(234, 236, 244)",
              drawBorder: false,
              borderDash: [2],
              zeroLineBorderDash: [2],
            },
          }, ],
        },
        legend: {
          display: false,
        },
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          titleMarginBottom: 10,
          titleFontColor: "#6e707e",
          titleFontSize: 14,
          borderColor: "#dddfeb",
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          intersect: false,
          mode: "index",
          caretPadding: 10,
          callbacks: {
            label: function(tooltipItem, chart) {
              var datasetLabel =
                chart.datasets[tooltipItem.datasetIndex].label || "";
              return datasetLabel + " " + tooltipItem.yLabel + " Part Per Million";
            },
          },
        },
      },
    });

    // Pie Chart Example
    var ctx = document.getElementById("home-pie-chart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Uhuy", "Referral", "Social"],
        datasets: [{
          data: [55, 30, 15],
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
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
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
    // ./chart
    //====================================================================
  </script>

  <!-- DataTables -->
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

  <!-- Datatable JS -->
  <script type="text/javascript">
    $(document).ready(function() {
      $("#dataTable").DataTable({
        "order": [
          [0, "desc"]
        ]
      });

    });
  </script>

  </body>

  </html>