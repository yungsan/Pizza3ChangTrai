<section class="h-80 bg-light mt-5 ">
  <div class="container py-5 h-80">
    <div class="row d-flex justify-content-center align-items-center h-80">
      <div class="col">
        <div class="card card-registration my-4">
          <form action="pages/products/update.php" method="POST" enctype="multipart/form-data" autocomplete="off">
          <div class="row g-0 ">
            <div class="col-xl-4 d-none d-xl-block">
                <div class="ecommerce-gallery" data-mdb-zoom-effect="true" data-mdb-auto-height="true">
                    <div class="row py-3 shadow-5 mx-2">
                        <div class="col-12 mb-2">
                            <div class="lightbox">
                                <img
                                src="assets/images/blank_img.webp"
                                alt="Gallery image 1"
                                class="ecommerce-gallery-main-img active w-100 rounded border border-warning" id="thumnail" onclick="triggerFileInput()"
                                />
                                <input type="file" name="productImage[]" id="inputImage" hidden>
                            </div>
                        </div>
                        <div class="col-3 mt-1">
                            <img
                                src="assets/images/blank_img.webp"
                                data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/14a.webp"
                                alt="Gallery image 1"
                                class="active w-100 border border-warning rounded"
                            />
                        </div>
                        <div class="col-3 mt-1">
                            <img
                                src="assets/images/blank_img.webp"
                                data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/12a.webp"
                                alt="Gallery image 2"
                                class="w-100 border border-warning rounded"
                            />
                        </div>
                        <div class="col-3 mt-1">
                            <img
                                src="assets/images/blank_img.webp"
                                data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/13a.webp"
                                alt="Gallery image 3"
                                class="w-100 border border-warning rounded"
                            />
                        </div>
                        <div class="col-3 mt-1">
                            <img
                                src="assets/images/blank_img.webp"
                                data-mdb-img="https://mdbcdn.b-cdn.net/img/Photos/Horizontal/E-commerce/Vertical/15a.webp"
                                alt="Gallery image 4"
                                class="w-100 border border-warning rounded"
                            />
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-xl-8">
                <div class="card-body p-md-4 text-black">
                    <h4 class="mb-4 text-uppercase">Tạo sản phẩm</h4>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="form-outline">
                            <label class="form-label" for="productName">Tên sản phẩm</label>
                            <input type="text" name="productName" id="productName" class="form-control form-control-lg" placeholder="Nhập tên sản phẩm" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-4">
                            <label class="form-label" for="productPrice">Đơn giá</label>
                            <div class="input-group input-group-lg">
                                <input type="text" name="productPrice" id="productPrice" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Nhập giá tiền">
                                <span class="input-group-text" id="inputGroup-sizing-lg">VNĐ</span>
                            </div>
                        </div>
                    </div>
                    <div class="row mx-1 mb-3">
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                            <label class="form-check-label" for="flexRadioDefault1">
                                Default radio
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Default checked radio
                            </label>
                        </div>
                        <div class="form-check col">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                            <label class="form-check-label" for="flexRadioDefault2">
                                Default checked radio
                            </label>
                        </div>
                    </div>

                    <div class="mb-2">
                        <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example">
                            <option selected>hình thức sản phẩm</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-md-3 mb-4">
                            <div class="form-outline">
                                <label class="form-label" for="form3Example1m">Số lượng</label>
                                <input type="text"  class="form-control form-control-lg" value=""/>
                            </div>
                        </div>
                        <div class="col-md-9 mb-4">
                            <label class="form-label" for="form3Example1m">Chi nhánh hỗ trợ giao hàng</label>
                            <div class="input-group input-group-lg">
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="Nhập địa chỉ">
                            </div>
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Chi tiết</span>
                        <textarea name="ChiTietSanPham" id="ChiTietSanPham" class="form-control" aria-label="With textarea"></textarea>
                    </div>
                    <div class="d-flex justify-content-end pt-3">
                    <button type="submit" class="btn btn-warning btn-lg ms-2">Cập nhật sản phẩm</button>
                    </div>
                </div>
                </div>
          </div>
          </form>
        </div>
      </div>
    </div>
  </div>

    <script>
        // images change
        function triggerFileInput() {
            document.getElementById('inputImage').click();
        }

        document.getElementById('inputImage').addEventListener('change', function(event) {
            var input = event.target;
            var reader = new FileReader();

            reader.onload = function(){
                var image = document.getElementById('thumnail');
                image.src = reader.result;
            };

            reader.readAsDataURL(input.files[0]);
        });



    </script>
</section>