<table border="1">
    <tr>
        <td>Название</td>
        <td>Количество</td>
        <td>Цена</td>
    </tr>    
<?php foreach($products as $product):?>
    <tr>
        <td><?=$product->title?></td>
        <td><?php echo $products_s[$product->id]?></td>
        <td><?php echo $product->cost * $products_s[$product->id]?></td>
        <td><a href="/bay/del/<?=$product->id?>">Удалить</a></td>
    </tr>
<?php endforeach?>

</table>
<a href="/bay/order">Оформить заказ</a>