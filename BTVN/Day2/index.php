<?php include 'req/read.php'; ?>
<section>
    <div>
        <a href="create.php" class="btn btn-success">Thêm mới</a>
    </div>
    <div>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Tên sản phẩm</th>
                    <th scope="col">Giá sản phẩm</th>
                    <th scope="col">Sửa</th>
                    <th scope="col">Xóa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $pr = read();
                foreach ($pr as $p) { ?>
                    <tr>
                        <td><?= $p['product_name'] ?></td>
                        <td><?= $p['price'] ?></td>
                        <td>
                            <a href='update.php?id=<?=$p['id']?>'>
                                <i class='fa-solid fa-pen-to-square text-primary'></i>
                            </a>
                        </td>
                        <td>
                            <a href='req/delete.php?id=<?=$p['id']?>'>
                                <i class='fa-solid fa-trash text-primary'></i>
                            </a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>