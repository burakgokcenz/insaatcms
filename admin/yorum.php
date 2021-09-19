<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>


    <div id="content-wrapper">
        <div class="container-fluid">
            <h1>Yönetim Paneline Hoşgeldiniz</h1>
            <hr>

            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>İsim</th>
                        <th>Email</th>
                        <th>Yorum</th>
                        <th>Saat</th>
                        <th>Statü</th>
                        <th>Bölüm</th>
                        <th>Düzenle</th>
                    </tr>
                </thead>
                <tbody>
          <?php
             $sql_sorgu = "SELECT * FROM yorumlar ORDER BY yorum_id DESC";
             $secilen_all_yorum = mysqli_query($connect,$sql_sorgu);
             $d=1;
             while ($row = mysqli_fetch_assoc($secilen_all_yorum))
               {


               $yorum_id = $row["yorum_id"];
               $yorum_post_id = $row["yorum_post_id"];
               $yorum_date = $row["yorum_date"];
               $yorum_isim = $row["yorum_isim"];
               $yorum_email = $row["yorum_email"];
               $yorum_text = substr($row["yorum_text"],0,100);
               $yorum_statu = $row["yorum_statu"];





                    echo "<tr>
                        <td>{$yorum_id}</td>
                        <td>{$yorum_isim}</td>
                        <td>{$yorum_email}</td>
                        <td>{$yorum_text}</td>
                        <td>{$yorum_date}</td>
                        <td>{$yorum_statu}</td>
                                 ";


                  $sorgu = "SELECT * FROM posts WHERE post_id = $yorum_post_id";
                  $select_post_id_sorgu = mysqli_query($connect,$sorgu);
                  while ($row =mysqli_fetch_assoc($select_post_id_sorgu)) {

                       $post_id =$row["post_id"];
                       $post_title = $row["post_title"];

                      
                  };
                echo "<td>{$post_title}</td>";
                echo "
                        
                        <td>
                            <div class='dropdown'>
                                <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                    Düzenle
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' data-toggle='modal' data-target='#view_modal$d' href='#'>Görüntüle</a>
                                    <div class='dropdown-divider'></div>
                                   <a class='dropdown-item' href='yorum.php?delete={$yorum_id}'>Sil</a>
                                    <div class='dropdown-divider'></div>
                                      <a class='dropdown-item' href='yorum.php?onayla={$yorum_id}'>Onayla</a>
                                    <div class='dropdown-divider'></div>
                                      <a class='dropdown-item' href='yorum.php?reddet={$yorum_id}'>Reddet</a>
                                </div>
                            </div>
                        </td>
                    </tr>";

             ?>
                    <div id="view_modal<?php echo $d; ?>" class="modal fade">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Yorum</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="yorum_isim">Yorum İsim</label>
                                            <input type="text" readonly class="form-control" name="yorum_isim" value="<?php echo $yorum_isim; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="yorum_email">Yorum E-posta</label>
                                            <input type="text" readonly class="form-control" name="yorum_email"  value="<?php echo  $yorum_email; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="yorum_text">Yorum İçeriği</label>
                                            <textarea class="form-control" readonly name="yorum_text"  id="" cols="20" rows="5"><?php echo $yorum_text; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="yorum_statu">Yorum Statüleri</label>
                                            <input type="text" class="form-control" name="yorum_statu"  value="<?php echo $yorum_statu; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="yorum_post">Yorum Gönderileri</label>
                                            <input type="text" readonly class="form-control" name="yorum_post"  value="<?php echo $post_title; ?>">                 
                                        </div>
                                        <div class="form-group">
                                            <input type="hidden" name="yorum_id" value="">
                                            <input type="submit" class="btn btn-primary" name="view_post" value="Onayla veya Reddet">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

             <?php $d++;} ?>
                 </tbody>
            </table>   




<?php 
        if (isset($_GET['onayla'])) {
          $onayla_yorum_id = $_GET['onayla'];
          $sorgu_guncelle = "UPDATE yorumlar SET yorum_statu = 'onayla' WHERE yorum_id = {$onayla_yorum_id} ";
          $onayla_yorum_sorgu = mysqli_query($connect,$sorgu_guncelle);
          header("Location: yorum.php");    

        }
        if (isset($_GET['reddet'])) {
          $reddet_yorum_id = $_GET['reddet'];
          $sorgu_guncelle2 = "UPDATE yorumlar SET yorum_statu = 'reddet' WHERE yorum_id = {$reddet_yorum_id} ";
          $onayla_yorum_sorgu2 = mysqli_query($connect,$sorgu_guncelle2);
          header("Location: yorum.php");    

        }





        ?>


<?php 
        if (isset($_GET['delete'])) {
          $sil_yorum_id = $_GET['delete'];
          $sorgu_sil = "DELETE FROM yorumlar  WHERE yorum_id = {$sil_yorum_id} ";
          $sil_yorum_sorgu = mysqli_query($connect,$sorgu_sil);
          header("Location: yorum.php");    

        }





        ?>

            <?php include "includes/admin_footer.php"; ?>