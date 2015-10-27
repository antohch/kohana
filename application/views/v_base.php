<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title>Интернет магазин</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

</head>
<body>
<style  type="text/css">
//пример здесь: http://www.sitehere.ru/kolonki-odinakovoj-vysoty-na-css
body {
    color: #000; 
    background: #FFFFFF;
    word-wrap: break-word;
    font-size: 12px; 
    font-family: Verdana, Arial, Sans-Serif; 
}
#header 
{
    height:100px;
    background: #f86a6a;
}
#header h1
{
    text-align: center;
    padding-top: 30px;
}
#container 
{
    display: flex;
    min-width:1000px;
    margin: 0px auto;
}
#center 
{
    background: #ecf2db;
    min-width: 600px;

}
#left 
{
    float:left; 
    width:200px;
    background: #fcbfaf;
    flex-shrink:0;
}
#right 
{
    float:right; 
    width:200px;
    background: #fcbfaf;
    flex-shrink:0;
}
#right h3
{
    text-align: center;
}
#footer 
{
    height:100px;
    background: #6c9f8b;
    text-align: center;

}
.clear 
{
    clear:both;
}
#conUp
{
    display: flex; 
}
</style>
<div id="wrapper">
    <div id="header"><h1><?=$title?></h1></div>
    <div id="conUp">
        <div id="container">
            <div id="left">
                <ul>
                <?php foreach($menu as $name => $href): ?>
                    <li><a href="<?=$href?>"><?=$name?></a></li>
                <?php endforeach?>
                </ul>
            </div>
            <div id="center">
                <?=$content?>
            </div>
            <div id="right"><h3>Лучшей товар</h3><?=$best?></div>

            <div closs="clear"></div>
        </div>
    </div>
</div>
    <div id="footer"><?=$footer?></div>
</body>
</html>
