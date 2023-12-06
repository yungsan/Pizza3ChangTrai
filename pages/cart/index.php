<section>
    <div class="container-fluid page-header mb-5" style="background: none">
        <div class="container">
          <!-- cart header -->
          <!-- Cart body -->
          <div class=" row d-flex justify-content-center">
            <div class="col-10 bg-light shadow-lg p-3 mb-5 bg-body rounded">
              
              <div class="product_row">
                <!-- Product1 -->
                <?php
                  require_once('config/database.php');
                  $sql = "SELECT * FROM carts";
                  $result = $connect->query($sql);
                  if (!$result) {
                      echo "Error";
                      die();
                  }
                  while($row = $result->fetch_assoc())
                  echo'<div class="card_row card rounded-3 mb-4">
                  <div class="card-body p-4">
                    <div class="row d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <a href="?page=checkout">
                        <img class="img-fluid rounded-3" src="pages/admin/pages/products/' . $row['thumbnail'] . '" alt="thumbnail">
                        </a>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <a href="?page=checkout"><p class="lead fw-normal mb-2">' . $row['product_name'] . '</p></a>
                        <p><span class="text-muted">Size: </span>' . $row['size'] . '<span class="text-muted">
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <!-- <input type="number" value="9" class="price form-control form-control-sm" disabled> -->
                        <span class="price mb-0">' . number_format($row['price'], 0, '.', '.') . ' đ</span>
                        <!-- <h5 class="price mb-0">$9.00</h5> -->
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end mr-4">
                        <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
                <hr/>
                ';
                ?>
                <!-- end proodct1 -->
              </div>
              <!-- Cart footer -->
              <div class="card mb-4">
                <div class="card-body p-4 d-flex flex-row">
                  <div class="form-outline flex-fill">
                    <input type="text" id="form1" class="form-control form-control-lg" placeholder="Discound code"/>
                  </div>
                  <button type="button" class="btn btn-outline-warning btn-lg ms-3">Apply</button>
                </div>
              </div>

              <div class="card">
                <div class="card-body position-relative">
                  <span class="h4">Order total:$</span>
                  <!-- <span class="lead fw-normal h5">$</span> -->
                  <span class="total h4">XXXX</span>
                  <button type="button" class="btn btn-warning btn-block btn-lg position-absolute top-0 end-0 m-2">Thanh Toán</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</section>