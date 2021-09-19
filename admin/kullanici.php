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
                        <th>Şifre</th>
                        <th>Yetki</th>
                        <th>İşlemler</th>
                    </tr>
                </thead>
                <tbody>

                     <?php

                  if (isset($_POST['add_kullanici'])) {

                     $kullanici_isim = $_POST['kullanici_isim'];
                     $kullanici_email = $_POST['kullanici_email'];
                     $kullanici_sifre = $_POST['kullanici_sifre'];
                     $kullanici_yetki = $_POST['kullanici_yetki'];
                    
                     

                   
                    

                     $sql_sorgu_ekle = "INSERT INTO kullanici (kullanici_isim, kullanici_email, kullanici_sifre, kullanici_yetki
                                                                                )
                                        VALUES ('{$kullanici_isim}', '{$kullanici_email}', '{$kullanici_sifre}', '{$kullanici_yetki}')";  




    
                                    $olustur_kullanici_sorgu = mysqli_query($connect,$sql_sorgu_ekle);
                                    if (!$olustur_kullanici_sorgu) {
                                        die("Sorgu Failed".mysqli_error($connect));
                                    }
                                    else
                                    {
                                    header("Location: kullanici.php");
                 }
                 }





                   ?>  

                   <?php
                   if(isset($_POST['kullanici_guncelle']))
                   {

                      $kullanici_isim = $_POST['kullanici_isim'];
                     $kullanici_email = $_POST['kullanici_email'];
                     $kullanici_sifre = $_POST['kullanici_sifre'];
                     $kullanici_yetki = $_POST['kullanici_yetki'];
                    

                    

               $sql_sorgu_guncelle = "UPDATE kullanici SET  kullanici_isim ='$kullanici_isim', kullanici_email ='$kullanici_email',
                     kullanici_sifre = '$kullanici_sifre', kullanici_yetki = '$kullanici_yetki' 
                     WHERE kullanici_id = '$_POST[kullanici_id]'"; 

           

                     $duzenle_sorgu = mysqli_query($connect,$sql_sorgu_guncelle);
                            if (!$duzenle_sorgu) {
                                        die("Sorgu Failed".mysqli_error($connect));
                                    }
                                    else
                                    {
                                    header("Location: kullanici.php");
                 }

                   }






                     ?>






                       <?php
             $sql_sorgu = "SELECT * FROM kullanici ORDER BY kullanici_id DESC";
             $secilen_all_kullanici = mysqli_query($connect,$sql_sorgu);
               $d=1;
             while ($row = mysqli_fetch_assoc($secilen_all_kullanici))
               {


               $kullanici_id = $row["kullanici_id"];
               $kullanici_isim = $row["kullanici_isim"];
               $kullanici_email = $row["kullanici_email"];
               $kullanici_sifre = $row["kullanici_sifre"];
               $kullanici_yetki = $row["kullanici_yetki"];
               echo "  

                <tr>
                        <td>{$kullanici_id}</td>
                        <td>{$kullanici_isim}</td>
                        <td>{$kullanici_email}</td>
                        <td>{$kullanici_sifre}</td>
                        <td>{$kullanici_yetki}</td>
                        <td>
                            <div class='dropdown'>
                                <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                 Güncelle
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                      <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$d' href='#'>Güncelle</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' href='kullanici.php?delete={$kullanici_id}'>Sil</a>
                                    <div class='dropdown-divider'></div>
                                    <a class='dropdown-item' data-toggle='modal' data-target='#add_modal'>Ekle</a>
                                </div>
                            </div>
                        </td>
                    </tr>";

?>

                 

                
         <div id="edit_modal<?php echo $d; ?>" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Kullanıcı Güncelle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="kullanici_isim">Kullanıcı Adı</label>
                                    <input type="text" class="form-control" name="kullanici_isim" value="<?php echo $kullanici_isim ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="kullanici_email">Kullanıcı E posta</label>
                                    <input type="text" class="form-control" name="kullanici_email" value="<?php echo $kullanici_email ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="kullanici_sifre">Kullanıcı Şifre</label>
                                    <input type="password" class="form-control" name="kullanici_sifre" value="<?php echo $kullanici_sifre ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="kullanici_yetki">Yetki Belirle</label>
                                              <select class="form-group" name="kullanici_yetki">
                                                <option><?php echo $kullanici_yetki;?></option>
                                                <?php

                                            if ($kullanici_yetki == "admin") {
                                                echo "<option value='kullanıcı'>kullanıcı</option>";
                                                
                                            }
                                            else
                                            {
                                               echo "<option value='admin'>admin</option>"; 
                                            }
                                               ?>


                                           




                                            </select>
                                         



                                      

                                    </div>

                            
                                    <div class="form-group">
                                        <input type="hidden" name="kullanici_id" value="<?php echo $row["kullanici_id"]; ?>">
                                        <input type="submit" class="btn btn-primary" name="kullanici_guncelle" value="Güncelle">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
            <?php $d++; } ?>
                </tbody>
            </table>

            <div id="add_modal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Yeni Kullanıcı Ekle</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="kullanici_isim"> Kullanıcı Adı</label>
                                            <input type="text" class="form-control" name="kullanici_isim">
                                        </div>
                                        <div class="form-group">
                                            <label for="kullanici_email">Kullanıcı E posta</label>
                                            <input type="email" class="form-control" name="kullanici_email">
                                        </div>
                                        <div class="form-group">
                                            <label for="kullanici_sifre"> Kullanıcı Sifre</label>
                                            <input type="password" class="form-control" name="kullanici_sifre">
                                        </div>

                                        <div class="form-group">
                                            <label for="kullanici_yetki">Kullanıcı Yetkisi</label>
                                            <select class="form-group" name="kullanici_yetki">
                                                <option value="admin">Admin</option>
                                                <option value="kullanici">Kullanıcı</option>


                                            </select>
                                        </div>

                                <div class="form-group">
                                     <input type="hidden" name="kullanici_id" value="">
                                    <input type="submit" class="btn btn-primary" name="add_kullanici" value="Ekle">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

 <?php 
        if (isset($_GET['delete'])) {
          $sil_post_id = $_GET['delete'];
          $sorgu_sil = "DELETE FROM kullanici  WHERE kullanici_id = {$sil_post_id} ";
          $sil_gonderi_sorgu = mysqli_query($connect,$sorgu_sil);
                              if (!$sil_gonderi_sorgu) {
                                        die("Sorgu Failed".mysqli_error($connect));
                                    }
                                    else
                                    {
                                    header("Location: kullanici.php");
                 }   

        }





        ?>

            <?php include "includes/admin_footer.php"; ?>