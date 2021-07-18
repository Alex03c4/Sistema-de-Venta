<div class=" mb-5  bg-white shadow-lg text-lg text-gray-600
 overflow-hidden   rounded-2xl  dark:bg-gray-700 ">
    <header class="flex justify-between py-3 px-6 ">
        <?php
        ?>
        <h2>
            <label for="">
                <span>
                    <?php
                    if (isset($menu[$data['titulo']])) { ?>

                        <i class="<?php echo $menu[$data['titulo']]['icono'] ?>"></i>
                    <?php
                    } else  if (isset($menuAdmin[$data['titulo']])) { ?>
                        <i class="<?php echo $menuAdmin[$data['titulo']]['icono'] ?>"></i>
                    <?php
                    }
                    ?>
                </span>
            </label>
            <?php echo $data['titulo'] ?>
        </h2>

        <div class="border-solid border-gray-600">
            <span><i class="fas fa-search"></i></span>
            <input type="search" placeholder="Busca aquí">
        </div>

        <div x-data="{ open:false }">

            <div>
                <button x-on:click="open = true" type="button" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                    <span class="sr-only">Open user menu</span>
                    <?php
                    if (isset($_SESSION['img']['url'])) { ?>
                        <img class="h-8 w-8 rounded-full" src="public/img/User/<?php echo $_SESSION['id'] . '/' . $_SESSION['img']['url'] ?>" alt="">
                    <?php
                    } else { ?>

                        <img class="h-8 w-8 rounded-full" src="public\img\User\defaul\user-male.png" alt="">

                    <?php
                    }
                    ?>

                </button>
            </div>




            <div x-show="open" x-on:click.away="open = false" class="origin-top-right absolute right-0 mt-1 mr-3 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="index.php?controllers=Perfil&a=edit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Perfil </a>
                <a href="index.php?controllers=Perfil&a=ViewDashboard" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Dashboard</a>
                <!-- <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a> -->
            </div>
        </div>
    </header>
</div>