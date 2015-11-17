<a href="/admin/auth/reg">Создать администратора</a>
<table border="0" width="100%" class="tbl" cellpadding="0" cellspacing="0">
    <thead>
        <tr height="30">
            <th >Логин</th>
            <th >Имя</th>
            <th >Почта</th>
            <th>Права</th>
            <th >Действие</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($user as $title => $value):?>
            <?php if (is_object($value)):?>
                <tr>
                    <td>
                        <?php echo $value->username;?>
                    </td>
                    <td>
                        <?php echo $value->first_name;?>
                    </td>
                    <td>
                        <?php echo $value->email;?>
                    </td>
                    <td>
                        <?php $role = $value->roles->find_all();
                        foreach ($role as $roleName){
                            echo $roleName->name.' ';
                        }
                        ?>
                    </td>
                    <td>
                        <a href="/admin/auth/del/<?=$value->id?>">Удалить</a>
                        <a href="/admin/auth/update/<?=$value->id?>"> / Изменить</a>
                    </td>
                </tr>
            <?php endif;?>
        <?php endforeach?>
    </tbody>
</table>



    