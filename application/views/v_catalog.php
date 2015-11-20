<table border="1" width="100%">
    <thead>
        <tr>
            <th>Категории</th>
            <th>Картинки</th>
            <th>Наименование</th>
            <th>Цена</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($products as $product => $cost):?>
        <tr>
            <td><?php
                $cat = $cost->categori->find_all();
                foreach($cat as $cattext){
                    echo $cattext->title.' ';
                }
            ?></td>
            <td><?php
                $im = $cost->images->find_all()->as_array();
                //var_dump($im);
                if ($im){
                    foreach($im as $imFaile){
                        $nameImg = 'media/uploads/small_'.$imFaile->name;
                        if (file_exists($nameImg)){
                            echo "<img src='media/uploads/small_$imFaile->name'>";
                        }else{
                            echo "<img src='media/uploads/small_st.jpg'>";
                        }
                    }
                }else{
                    echo "<img src='media/uploads/small_st.jpg'>";
                }
            ?></td>
            <td><?=$cost->title?></td>
            <td><?=$cost->cost?> руб.</td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>