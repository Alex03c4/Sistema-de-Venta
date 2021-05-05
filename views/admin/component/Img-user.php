 <link rel="stylesheet" href="public\plugins\img-User\style.css">
 <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
 <script src="public\plugins\img-User\script.js"></script>

 <div class="container mx-auto mt-20">
     <div class="md:grid md:grid-cols-3 md:gap-6">
         <div class="md:col-span-1">
             <div class="px-4 sm:px-0">
                 <h3 class="text-lg font-medium leading-6 text-gray-900">Imagen del Usuario.</h3>
                 <p class="mt-1 text-sm text-gray-600">
                     Actualice la Foto de Perfil
                 </p>
             </div>
         </div>

         <div class="mt-5 md:mt-0 md:col-span-2">
             <form name="login-User-form" id="Updates-img" class="Updates" method="post" action=" <?php
                    if (isset($data["img"]["url"])) {
                        $_SESSION['aux'] = 'Update';
                        echo 'index.php?controllers=Image&a=imgUserUpdate';
                    } else {
                        $_SESSION['aux'] = 'Insert';
                        echo 'index.php?controllers=Image&a=imgUserInsert';
                    }
                    ?>
                        " enctype="multipart/form-data">
                 <div class="shadow sm:rounded-md sm:overflow-hidden">
                     <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                         <div class="grid grid-cols-3 gap-6">
                             <div class="col-span-3 sm:col-span-2">


                                 <div class="content_uploader">
                                     <div class="box">
                                         <input class="filefield " type="file" name="ImgUser" value="">
                                         <p class="select_bottom">Seleccionar un archivo</p>
                                         <div class="spinner"></div>
                                         <div class="overlay_uploader"></div>
                                     </div>
                                 </div>

                                 <!-- partial -->

                                 <?php
                                    if (isset($data["img"]["url"])) {
                                        $imgPhp = 'public/img/User/' . $_SESSION['id'] . '/' . $data["img"]["url"];
                                    } else {
                                        $imgPhp = 'public/img/User/defaul/user-male.png';
                                    }
                                    ?>

                                 <script type="text/javascript" defer>
                                     const imgJs = "<?php echo $imgPhp ?>";
                                     $('.box').css('background-image', 'url(' + imgJs + ')');
                                 </script>

                             </div>
                         </div>
                         <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                             <input type="hidden" name="Update-User" value="actualizar">
                             <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                 Save
                             </button>
                         </div>
                     </div>
             </form>
         </div>
     </div>
 </div>