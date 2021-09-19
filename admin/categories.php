


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
                    <th>İD</th>
                    <th>Kategori İsmi</th>
                    <th> Düzenle-Sil-Ekle</th>
                </tr>
            </thead>
           





 <tbody>

<?php 
if(isset($_POST["add_category"]))
{
 $category_name = $_POST['category_name'];
 if ($category_name == "" || empty($category_name)) {

     echo "<div class='alert alert-secondary' role='alert'>
Bu alan boş bırakılamaz!
                    </div>";
   
 }
 else 
 {
  $sql_sorgu = "INSERT INTO categories(category_name) VALUES ('$category_name')";
  $ekle_yenı_category_sorgu = mysqli_query($connect,$sql_sorgu);
   echo "<div class='alert alert-primary' role='alert'>
Kayıt Başarı ile Gerçekleştirildi.
</div>";
header("Location: categories.php");
 }
 
}


?>

              <?php 

               if (isset($_POST["edit_category"])) {
                
                $guncelle_baslik = $_POST['category_name2'];
                 $sql_sorgu = "UPDATE categories SET category_name = '$guncelle_baslik' WHERE category_id = '$_POST[category_id]'";

                 $guncelle_baslik = mysqli_query($connect,$sql_sorgu);
                 header("Location: categories.php");

               }





              ?>






              <?php
               $sql_sorgu ="SELECT * FROM categories ORDER BY category_id DESC";
                             $select_all_categories =mysqli_query($connect,$sql_sorgu);
                              $d = 1;
                       while ($row =mysqli_fetch_assoc($select_all_categories)) {
                           $category_id = $row["category_id"];
                           $category_name =  $row["category_name"];
                  echo "  <tr>
                    <td>{$category_id}</td>
                    <td>{$category_name}</td>
                    <td>
                        <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                Düzenle
                            </button>
                            <div class='dropdown-menu' aria-labelledby='dropdownMenuButton'>
                                <a class='dropdown-item' data-toggle='modal' data-target='#edit_modal$d' href='#'>Güncelle</a>
                                <div class='dropdown-divider'></div>
                                <a class='dropdown-item' href='categories.php?delete={$category_id}'>Sil</a>
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
                                <h5 class="modal-title" id="exampleModalLabel">Kategori Güncelle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>

                            </div>
                            <div class="modal-body">
                                <form action="" method="post">
                                    <div class="form-group">

                                        <input value="<?php if(isset($category_name)) {echo $category_name;} ?>" type="text" class="form-control" name="category_name2">
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="category_id" value="<?php echo $row["category_id"]; ?>">
                                        <input type="submit" class="btn btn-primary" name="edit_category" value="Kategori Güncelle">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


              <?php $d++;  } ?>
            </tbody>


        </table>

        <div id="add_modal" class="modal fade">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Kategori Ekle</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="category_name">
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" name="add_category" value="Kategori Ekle">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

        <?php 

        if (isset($_GET['delete'])) {
         $sil = $_GET['delete'];
         $sql_sorgu = "DELETE  FROM categories WHERE category_id ={$sil}";
         $delete_category_sorgu = mysqli_query($connect,$sql_sorgu);
         header("Location: categories.php");

        }




        ?>


            <?php include "includes/admin_footer.php"; ?>