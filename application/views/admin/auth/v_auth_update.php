<p>Учетная запись</p>
<?php // if($errors){
 //    print_r($errors);
 //   foreach($errors as $k => $ms){
  //      if (is_array($ms)){
  //          foreach($ms as $km => $text){
  //              echo $k.' => '.$km.' => '.$text.'<br>';
  //          }
   //     }else{
   //         echo $k.' => '.$ms.'<br>';
   //     }
  //  }
      //  foreach($ms as $text){
          //  echo $text.'<br>';};}
   // }?>
<form action="/admin/auth/update/<?=$id?>" method="post">
    <p><input name='first_name' value="<?=$user->first_name;?>">Имя</p>
    <p><input name='email' value="<?=$user->email;?>">Почта</p>
    <input type='submit' value='Обновить'>
</form>

