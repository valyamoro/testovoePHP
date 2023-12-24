<?php foreach ($products as $product): ?>
    <a href="product/edit_product?id=<?= $product['id']; ?>">Название</a>;
    Описание <?php echo $product['description'] . '<br>'; ?>
    Цена <?php echo $product['price'] . '<br>'; ?>
    <span><?= $product['name']; ?></span>
    <label>
        <input type='number' value='<?= $product['price']; ?>' data-id=' <?= $product['id'] ?>' class='price-input'>
    </label>
    </div>";
    Изображение: <img src="<?= $product['image_path']; ?>" alt="Изображение">
    <span> <?= $product['product_name']; ?></span>
<?php endforeach; ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Обработчик события изменения в поле input
        document.querySelectorAll('.price-input').forEach(function (input) {
            input.addEventListener('input', function () {
                // Получаем значения поля input и id товара
                var newPrice = this.value;
                var productId = this.dataset.id;
                console.log(productId);
                // Отправляем данные на сервер для обновления цены
                fetch('update_price.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'productId=' + encodeURIComponent(productId) + '&newPrice=' + encodeURIComponent(newPrice),
                })
                    .then(response => response.text())
                    .then(data => {
                        // Обработка успешного ответа (по желанию)
                        console.log(data);
                    })
                    .catch(error => {
                        console.error('Ошибка:', error);
                    });
            });
        });
    });
</script>

<!---->
<!--<script src="/asserts/js/jquery-3.7.1.min.js">-->
<!--    $(document).on('change', '.change-price', function () {-->
<!--        const id = parseInt($(this).data('id'));-->
<!--        const value = parseInt($(this).val());-->
<!--        console.log(id, value, 'dwqqqqqqqqqqqqq');-->
<!--        // сделать проверки чтобы айдишник был целочисленным-->
<!--        // а value не был нулём.-->
<!--        console.log(id, value);-->
<!--        $.ajax({-->
<!--            url: '/update.php',-->
<!--            method: 'POST',-->
<!--            dataType: 'json',-->
<!--            data: {-->
<!--                type: 'updated_price',-->
<!--                id: id,-->
<!--                value: value,-->
<!--            },-->
<!--            success: function (data) {-->
<!--                console.log('response', data.id, data.value);-->
<!--            }-->
<!--        });-->
<!--    });-->

<!--    // $(() => {-->
<!--    //     $(document).on('change', '.change-price', function () {-->
<!--    //         const id = parseInt($(this).data('id'));-->
<!--    //         const value = parseInt($(this).val());-->
<!--    //-->
<!--    //         // сделать проверки чтобы айдишник был целочисленным-->
<!--    //         // а value не был нулём.-->
<!--    //         console.log(id, value);-->
<!--    //         $.ajax({-->
<!--    //             url: '/update.php',-->
<!--    //             method: 'POST',-->
<!--    //             dataType: 'json',-->
<!--    //             data: {-->
<!--    //                 type: 'updated_price',-->
<!--    //                 id: id,-->
<!--    //                 value: value,-->
<!--    //             }-->
<!--    //             function (data) {-->
<!--    //                 console.log('response', data.id, data.value);-->
<!--    //             }-->
<!--    //         })-->
<!--    //     });-->
<!--    // });-->
