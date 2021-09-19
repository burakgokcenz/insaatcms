<aside id="aside" class="col-md-4">
                    
                    <div class="widget">
						<div class="widget-search">
							<form action="./arama.php" method="post">
							    <input class="search-input form-control" name="arama" type="text" placeholder="Arama..">
							    <button class="search-btn" name="aramabtn" type="submit"><i class="fas fa-search"></i></button>
							</form>
						</div>
					</div>
					<!-- /Search -->
                    
                    
					<!-- Category -->


					<div class="widget">
						<h3 class="mb-3">Kategoriler</h3>
						<div class="widget-category">
					<?php 
                              $sql_sorgu ="SELECT * FROM categories";
                              $select_all_categories =mysqli_query($connect,$sql_sorgu);
                              while ($row =mysqli_fetch_assoc($select_all_categories)) {

                              $category_name = $row["category_name"];

                              $sql_sorgu_kategorisayısı = "SELECT * FROM posts WHERE post_category = '$category_name' ";
                              $calıstır_sorgu_kategorisayısı = mysqli_query($connect,$sql_sorgu_kategorisayısı);
                              $sırasayisi_kategori_post = mysqli_num_rows($calıstır_sorgu_kategorisayısı);


                              	
                              echo "<a href='category.php?kategoriler=$category_name'>{$category_name}<span>({$sırasayisi_kategori_post})</span></a>";
                              	
                              }

					?>
							

				</aside>