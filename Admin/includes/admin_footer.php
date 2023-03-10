<div class="text-right">
        <div class="credits">
          <!--
            All the links in the footer should remain intact.
            You can delete the links only if you purchased the pro version.
            Licensing information: https://bootstrapmade.com/license/
            Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
          -->
          Designed by <a href="#">Godswill</a>
        </div>
      </div>
    </section>
    <!--main content end-->
  </section>
  <!-- container section start -->

  <!-- javascripts -->
  
  <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
  <script src="./js/jquery.js"></script>
  <script src="./js/jquery-ui-1.10.4.min.js"></script>
  <script src="./js/jquery-1.8.3.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-1.9.2.custom.min.js"></script>
  <!-- bootstrap -->
  <script src="./js/bootstrap.min.js"></script>
  <!-- nice scroll -->
  <script src="./js/jquery.scrollTo.min.js"></script>
  <script src="./js/jquery.nicescroll.js" type="text/javascript"></script>
  <!-- charts scripts -->
  <script src="assets/jquery-knob/js/jquery.knob.js"></script>
  <script src="./js/jquery.sparkline.js" type="text/javascript"></script>
  <script src="assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
  <script src="./js/owl.carousel.js"></script>
  <!-- jQuery full calendar -->
  <<script src="./js/fullcalendar.min.js"></script>
    <!-- Full Google Calendar - Calendar -->
    <script src="assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
    <!--script for this page only-->
    <script src="./js/calendar-custom.js"></script>
    <script src="./js/jquery.rateit.min.js"></script>
    <!-- custom select -->
    <script src="./js/jquery.customSelect.min.js"></script>
    <script src="assets/chart-master/Chart.js"></script>

    <!--custome script for all page-->
    <script src="./js/scripts.js"></script>
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <!-- custom script for this page-->
    <script src="./js/sparkline-chart.js"></script>
    <script src="./js/easy-pie-chart.js"></script>
    <script src="./js/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="./js/jquery-jvectormap-world-mill-en.js"></script>
    <script src="./js/xcharts.min.js"></script>
    <script src="./js/jquery.autosize.min.js"></script>
    <script src="./js/jquery.placeholder.min.js"></script>
    <script src="./js/gdp-data.js"></script>
    <script src="./js/morris.min.js"></script>
    <script src="./js/sparklines.js"></script>
    <script src="./js/charts.js"></script>
    <script src="./js/jquery.slimscroll.min.js"></script>
    <script>
      //knob
      $(function() {
        $(".knob").knob({
          'draw': function() {
            $(this.i).val(this.cv + '%')
          }
        })
      });

      //carousel
      $(document).ready(function() {
        $("#owl-slider").owlCarousel({
          navigation: true,
          slideSpeed: 300,
          paginationSpeed: 400,
          singleItem: true

        });
      });

      //custom select box

      $(function() {
        $('select.styled').customSelect();
      });

      /* ---------- Map ---------- */
      $(function() {
        $('#map').vectorMap({
          map: 'world_mill_en',
          series: {
            regions: [{
              values: gdpData,
              scale: ['#000', '#000'],
              normalizeFunction: 'polynomial'
            }]
          },
          backgroundColor: '#eef3f7',
          onLabelShow: function(e, el, code) {
            el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
          }
        });
      });
      // CHECKBOX
      $(document).ready(function(){
        
        $('#selectAllBoxes').click(function(event){

          if(this.checked) {
            $('.checkBoxes').each(function(){

              this.checked = true;

            });

          } else {

            $('.checkBoxes').each(function(){

              this.checked = false;

            });

          }

        });
      });

      
    <script>
    </script></script>


    <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['Views',   <?php echo $session->count; ?>],
          ['Comments', <?php echo Comment::number(); ?>], 
          ['Users',   <?php echo User::number(); ?>],
          ['Photos',  <?php echo Photo::number(); ?>]
        ]);

        var options = {
          legend:'none',
          pieSliceText: 'label',
          backgroundColor:'transparent',
          title: 'My Daily Activities'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

</body>

</html>
</body>

</html>
