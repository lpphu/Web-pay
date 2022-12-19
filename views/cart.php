<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Giỏ Hàng</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</head>
<body>

<style>

</style>
<div class="container">
    <h2>Giỏ hàng</h2>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>STT</th>
            <th>Tên sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Thành tiền</th>
        </tr>
        </thead>
        <tbody>
        
        <tr>
            <td colspan="7" style="text-align: right">
                <button type="button" class="btn btn-success">Cập nhật giỏ hàng</button>
                <button type="button" class="btn btn-danger">Thanh toán</button>
            </td>
        </tr>
        </tbody>
    </table>
</div>
</body>
<script src="../js/cart.js"></script>
</html>