
<body>

<h1>Products</h1>
<a href="/products/new">New product</a>


<?php foreach ($products as $product):?>

<h2>
    <a href="/products/<?=$product["id"]?>/showid">
    <?= htmlspecialchars($product["name"]) ?>

    </a>
</h2>

<?php endforeach;?>

</body>
</html>

<!--<h2>ID: --><?php //= $product['id']?><!-- </h2>-->
<!--<h2>Prod name:--><?php //= $product['name']?><!-- </h2>-->
<!--<p>Descr:   --><?php //= $product['description']?><!-- </p>-->
