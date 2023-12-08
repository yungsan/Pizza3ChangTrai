<?php
$row = $_SESSION['user'];
?>
<section>
    <div class="container-fluid page-header mb-5" style="background: none">
        <div class="row">
            <div class="col-md-3">
                <div style="width: 100%; height: auto; margin: 0 auto;" id="user_avatar">
                    <div class="bg"></div>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                        <path d="M12 9a3.75 3.75 0 100 7.5A3.75 3.75 0 0012 9z" />
                        <path fill-rule="evenodd"
                            d="M9.344 3.071a49.52 49.52 0 015.312 0c.967.052 1.83.585 2.332 1.39l.821 1.317c.24.383.645.643 1.11.71.386.054.77.113 1.152.177 1.432.239 2.429 1.493 2.429 2.909V18a3 3 0 01-3 3h-15a3 3 0 01-3-3V9.574c0-1.416.997-2.67 2.429-2.909.382-.064.766-.123 1.151-.178a1.56 1.56 0 001.11-.71l.822-1.315a2.942 2.942 0 012.332-1.39zM6.75 12.75a5.25 5.25 0 1110.5 0 5.25 5.25 0 01-10.5 0zm12-1.5a.75.75 0 100-1.5.75.75 0 000 1.5z"
                            clip-rule="evenodd" />
                    </svg>

                    <img src="<?php echo $row['avatar']; ?>" alt="user avatar"
                        class=' border rounded w-100 h-100 rounded-circler' style="object-fit: cover" id="avatar">
                    <input type="file" name="avatar" id="inputFile" hidden>
                    <div class="bg-danger rounded text-white position-absolute end-0 top-0 m-2 py-1 px-3 d-none"
                        id="warning">New!</div>
                </div>
                <button class="btn btn-secondary w-100 p-2 my-2 d-none" id="updateAvatarButton">Cập nhật hình
                    ảnh</button>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-8 mb-3">
                        <h3 class='fw-bold'>Thông tin tài khoản</h3>
                    </div>
                    <div class="col-md-4 mb-3 text-end">
                        <button class='w-100 btn btn-secondary' id="editButton">Chỉnh sửa thông tin</button>
                        <button class='w-100 btn btn-secondary' id="saveButton" style="display: none;">Lưu thông
                            tin</button>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control" id="username" value='<?php echo $row["username"] ?>'
                            readonly disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="fullname" class="form-label">Họ tên</label>
                        <input type="text" class="form-control" id="fullname" value='<?php echo $row["fullname"] ?>' readonly
                            disabled>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value='<?php echo $row["email"] ?>' readonly
                            disabled>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="sdt" value="<?php echo $row["sdt"] ?>" readonly
                            disabled>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <textarea class="form-control" placeholder="Your address here" id="address" rows="10" disabled
                            readonly><?php echo $row["address"] ?></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item w-100 py-3">
                        <a href="?page=user" class='text-primary w-100 nav-link fw-bold'>
                            Thông tin tài khoản
                        </a>
                    </li>
                    <li class="list-group-item w-100 py-3">
                        <a href="?page=user&nav=purchaseHistory" class='text-black'>
                            Lịch sử mua hàng
                        </a>
                    </li>
                    <li class="list-group-item w-100 py-3">Đã thích</li>
                    <li class="list-group-item w-100 py-3">Voucher</li>
                    <li class="list-group-item w-100 py-3">Đánh giá của tôi</li>
                    <li class="list-group-item w-100 py-3">Trung tâm trợ giúp</li>
                    <a href="?page=logout" class='mt-3 p-3 text-black btn btn-primary w-100'>Đăng xuất</a>
                </ul>
            </div>
        </div>
    </div>
</section>

<script>
    const editButton = document.querySelector('#editButton');
    const saveButton = document.querySelector('#saveButton');
    const inputs = document.querySelectorAll('.form-control');
    editButton.addEventListener('click', (e) => {
        editButton.style.display = "none";
        saveButton.style.display = "block";
        inputs.forEach(input => {
            input.removeAttribute('readonly');
            input.removeAttribute('disabled');
        });
    });
    saveButton.addEventListener('click', (e) => {
        editButton.style.display = "block";
        saveButton.style.display = "none";
        inputs.forEach(input => {
            input.setAttribute('readonly', '');
            input.setAttribute('disabled', '');
        });
    });

    const warning = document.querySelector('#warning');
    const fileInput = document.querySelector('#inputFile');
    const updateAvatarButton = document.querySelector('#updateAvatarButton');
    document.querySelector('.bg').addEventListener('click', () => {
        fileInput.click();
    })

    fileInput.onchange = evt => {
        const img = document.querySelector('#avatar');
        const [file] = fileInput.files

        if (file && file.name != "simple_avatar.webp") {
            warning.classList.remove('d-none');
            updateAvatarButton.classList.remove('d-none');
        }
        else {
            warning.classList.add('d-none');
            updateAvatarButton.classList.add('d-none');
        }
        img.src = URL.createObjectURL(file)
    }
</script>

<script>
    $(document).ready(function () {
        $("#saveButton").on("click", function (e) {
            editUser();
        });
        $("#updateAvatarButton").on("click", function (e) {
            updateAvatar();
        });
    });

    function updateAvatar() {
        const avatar = $('#inputFile')[0].files[0];
        const formData = new FormData();
        formData.append('avatar', avatar);
        $.ajax({
            url: "./pages/profile/update_avatar.php",
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                alert(response);
            },
            error: function (error) {
                alert(error);
            }
        });
    }

    function editUser() {
        const username = $("#username").val();
        const email = $("#email").val();
        const sdt = $("#sdt").val();
        const fullname = $("#fullname").val();
        const address = $("#address").val();
        const myData = {
        username, email, sdt, address, fullname
        };
        console.log(myData);
        $.ajax({
            url: "./pages/profile/update_info.php",
            type: "post",
            data: (myData),
            cache: false,
            success: function (response) {
                alert(response);
            },
            error: function (error) {
                alert(error);
            },
        });
    }
</script>