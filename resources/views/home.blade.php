  <!-- Page Content -->
  <div class="container">


    <div class="row mb-3">
      <div class="col-md-12 mt-3">

      
 
    </div>

  <div class="row mb-5">
    <div class="col-md-12">

      <h1 class="my-4 ">
          <small></small>
        </h1>
    </div>
  </div>

    <div class="row">
      
      <!-- Blog Entries Column -->
      <div class="col-md-4 mb-5">
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" style="width: 80%;margin-top:-50px;margin-left:35px;" src="" alt="Card image cap">
          <div class="card-body">
            <span class="badge badge-primary">{{ $category_name }}</span>
            <h2 class="card-title">{{ $post_title }}</h2>
            <p class="card-text">{{ substr($post_description,0,50) }} ....</p>
            <a href="post_artikel.php?read_more=<?php echo $post_id ?>" class="btn btn-primary">Read More &rarr;</a>
          </div>
          <div class="card-footer text-muted">
            Posted on {{ $post_date  }} by
            <a href="#">{{ $first_name.' '.$last_name }}</a>
          </div>
        </div>
      </div>
      </div>

      <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php 
                for($i=1;$i<=$count;$i++)
                {
                    if($i == $page)
                    {
                        echo "<li class='page-item active'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                    }
                    else
                    {
                        echo "<li class='page-item'><a class='page-link' href='index.php?page=$i'>$i</a></li>";
                    }
                }
            ?>
        </ul>
    </nav>


      </div>


    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php include 'includes/footer.php'; ?>


