<link rel="stylesheet" href="public/plugins/img-User/style.css">
<script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
<script src="public/plugins/img-User/script.js"></script>


<div class="ml-7 mt-3">
    <div class="content_uploader">
        <div class="box">
            <input class="filefield " type="file" name="Img" value="">
            <p class="select_bottom">Seleccionar un archivo</p>
            <div class="spinner"></div>
            <div class="overlay_uploader"></div>
        </div>
    </div>
</div>

<?php
if (isset($data["img"]["url"])) {
    $imgPhp = 'public/img/Producto/' . $data['producto']['id'] . '/' .  $data["img"]["url"];
} else {
    $imgPhp = 'public\img\Producto\defaul\Producto.png';
}
?>

<script type="text/javascript" defer>
    const imgJs = "<?php echo $imgPhp ?>";
    $('.box').css('background-image', 'url(' + imgJs + ')');
</script>




<!-- partial -->