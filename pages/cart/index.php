<section>
    <div class="container-fluid page-header mb-5" style="background: none">
        <div class="container mx-5">
          <!-- cart header -->
          <!-- Cart body -->
          <div class="row d-flex justify-content-center  mt-2">
            <div class="col-10 bg-light border rounded mx-4 p-3">              
              <div class="product_row">
                <!-- Product1 -->

                <?php
                  require_once('config/database.php');
                  $id = $_GET['id'];
                  $sql = "SELECT*FROM products WHERE id = $id";
                  $result = $connect->query($sql);
                  $row = $result->fetch_assoc();
                ?>
                <div class="card_row card rounded-3 mb-4">
                  <div class="card-body p-4">
                    <div class="row d-flex justify-content-between align-items-center">
                      <div class="col-md-2 col-lg-2 col-xl-2">
                        <a href="?page=checkout">
                        <!-- <img
                          src="https://via.placeholder.com/200x150"
                          class="img-fluid rounded-3" alt="Piza1"> -->
                          <?php
                            $images1 = $row['thumbnail'];
                            echo '<img style="object-fit: cover;" width="200" height="150" alt="hinh san pham" class="img-fluid rounded-3" src="'."pages/admin/pages/products/". $images1.'"/>';
                          ?>
                        </a>
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-3">
                        <a href="?page=checkout"><p class="lead fw-normal mb-2">
                          <?php
                            echo'<h5 class="">
                              '.$row['product_name'].'';
                            echo'</h5>';
                          ?>
                        </p></a>
                        <p><span class="text-muted">Size: </span>L <span class="text-muted">
                      </div>
                      <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                        <button class="minus btn btn-link px-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepDown()">
                          <i class="fas fa-minus"></i>
                        </button>

                        <input id="form1" min="1" name="quantity" value="1" type="number"
                          class="qty form-control form-control-sm" />

                        <button class="plus btn btn-link px-2"
                          onclick="this.parentNode.querySelector('input[type=number]').stepUp()">
                          <i class="fas fa-plus"></i>
                        </button>
                      </div>
                      <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                        <!-- <input type="number" value="9" class="price form-control form-control-sm" disabled> -->
                        <span class="price mb-0">
                          <?php
                            echo'<span class="act-price">
                              '.$row['price'].'đ';
                            echo'</span>';
                          ?>
                        </span>
                        <!-- <h5 class="price mb-0">$9.00</h5> -->
                      </div>
                      <div class="col-md-1 col-lg-1 col-xl-1 text-end mr-4">
                        <a href="#!" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                      </div>
                    </div>
                  </div>
                </div>
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
                  <span class="total h4">14</span>
                  <button type="button" class="btn btn-warning btn-block btn-lg position-absolute top-0 end-0 m-2">Proceed to Pay</button>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script> -->
    <script src="pages/cart/updatetotal.js" ></script>
</section>