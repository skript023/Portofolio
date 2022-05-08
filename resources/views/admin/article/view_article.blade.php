<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">List Artikel</h1>
        </div> 
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="card boarder-0 shadow-lg">
          <div class="card-body">
            <form method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="post_title" placeholder="Masukan Judul Aritkel Anda...">
                <span class="input-group-btn">
                  <button class="btn btn-dark" name="cariArtikel" type="submit">
                    Cari Artikel
                  </button>
                </span>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php 
    if(isset($_POST['cariArtikel']))
    {
      $post_title = escape($_POST['post_title']);

      $query = query("SELECT * FROM posts INNER JOIN category ON category.id_category = posts.post_category_id 
      WHERE posts.post_title LIKE '%$post_title%' ");
      echo '<div class="row">
            <div class="col-md-12">
            <a href="artikel.php" class="btn btn-secondary">Kembali</a>
            </div>
          </div>';
          echo '<div class="row">';
            while ($row = mysqli_fetch_array($query))
            {

            
     ?>

      <div class="col-md-4 mb-5">
              <!-- Blog Post -->
        <div class="card mb-4 border-0 shadow-lg">
                <img class="card-img-top"  src="../img/<?php echo $row['post_image'] ?>" alt="Card image cap">
          <div class="card-body">
                  <span class="badge badge-primary"><?php echo $row['category_name']?></span>
                  <h2 class="card-title"><?php echo $row['post_title']?></h2>
                  <div class="btn-group">
                    <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      Action
                    </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="../post_artikel.php?read_more=<?php echo $row['id_post']?>">View Artikel</a>
                        <a class="dropdown-item" href="artikel.php?delete=<?php echo $row['id_post']?>">Delete Artikel</a>
                        <a class="dropdown-item" href="artikel.php?page=edit&p_id=<?php echo $row['id_post']?>">Edit Artikel</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                      </div>
                  </div>
              </div>
                <div class="card-footer text-muted">
                  Posted on <?php echo $row['post_date']?> by
                  <a href="#">Start Bootstrap</a>
                </div>
        </div>
      </div>

     <?php } echo '</div>';
    
    } else {?>

    <div class="row">
    <?php 
        $id_user = $_SESSION['id_user'];
        $query = query("SELECT * FROM posts INNER JOIN category ON category.id_category=posts.post_category_id
        WHERE post_id_user='$id_user' ");
        confirmQuery($query);
        while($row = mysqli_fetch_array($query)){
        $post_id = $row['id_post'];
        $post_status = $row['post_status'];
        if($post_status == 'draft'){
          $update_text = 'Update Published';
        } else {
          $update_text = 'Update Draft';
        }
     
    ?>
<div class="col-md-4 mb-5">
        <!-- Blog Post -->
  <div class="card mb-4 border-0 shadow-lg">
          <img class="card-img-top"  src="../img/<?php echo $row['post_image'] ?>" alt="Card image cap">
    <div class="card-body">
            <span class="badge badge-primary"><?php echo $row['category_name']?></span> / <span class="badge badge-info"><?php echo $row['post_status']?></span>
            <h2 class="card-title"><?php echo $row['post_title']?></h2>
            <div class="btn-group">
              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Action
              </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="../post_artikel.php?read_more=<?php echo $row['id_post']?>">View Artikel</a>
                  <a class="dropdown-item" href="artikel.php?delete=<?php echo $row['id_post']?>">Delete Artikel</a>
                  <a class="dropdown-item" href="artikel.php?page=edit&p_id=<?php echo $row['id_post']?>">Edit Artikel</a>
                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="artikel.php?update_status=<?php echo $row['id_post']?>">
                    <button class="btn btn-info"><?php echo $update_text ?></button>
                  </a>
                </div>
            </div>
        </div>
          <div class="card-footer text-muted">
            Posted on <?php echo $row['post_date']?> by
            <a href="#">Start Bootstrap</a>
          </div>
  </div>
      </div>
      <?php } ?>
</div>
          <?php } ?>
</div>
<?php 
  if(isset($_GET['delete'])){
    $id_post = $_GET['delete'];
    $query = query("DELETE FROM posts WHERE id_post='$id_post' ");
    confirmQuery($query);

  }
 
  if (isset($_GET['update_status']))
  {
    $post_id = $_GET['update_status'];
    $query = query("SELECT * FROM posts WHERE id_post='$post_id' ");
    $result = mysqli_fetch_array($query);
    if ($result['post_status'] == 'draft')
    {
      $query = query("UPDATE posts SET post_status='published' WHERE id_post='$post_id' ");
    } 
    if($result['post_status'] == 'published'){
      $query = query("UPDATE posts SET post_status='draft' WHERE id_post='$post_id' ");
    }
    confirmQuery($query);
    Redirect('artikel.php');
  }
?>