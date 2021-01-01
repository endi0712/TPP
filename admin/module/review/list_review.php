
        <!--**********************************
            Content body start
            ***********************************-->
            <div class="content-body">

              <div class="row page-titles mx-0">
                <div class="col p-md-0">
                  <ol class="breadcrumb">
                  </a>
                </ol>
              </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
              <div class="row">
                <div class="col">
                  <div class="card">
                    <div class="card-body">

                      <table class="table table-hover">

                        <tr>
                          <th>Pengirim</th>
                          <th>Pesan</th>
                          
                        </tr>
                        <?php 
                        include "../lib/config.php";
                        include "../lib/koneksi.php";
                        $halaman = 5;
                        $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                        $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
                        $result = mysqli_query($koneksi,"SELECT * FROM tbl_review");
                        $total = mysqli_num_rows($result);
                        $pages = ceil($total/$halaman);  
                        $kueriReview = mysqli_query($koneksi, "select * from tbl_review limit $mulai, $halaman");
                        while ($rev=mysqli_fetch_array($kueriReview)) {
                         
                         ?>
                         <tr>
                          <td><?php echo $rev['pengirim']; ?></td> 
                          <td><?php echo $rev['isi']; ?></td>
                          
                        </tr>
                      <?php  } ?>
                    </table>
                    <nav aria-label="Page navigation" style="margin-left: 35%">
                      <ul class="pagination justify-content-right">

                        <li class="page-item <?php if ($page == 1) {echo 'disabled';}?>">
                          <a class="page-link" href="?module=review&halaman=<?php echo $page - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>

                        <?php 
                        for ($i=1; $i<=$pages ; $i++){
                          ?>
                          <li class="page-item <?php if ($i == $page) {echo 'disabled';}?> "><a class="page-link" href="?module=review&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>
                        <?php } ?>

                        <li class="page-item <?php if ($page == $pages) {echo 'disabled';}?>">
                          <a class="page-link" href="?module=review&halaman=<?php echo $page + 1; ?>">Next</a>
                        </li>

                      </ul>
                    </nav>
                    <div class="box-footer">
                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
