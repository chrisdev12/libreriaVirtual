<?php


$arr = array("key1" => "value1", "key2" => "value2");


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categorias Libreria Virtual</title>
</head>

<body>
    <!-- HEADER -->

    <div class="principal">
        <div id="side">
            SIDE
        </div>
        <div id="result">
            RESULT
        </div>
    </div>



    <!-- FOOTER -->

    <script type="text/javascript">
        let something = '<?php echo $arr; ?>'
        console.log(something)
    </script>
    <script src="js/categorias.js"></script>
</body>

</html>