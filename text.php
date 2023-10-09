<h1>hello</h1>


<?php
if(isset($_POST['name-size']))
{
    $name_size = $_POST['name-size'];
}
if(isset($_POST['name-toping']))
{
    $name_toping = $_POST['name-toping'];
    echo $name_toping;
}
if(isset($_POST['img']))
{
    $img = $_POST['img'];
    echo $img;
}


?>