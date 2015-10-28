<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">
<head>
	<title><?=$site_name?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <?php foreach($styles as $file_style): ?>
            <?=html::style($file_style)?>
        <?php endforeach?>
        <?php foreach($scripts as $file_script): ?>
            <?=html::script($file_script)?>
        <?php endforeach?>
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
    width: 100%;

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
    <div id="header"><h1><?=$site_name?><br><?=$site_description?></h1></div>
    <div id="conUp">
        <div id="container">
                <?php if (isset($block_left)): ?>
                    <div id="left">
                        <ul>
                            <?php foreach($block_left as $name => $href): ?>
                                <li><a href="<?=$href?>"><?=$name?></a></li>
                            <?php endforeach?>
                        </ul>
                    </div>
                <?php endif?>
            <div id="center">
                <?php if(isset($block_center)):?>
                    <h2><?=$page_title?></h2>
                    <?php foreach($block_center as $cblock): ?>
                        <?=$cblock?>
                    <?php endforeach?>
                <?php endif;?>
            </div>
                <?php if(isset($block_right)):?>
                    <div id="right">
                            <?php foreach($block_right as $rblock): ?>
                                <?=$rblock?>
                            <?php endforeach?>
                    </div>
                <?php endif;?>
            <div closs="clear"></div>
        </div>
    </div>
</div>
    <div id="footer"><?=$page_footer?></div>
</body>
</html>
