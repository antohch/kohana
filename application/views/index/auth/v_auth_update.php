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
<form action="/auto/update/" method="post">
    <p><input name='first_name'>Имя</p>
    <p><input name='email'>Почта</p>
    <input type='submit' value='Обновить'>
</form>