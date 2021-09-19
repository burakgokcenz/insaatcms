<?php include "includes/admin_header.php"; ?>


<div id="wrapper">

    <?php include "includes/admin_sidebar.php"; ?>
    
    
<div id="content-wrapper">
    <div class="container-fluid">
        <h1>Yönetim Paneline Hoşgeldiniz.</h1>
        <hr>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Proje ID</th>
                    <th>Proje Adı</th>
                    <th>Proje Kategorisi</th>
                    <th>Resim Ekle</th>
                    <th>Büyük Resim Ekle</th>
                    <th>Düzenle-Sil-Ekle</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($_POST["add_proje"])) {
                    
                            $proje_name = $_POST['proje_name'];
                            $proje_category = $_POST['proje_category'];

                            $proje_item_kucuk = $_FILES['image']['name'];
                            $proje_item_kucuk_temp = $_FILES['image']['tmp_name'];

                            $proje_item_buyuk = $_FILES['imagebg']['name'];
                            $proje_item_buyuk_temp = $_FILES['imagebg']['tmp_name'];

                             move_uploaded_file($proje_item_kucuk_temp, "../img/$proje_item_kucuk");
                             move_uploaded_file($proje_item_buyuk_temp, "../img/$proje_item_buyuk");

                             $sorgu = "INSERT INTO projeler (proje_name, proje_category, proje_img_sm, proje_img_bg) VALUES('{$proje_name}', 
                            '{$proje_category}', '{$proje_item_kucuk}', '{$proje_item_buyuk}')"; 
                             
                            
                             $olustur_proje_sorgu = mysqli_query($connect,$sorgu);
                             header("Location: proje.php");   

                                



                }





                 ?>

                 <?php 
                 if (isset($_POST['edit_portfolio'])) {
                   $proje_name = $_POST['proje_name'];
                   $proje_category = $_POST['proje_category'];
                   $proje_img_sm = $_FILES['image']['name'];
                   $proje_img_bg = $_FILES['imagebg']['name'];
                   $proje_img_sm_temp = $_FILES['image']['tmp_name'];
                   $proje_img_bg_temp = $_FILES['imagebg']['tmp_name'];

                   if (empty($proje_img_sm)) {

                    $olustur = "SELECT * FROM projeler WHERE proje_id = '$_POST[proje_id]'";
                    $select_img_kucuk =mysqli_query($connect,$olustur);
                    while($row = mysqli_fetch_assoc($select_img_kucuk))
                    {
                      $proje_img_sm = $row["proje_img_sm"];
                     }
                        } 
 
                      if (empty($proje_img_bg)) { 

                    $olustur2 = "SELECT * FROM projeler WHERE proje_id = '$_POST[proje_id]'";
                    $select_img_buyuk =mysqli_query($connect,$olustur2);
                    while($row = mysqli_fetch_assoc($select_img_buyuk))
                    {
                      $proje_img_bg = $row["proje_img_bg"];                      
                    }
                              }
                             move_uploaded_file($proje_img_sm_temp, "../img/$proje_img_sm");
                             move_uploaded_file($proje_img_bg_temp, "../img/$proje_img_bg");



                    $sql_sorgu2 = "UPDATE projeler SET proje_name ='{$proje_name}', proje_category ='{$proje_category}',
                     proje_img_sm = '{$proje_img_sm}', proje_img_bg = '{$proje_img_bg}' WHERE  proje_id ='$_POST[proje_id]' "; 

                     $duzenle_sorgu = mysqli_query($connect,$sql_sorgu2);
                     header("Location: proje.php");        
                 }
                 ?>
               <?php
               $sql_sorgu ="SELECT * FROM projeler ORDER BY proje_id DESC";
                             $select_all_projeler =mysqli_query($connect,$sql_sorgu);
                             $d = 1;
                              
                       while ($row =mysqli_fetch_assoc($select_all_projeler)) {
                           $proje_id = $row["proje_id"];
                           $proje_name =  $row["proje_name"];
                           $proje_category =  $row["proje_category"];
                           $proje_img_bg =  $row["proje_img_bg"];
                           $proje_img_sm =  $row["proje_img_sm"];
                  echo "     <tr>
                    <td>{$proje_id}</td>
                    <td>{$proje_name}</td>
                    <td>{$proje_category}</td>
                    <td><img src='../img/$proje_img_sm' width='75px' height='75px'</td>
                    <td><img src='../img/$proje_img_bg' width='75px' height='75px'</td>
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Düzenle
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$d' href='#'>Güncelle</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='proje.php?delete={$proje_id}'>Sil</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' data-toggle='modal' data-target='#add_modal'>Ekle</a>
                            </div>
                        </div>
                    </td>
                </tr> ";


?>

                
         <div id="edit_modal<?php echo $d; ?>" class="modal fade">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Projeyi Güncelle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="proje_name">Proje Adı</label>
 <input type="text" class="form-control" name="proje_name" value="<?php echo $proje_name ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="proje_category">Proje  Kategorisi</label>
                                              <select class="form-group" name="proje_category">
                                           <?php
                                           $duzenle_sql ="SELECT * FROM categories";
                                           $duzenle = mysqli_query($connect,$duzenle_sql);
                                             while($veri = mysqli_fetch_assoc($duzenle))
                                             {
                                                $duzenle_category = $veri['category_name'];


                                                if ($veri['category_name'] == $row["proje_category"]) 
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
                                        <img width = "70px" src="../img/<?php echo $proje_img_sm; ?>">
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <div class="form-group">
                                         <img  width = "70px" src="../img/<?php echo $proje_img_bg; ?>">
                                        <input type="file" class="form-control" name="imagebg">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="proje_id" value="<?php echo $row["proje_id"]; ?>">
                                        <input type="submit" class="btn btn-primary" name="edit_portfolio" value="Projeyi Güncelle">
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
                        <h5 class="modal-title" id="exampleModalLabel">Yeni Kategori Ekle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <label for="proje_name">Ürün İsmi</label>
                                        <input type="text" class="form-control" name="proje_name">
                                    </div>
                                    <div class="form-group">
                                        <label for="proje_category">Ürün Kategorisi</label>                                       
                                        <select class="form-group" name="proje_category">
                                           <?php
                                           $duzenle_sql ="SELECT * FROM categories";
                                           $duzenle = mysqli_query($connect,$duzenle_sql);
                                             while($veri = mysqli_fetch_assoc($duzenle))
                                             {
                                                $duzenle_category = $veri['category_name'];
                                                echo "<option>$duzenle_category</option>";



                                             }




                                            ?> 



                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="proje_image_sm">Küçük Alana Resim Ekle</label>
                                        <input type="file" class="form-control" name="image">
                                    </div>

                                    <div class="form-group">
                                        <label for="proje_image_bg">Büyük Alana Resim Ekle</label>
                                        <input type="file" class="form-control" name="imagebg">
                                    </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="add_proje" value="Projelere Ekle">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php 
        if (isset($_GET['delete'])) {
          $sil_proje_id = $_GET['delete'];
          $sorgu = "DELETE FROM projeler  WHERE proje_id = {$sil_proje_id} ";
          $sil_proje_sorgu = mysqli_query($connect,$sorgu);
          header("Location: proje.php");    

        }





        ?>
        


            <?php include "includes/admin_footer.php"; ?>



        
