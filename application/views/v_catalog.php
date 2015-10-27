<table border="1" width="100%">
    <thead>
        <tr>
            <th>Наименование</th>
            <th>Цена</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product => $cost):?>
        <tr>
            <td><?=$product?></td>
            <td><?=$cost?> руб.</td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>