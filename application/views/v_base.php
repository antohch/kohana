<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Интернет магазин</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<style  type="text/css">
body {
  color: #000; 
  background: #FFFFFF;
  word-wrap: break-word;
  font-size: 12px; 
  font-family: Verdana, Arial, Sans-Serif; 
}
#header {
  height:100px;
  background: #f86a6a ;
}
#header h1{
    text-align: center;
    padding-top: 30px;
}
#container {
  min-width:800px;
} 
#center {
  margin:0px 200px 0px 200px;
  background: #ecf2db ;
}
#left {
  float:left; 
  width:200px;
  background: #fcbfaf;
}
#right {
  float:right; 
  width:200px;
  background: #fcbfaf;
}
#right h3{
    text-align: center;
}
#footer {
  height:100px;
  background: #6c9f8b;
}
.clear {
  clear:both;
}

</style>
<div id="wrapper">
    <div id="header"><h1><?=$title?></h1></div>
	<div id="container">
            <div id="left">
                <ul>
                <?php foreach($menu as $name => $href): ?>
                    <li><a href="<?=$href?>"><?=$name?></a></li>
                <?php endforeach?>
                </ul>
            </div>
		<div id="right"><h3>Лучшей товар</h3><?=$best?></div>
		<div id="center">
                    <?=$content?>
                </div>
		<div></div>
	</div>
</div>
<div id="footer"><?=$footer?></div>
</body>
</html>
