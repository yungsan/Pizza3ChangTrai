<?php
require_once('config/database.php');
$user_id = $_SESSION['user_id'];
$result = $connect->query("SELECT username, email, sdt, address FROM users WHERE id='$user_id'");
$user = $result->fetch_assoc();
?>
<section>
    <div class="container-fluid page-header mb-5" style="background: none">
        <div class="row">
            <div class="col-md-3">
                <ul class="list-group">
                    <li class="list-group-item w-100">
                        <a href="#" class='text-primary w-100 nav-link fw-bold'>Thông tin tài khoản</a>
                    </li>
                    <li class="list-group-item">Đơn mua</li>
                    <li class="list-group-item">Lịch sử mua hàng</li>
                    <li class="list-group-item">Đã thích</li>
                    <li class="list-group-item">Đánh giá của tôi</li>
                    <li class="list-group-item">Trung tâm trợ giúp</li>
                    <li class="list-group-item">
                        <a href="?page=logout" class='text-black btn btn-primary w-100'>Đăng xuất</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <h3 class='fw-bold'>Thông tin tài khoản</h3>
                    </div>
                    <div class="col-md-6 mb-3 text-end">
                        <button class='btn btn-secondary' id="editButton">Chỉnh sửa thông tin</button>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="username" class="form-label">Tên tài khoản</label>
                        <input type="text" class="form-control" id="username" value=<?php echo $user["username"] ?>
                            readonly disabled>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" value=<?php echo $user["email"] ?> readonly
                            disabled>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="sdt" class="form-label">Số điện thoại</label>
                        <input type="text" class="form-control" id="sdt" value="<?php echo $user["sdt"] ?>" readonly
                            disabled>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label for="address" class="form-label">Địa chỉ</label>
                        <textarea class="form-control" placeholder="Leave a comment here" id="address" rows="10"
                            disabled readonly><?php echo $user["address"] ?>
                        </textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    let editing = false;
    document.querySelector('#editButton').addEventListener('click', (e) => {
        editing = !editing;
        document.querySelectorAll('.form-control').forEach(input => {
            if (editing) {
                e.target.innerText = "Lưu";
                input.removeAttribute('readonly');
                input.removeAttribute('disabled');
                return;
            }
            else {
                input.setAttribute('readonly', '');
                input.setAttribute('disabled', '');
            }
        })
    })
</script>