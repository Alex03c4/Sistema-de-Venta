<?php

require_once "views\components\admin\header.php";
require_once "views\admin\component\layouts\sidebarTW.php";

?>

<!-- <a href="index.php?controllers=Perfil&a=edit">Perfil</a> -->

<div class="ml-16 mt-4 mr-3 lg:ml-64 ">
    <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">
        <pre>
        <?php
        var_dump($_SESSION);
        ?>
        </pre>
    </div>
</div>