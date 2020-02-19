<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Document</title>
    <link rel="icon" type="image/png" href="<?php echo $icon_tittle; ?>" />
    <link rel="stylesheet" href="styles/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="img/slider/devSlider/engine1/style.css" />
</head>



<body>

<?php
    include 'navbar.php';
?>

    <div id="wowslider-container1">
        <div class="ws_images">
            <ul>
                <li><img src="img/slider/devSlider/data1/images/1.jpg" alt="" title="" id="wows1_0" /></li>
                <li><img src="img/slider/devSlider/data1/images/2.jpg" alt="" title="" id="wows1_1" /></li>
                <li><img src="img/slider/devSlider/data1/images/3.jpg" alt="" title="" id="wows1_2" /></li>
                <li><img src="img/slider/devSlider/data1/images/4.png" alt="" title="" id="wows1_3" /></li>
            </ul>
        </div>
        <div class="ws_bullets">
            <div>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/1.jpg" alt="" />1</span></a>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/2.jpg" alt="" />2</span></a>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/3.jpg" alt="" />3</span></a>
                <a href="#" title=""><span><img src="img/slider/devSlider/data1/tooltips/4.png" alt="" />4</span></a>
            </div>
        </div>
        <div class="ws_shadow"></div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/bootstrap/bootstrap.min.js"></script>
    <script type="text/javascript" src="img/slider/devSlider/engine1/wowslider.js"></script>
    <script type="text/javascript" src="img/slider/devSlider/engine1/script.js"></script>
</body>

</html>