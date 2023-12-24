<?php foreach ($products as $product): ?>
    <a href="product/edit_product/?id=<?= $product['id']; ?>">Название</a>;
    Описание <?php echo $product['description'] . '<br>'; ?>
    Цена <?php echo $product['price'] . '<br>'; ?>
    <label>
        <input type='number' value=' <?= $product['price'] ?>' data-product-id=' <?= $product['id'] ?>' class='price-input'>
    </label>
    Картинка: <img src="<?= $product['image_path']; ?>" alt="Картинка">
    <span> <?= $product['product_name']; ?></span>
<?php endforeach; ?>
