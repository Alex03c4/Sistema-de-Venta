<?php
require_once "views\components\admin\header.php";
require_once "views\admin\component\layouts\sidebarTW.php";

?>
<script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js" defer></script>
<script src="public\js\MyScript\Producto\Producto.js" defer></script>
<script src="public\js\MyScript\ajax.js" defer></script>

<!-- <a href="index.php?controllers=Perfil&a=edit">Perfil</a> -->
<div class="ml-16 mt-4 mr-3 lg:ml-64 ">
    <div class="bg-white  overflow-hidden  shadow-lg rounded-2xl p-4  dark:bg-gray-700 w-full ">
        <form name="login-perfil-form" id="Updates-perfil" class="Updates" method="post" action="index.php?controllers=Empresa&a=update" enctype="multipart/form-data">
            <!-- <form name="info-Producto-form" class="Updates" method="post" action="index.php?controllers=Producto&a=Insert"> -->
            <div>

                <div class="bg-gray-100  rounded-2xl gap-y-5">
                    <div class="bg-blue-500 text-white text-lg font-semibold transition-colors  shadow-lg rounded-2xl flex justify-between p-2">
                        <div>
                            <h2>Producto</h2>
                        </div>
                        <div class="cursor-pointer mx-4">
                            <i class="fas fa-window-minimize"></i>
                        </div>
                    </div>

                    <div>
                        <?php require_once 'views\admin\component\Empresa\info-Empresa.php'; ?>
                    </div>
                </div>
            </div>
    </div>
</div>
<div class="px-4 py-3  text-right sm:px-6">
    <input type="hidden" name="Update" value="actualizar">
    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-base font-bold rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Save
    </button>
</div>
</form>
</div>
</div>