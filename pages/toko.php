<body>


  <style type="text/css">
    .cari {
      width: 350px;
    }
  </style>   

  <section class="hero-wrap hero-wrap-2" style="background-image: url('assets/img/batik2.png');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
      <div class="row no-gutters slider-text align-items-center" >
        <div class="col-md-12 ftco pb-5">
          <div class="cari" >
          <form  action="tokobysearch.php" method="post">
         <label class="col-form-label">Cari Nama Pemilik UKM</label>
         <div class="form-group">
            <select class="custom-select" name="search">
              <?php 
              include "lib/koneksi.php";
              $q = mysqli_query($koneksi,"SELECT * FROM tbl_pemilik_ukm");
              while($r=mysqli_fetch_array($q)){ 
               ?>
              <option value="<?php echo $r['id_pemilik_ukm'] ?>"><?php echo $r['nama']; ?></option>
            <?php } ?>
            </select>
            <button type="submit">Cari</button>
          </div>
          </form>
          </div>
        </div>
      </div>
      </section>   
  <section class="ftco-section bg-light">
   <div class="container">
   
    <div class="row mb-5 pb-5">
    <?php 
    
     $halaman = 6;
     $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
     $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
     $result = mysqli_query($koneksi,"SELECT * FROM tbl_pemilik_ukm");
     $total = mysqli_num_rows($result);
     $pages = ceil($total/$halaman);  
     $q = mysqli_query($koneksi, "SELECT * FROM tbl_pemilik_ukm order by id_pemilik_ukm desc limit $mulai, $halaman");
     while($r=mysqli_fetch_array($q)){ ?>

      <div class="col-md-4 d-flex align-self-stretch px-4 mb-5">
        <div class="d-block services text-center">

          <div class="media-body p-4 toko">
            <h3 class="heading"><?php echo $r['nama']; ?></h3>
            <img src="admin/upload/<?php echo $r['gambar']; ?>" height="150px">
            <a href="tokopage.php?id_pemilik_ukm=<?php echo $r['id_pemilik_ukm']; ?>" class="btn-custom d-flex align-items-center justify-content-center"><span class="fa fa-chevron-right"></span><i class="sr-only">Read more</i></a>
          </div>
        </div>
      </div>
   <?php } ?>
  </div>
</div>

</section>
<nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
          
          <li class="page-item <?php if ($page == 1) {echo 'disabled';}?>">
            <a class="page-link" href="?halaman=<?php echo $page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
          </li>

          <?php 
          for ($i=1; $i<=$pages ; $i++){
            ?>
            <li class="page-item <?php if ($i == $page) {echo 'disabled';}?> "><a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
          <?php } ?>
          
            <li class="page-item <?php if ($page == $pages) {echo 'disabled';}?>">
              <a class="page-link" href="?halaman=<?php echo $page + 1; ?>">Next</a>
            </li>

        </ul>
      </nav>
</body>