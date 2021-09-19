<?php include "includes/admin_header.php"; ?>
    

    <div id="wrapper">

     <?php include "includes/admin_sidebar.php"; ?>

      <div id="content-wrapper">

        <div class="container-fluid">
          <h1>Yönetim Paneline Hoşgeldin <small><?php  echo $_SESSION['kullaniciad']; ?></small> </h1>
          <hr>
           <hr>
            <div class="row">
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-clipboard"></i>

                  </div>
                   <?php
                    $sorgu ="SELECT * FROM posts";
                    $sorgu_all_postlar = mysqli_query($connect,$sorgu);
                    $post_count = mysqli_num_rows($sorgu_all_postlar);
                    echo "<div class 'mt-5'>{$post_count} Gönderiler</div>"

                     ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="habergonderi.php">
                  <span class="float-left">Detayları Görüntüle</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-comment"></i>
                  </div>
                   <?php
                    $sorgu ="SELECT * FROM yorumlar";
                    $sorgu_all_yorumlar = mysqli_query($connect,$sorgu);
                    $yorum_count = mysqli_num_rows($sorgu_all_yorumlar);
                    echo "<div class 'mt-5'>{$yorum_count} Yorumlar</div>"

                     ?>

                </div>
                <a class="card-footer text-white clearfix small z-1" href="yorum.php">
                  <span class="float-left">Detayları Görüntüle</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="fas fa-list-ul"></i>
                  </div>
                    <?php
                    $sorgu ="SELECT * FROM categories";
                    $sorgu_all_kategori = mysqli_query($connect,$sorgu);
                    $kategori_count = mysqli_num_rows($sorgu_all_kategori);
                    echo "<div class 'mt-5'>{$kategori_count} Kategoriler</div>"

                     ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="categories.php">
                  <span class="float-left">Detayları Görüntüle</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
            <div class="col-xl-3 col-sm-6 mb-3">
              <div class="card text-white bg-danger o-hidden h-100">
                <div class="card-body">
                  <div class="card-body-icon">
                    <i class="far fa-file-image"></i>
                  </div>
                    <?php
                    $sorgu ="SELECT * FROM projeler";
                    $sorgu_all_projeler = mysqli_query($connect,$sorgu);
                    $projeler_count = mysqli_num_rows($sorgu_all_projeler);
                    echo "<div class 'mt-5'>{$projeler_count} Projeler</div>"

                     ?>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="proje.php">
                  <span class="float-left">Detayları Görüntüle</span>
                  <span class="float-right">
                    <i class="fas fa-angle-right"></i>
                  </span>
                </a>
              </div>
            </div>
          </div>


          <?php
                    $sorgu ="SELECT * FROM yorumlar WHERE yorum_statu = 'onayla'";
                    $sorgu_all_onayla = mysqli_query($connect,$sorgu);
                    $yorum_count_onayla= mysqli_num_rows($sorgu_all_onayla);
                    

                     ?>
                      <?php
                    $sorgu ="SELECT * FROM yorumlar WHERE yorum_statu = 'reddet'";
                    $sorgu_all_reddet = mysqli_query($connect,$sorgu);
                    $yorum_count_reddet= mysqli_num_rows($sorgu_all_reddet);
                    

                     ?>

          <div class="row">
            <div class="col-md-6">
              <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Bilgi', 'İçerik'],
          ['Gönderiler',<?php echo $post_count;?>],
          ['Yorumlar',<?php echo $yorum_count;?>],
          ['Kategoriler',<?php echo $kategori_count;?>],
          ['Projeler',<?php echo $projeler_count;?>],


          
        ]);

        var options = {
          chart: {
            
         
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>

     <div id="columnchart_material" style="width: 500px; height: 400px;"></div>
          </div>
          <div class="col-md-6">
             <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['onaylanan', <?php echo $yorum_count_onayla; ?>],
          ['onaylanmayan', <?php echo $yorum_count-$yorum_count_onayla; ?>],
        
         
        ]);

        var options = {
         
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

    <div id="piechart" style="width: 500px; height: 400px;"></div>


          <?php include "includes/admin_footer.php"; ?>



      