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
                        <th>Gönderi Başlığı</th>
                        <th>Kategori</th>
                        <th>İsim</th>
                        <th>Saat</th>
                        <th>Yorumlar</th>
                        <th>Resim</th>
                        <th>İçerik</th>
                        <th>Taglar</th>
                        <th>Düzenle</th>
                    </tr>
                </thead>
                <tbody>


                  <?php

                  if (isset($_POST['post_ekle'])) {

                     $post_title = $_POST['post_title'];
                     $post_category = $_POST['post_category'];
                     $post_isim = $_POST['post_isim'];
                     $post_text = $_POST['post_text'];
                     $post_tags = $_POST['post_tags'];
                     $post_isim = $_POST['post_isim'];
                     $post_date = date("d-m-y");

                     $post_comment_number = 8;
                     $post_image = $_FILES["post_image"]["name"];
                     $post_image_temp = $_FILES["post_image"]["temp_name"];
                     move_uploaded_file($post_image_temp, "..img/$post_image");

                     $sql_sorgu_ekle = "INSERT INTO posts (post_title, post_category, post_isim, post_tags, post_date,
                                                                                 post_comment_number, post_image,post_text)
                                        VALUES ('{$post_title}', '{$post_category}', '{$post_isim}', '{$post_tags}', 'now()',
                                                                                 '{$post_comment_number}', '{$post_image}', '{$post_text}')";      

    
                                    $olustur_post_sorgu = mysqli_query($connect,$sql_sorgu_ekle);
                                    header("Location: posts.php");
                 }
                  
                




                   ?>  


                   <?php
                   if(isset($_POST['post_duzenle']))
                   {

                    $post_title = $_POST['post_title'];
                    $post_category = $_POST['post_category'];
                    $post_isim = $_POST['post_isim'];
                    $post_tags = $_POST['post_tags'];
                    $post_text = $_POST['post_text'];
                    $post_image = $_FILES['post_image']['name'];
                    $post_image__temp = $_FILES['post_image']['temp_name'];
                    
                    move_uploaded_file($post_image_temp,"..img/$post_image");   

                     if (empty($post_image)) {

                    $olustur_post = "SELECT * FROM posts WHERE post_id = '$_POST[post_id]'";
                    $select_image =mysqli_query($connect,$olustur_post);
                    while($row = mysqli_fetch_array($select_image))
                    {
                      $post_image = $row["post_image"];
                     }
                        }

               $sql_sorgu_guncelle = "UPDATE posts SET  post_title ='{$post_title}', post_category ='{$post_category}',
                     post_isim = '{$post_isim}', post_tags = '{$post_tags}', post_text = '{$post_text}',  post_image = '{$post_image}' 
                          WHERE  post_id ='$_POST[post_id]' "; 

           

                     $duzenle_sorgu = mysqli_query($connect,$sql_sorgu_guncelle);
                     header("Location: posts.php");        


                   }






                     ?>



                    <?php
             $sql_sorgu = "SELECT * FROM posts ORDER BY post_id DESC";
             $secilen_all = mysqli_query($connect,$sql_sorgu);
             $d=1;
             while ($row = mysqli_fetch_assoc($secilen_all))
              {

               $post_id = $row["post_id"];
               $post_category = $row["post_category"];
               $post_title = $row["post_title"];
               $post_isim = $row["post_isim"];
               $post_date = $row["post_date"];
               $post_title = $row["post_title"];
               $post_image = $row["post_image"];
               $post_tags = $row["post_tags"];
               $sorgu ="SELECT * FROM yorumlar WHERE yorum_post_id = {$post_id} AND yorum_statu = 
                          'onayla' ";
                          $yorum_sorgu = mysqli_query($connect,$sorgu);

                         $post_comment_number= mysqli_num_rows($yorum_sorgu);


               $post_text = substr($row["post_text"], 0,100);
                

                echo "
                    <tr>
                        <td>{$post_id}</td>
                        <td>{$post_title}</td>
                        <td>{$post_category}</td>
                        <td>{$post_isim}</td>
                        <td>{$post_date}</td>
                        <td>{$post_comment_number}</td>
                       <td><img src='../img/$post_image' width='75px' height='75px'</td>
                        <td>{$post_text}</td>
                        <td>{$post_tags}</td>
                        <td>
                            <div class='dropdown'>
                                <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                 Düzenle
                                </button>
                                <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                    <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$d' href='#'>Güncelle</a>
                                    <div class='dropdown-divider'></div>
                                   <a class='dropdown-item' href='posts.php?delete={$post_id}'>Sil</a>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Haberler Güncelle</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                     <form action="" method="post" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="post_title">Haber Başlığı</label>
                                            <input type="text" class="form-control" name="post_title" value="<?php echo $post_title; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="post_category">Haber Kategorisi</label>
                                             <select class="form-group" name="post_category">
                                           <?php
                                           $duzenle_sql ="SELECT * FROM categories";
                                           $duzenle = mysqli_query($connect,$duzenle_sql);
                                             while($veri = mysqli_fetch_assoc($duzenle))
                                             {
                                                $duzenle_category = $veri['category_name'];


                                                if ($veri['category_name'] == $row["post_category"]) 
                                                {
                                                   echo "<option selected>$duzenle_category</option>";


                                                }

                                                else
                                                {
                                                       echo "<option>$duzenle_category</option>";
                                                }
                                             



                                             }




                                            ?> 



                                        </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="post_isim">İsim</label>
                                            <input type="text" class="form-control" name="post_isim" value="<?php echo $post_isim;?>">
                                        </div>

                                        <div class="form-group">
                                               <img width = "70px" src="../img/<?php echo $post_image; ?>">
                                            <input type="file" class="form-control" name="post_image"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="post_tags">Tags</label>
                                            <input type="text" class="form-control" name="post_tags" value="<?php echo $post_tags;?>"  >
                                        </div>
                                        <div class="form-group">
                                            <label for="post_text">İçerik</label>
                                            <textarea class="form-control" name="post_text" id="" cols="20" rows="5"  ><?php echo $row["post_text"];?></textarea>
                                        </div>

                                        <div class="form-group">
                                            <input type="hidden" name="post_id" value="<?php echo $row["post_id"]; ?>">
                                            <input type="submit" class="btn btn-primary" name="post_duzenle" value="Haberler Güncelle">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



                <?php $d++;} ?>
                </tbody>









            </table>

            <div id="add_modal" class="modal fade">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Haberlere Ekle</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="post_title">Kategori Başlığı</label>
                                    <input type="text" class="form-control" name="post_title">
                                </div>
                                <div class="form-group">
                                    <label for="post_category">Kategori Seç</label>
                                       <select class="form-group" name="post_category">
                                           <?php
                                           $duzenle_sql ="SELECT * FROM categories";
                                           $duzenle = mysqli_query($connect,$duzenle_sql);
                                             while($veri = mysqli_fetch_assoc($duzenle))
                                             {
                                                $duzenle_category = $veri['category_name'];


                                                if ($veri['category_name'] == $row["post_category"]) 
                                                {
                                                   echo "<option selected>$duzenle_category</option>";


                                                }

                                                else
                                                {
                                                       echo "<option>$duzenle_category</option>";
                                                }
                                             



                                             }




                                            ?> 



                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="post_isim">Haber İsim</label>
                                    <input type="text" class="form-control" name="post_isim">
                                </div>

                                <div class="form-group">
                                    <label for="post_image">Resim Ekle</label>
                                    <input type="file" class="form-control" name="post_image">
                                </div>
                                <div class="form-group">
                                    <label for="post_tags">Tag Ekle</label>
                                    <input type="text" class="form-control" name="post_tags">
                                </div>
                                <div class="form-group">
                                    <label for="post_text">İçerik Ekle</label>
                                    <textarea class="form-control" name="post_text" id="" cols="20" rows="5"></textarea>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="post_id" value="">
                                    <input type="submit" class="btn btn-primary" name="post_ekle" value="Haberlere Ekle">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

 <?php 
        if (isset($_GET['delete'])) {
          $sil_post_id = $_GET['delete'];
          $sorgu_sil = "DELETE FROM posts  WHERE post_id = {$sil_post_id} ";
          $sil_gonderi_sorgu = mysqli_query($connect,$sorgu_sil);
          header("Location: posts.php");    

        }





        ?>

            <?php include "includes/admin_footer.php"; ?>