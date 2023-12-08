<?php 
session_start();
include('../../includes/admin_header.php');
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

if ($page === 'dashboard'){
    include('./pages/dashboard.php');
}
else if ($page === 'users'){
    include('pages/users/index.php');
}
else if ($page === 'products'){
    include('pages/products/index.php');
}
else if ($page === 'create_product'){
    include('pages/products/create.php');
}
else if ($page === 'categories'){
    include('pages/categories/index.php');
}
else if ($page === 'order'){
    include('pages/order/index.php');
}
else if ($page === 'create_category'){
    include('pages/categories/create.php');
}
include('../../includes/admin_footer.php');
?>