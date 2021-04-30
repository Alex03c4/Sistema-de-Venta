<?php
$menu = array(
  'Dashboard' => array(
    'icono' =>  'fas fa-tachometer-alt',
    'url'   =>  'views\admin\Dashboard.php'
  ),

  'Ventas' =>  array(
    'icono' =>  'fas fa-calculator',
    'url'   =>  'index.php?controllers=Perfil&a=ViewDashboard'
  ),
);

$menuAdmin = array(
  'Usuarios' => array(
    'icono' =>  'fas fa-users',
    'url'   =>  '#'
  ),

  'Productos' =>  array(
    'icono' =>  'fas fa-people-carry',
    'url'   =>  '#'
  ),
);

?>


<div id="sidebar" class="bg-gray-600 h-full w-60 fixed text-gray-400 border-r-2 border-gray-700 invisible lg:visible">

  <div id="sidebar-brand" class="flex justify-around p-4 bg-gray-800 text-lg border-b border-gray-500 ">
    <div class="hover:text-gray-100 cursor-pointer">
      <h2>Larense<span>Supermar</span></h2>
    </div>

    <div class="hover:text-gray-100 text-xl cursor-pointer">
      <i class="fas fa-times"></i>
    </div>



  </div><!-- #sidebar-brand -->

  <div id="User" class="border-b border-gray-500">
    <?php
    if (isset($data["img"]["url"])) { ?>
      <div id="img" class="float-left w-14 h-14 p-0.5 mx-3 mt-2 border-ra overflow-hidden rounded-full">
        <img class="h-14 w-14 rounded-full" src="public/img/User/<?php echo $_SESSION['id'] . '/' . $data["img"]["url"] ?>" alt="">
      </div>

    <?php
    } else { ?>
      <div id="img" class="float-left w-14 h-14 p-0.5 mx-3 mt-2 border-ra overflow-hidden rounded-full">
        <img class="h-14 w-14 rounded-full" src="public\img\User\defaul\user-male.png" alt="">
      </div>
    <?php
    }
    ?>




    <div class="p-3">
      <div id="user-info">
        <span><?php echo $data["profiles"]["nombre"] . " "; ?><strong> <?php echo $data["profiles"]["apellido"]; ?></strong></span>
      </div>
      <div id="user-role">
        <span>Administrator</span>
      </div>
    </div>
  </div><!-- #User -->


  <div id="sidebar-menu" class="px-2">
    <div id="general">
      <h3 class="mt-4 p-0.5 text-lg">General</h3>
      <ul>
        <?php
        foreach ($menu as $key => $value) { ?>
          <li>
            <a href="<?php echo $value['url'] ?>">
              <div class="w-full text-lg p-3 transition-all hover:text-gray-100  hover:bg-gray-800 rounded-full">
                <span><i class="<?php echo $value['icono'] ?>"></i></span>
                <span class="px-0.5"><?php echo $key ?></span>
              </div>
            </a>
          </li>
        <?php

        }
        ?>
      </ul>
    </div><!-- general -->

    <div id="admin">
      <h3 class="mt-4 p-0.5 text-lg">Admin</h3>
      <ul>
        <?php

        foreach ($menuAdmin as $key => $value) { ?>
          <li>
            <a href="<?php echo $value['url'] ?>">
              <div class="w-full text-lg p-3 transition-all hover:text-gray-100 hover:bg-gray-800 rounded-full">
                <span><i class="<?php echo $value['icono'] ?>"></i></span>
                <span class="px-0.5"><?php echo $key ?></span>
              </div>
            </a>
          </li>
        <?php

        }
        ?>
      </ul>
    </div><!-- admin -->
  </div><!-- sidebar-menu -->

  <div class="absolute bottom-0 flex bg-gray-800 w-full ">
    <div class="flex-grow text-center h-8 relative my-2">
      <a href="#" class="px-4 hover:text-white">
        <i class="fa fa-bell"></i>

      </a>
      <a href="#" class="px-5 hover:text-white">
        <i class="fa fa-envelope"></i>

      </a>
      <a href="#" class="px-5 hover:text-white">
        <i class="fa fa-cog"></i>

      </a>
      <a href="#" class="px-5 hover:text-white">
        <i class="fa fa-power-off"></i>
      </a>
    </div>
  </div>

</div><!-- #sidebar -->






<div id="sidebar-movil" class="bg-gray-600 h-full w-14 fixed text-gray-400 border-r-2 border-gray-700 visible  lg:invisible">
  <div class="text-center py-3 hover:text-gray-300 cursor-pointer bg-gray-800 text-2xl  shadow-lg">
    <i class="fas fa-arrow-circle-right"></i>
  </div><!-- icono-movil -->


  <div id="general" class="text-center">
    <h3 class="mt-4 p-0.5 text-lg">G</h3>
    <ul>
      <?php
      foreach ($menu as $key => $value) { ?>
        <li>
          <a href="<?php echo $value['url'] ?>">
            <div class="w-full text-lg  p-3 transition-all hover:text-gray-100 hover:bg-gray-800 rounded-full">
              <span><i class="<?php echo $value['icono'] ?>"></i></span>

            </div>
          </a>
        </li>
      <?php

      }
      ?>
    </ul>
  </div><!-- general -->


  <div id="admin-movil" class="text-center">
    <h3 class="mt-4 p-0.5 text-lg">A</h3>
    <ul>
      <?php

      foreach ($menuAdmin as $key => $value) { ?>
        <li>
          <a href="<?php echo $value['url'] ?>">
            <div class="w-full text-lg  p-3 transition-all hover:text-gray-100 hover:bg-gray-800 rounded-full">
              <span><i class="<?php echo $value['icono'] ?>"></i></span>

            </div>
          </a>
        </li>
      <?php

      }
      ?>
    </ul>
  </div><!-- admin-movil -->

</div><!-- sidebar-menu -->
</div><!-- sidebar-movil -->










<div class="ml-14 lg:ml-60 bg-white shadow-lg text-lg text-gray-600">
  <header class="flex justify-between py-3 px-6 ">
    <h2>
      <label for="">
        <span>
          <?php
          if (isset($menu[$data['titulo']])) { ?>

            <i class="<?php echo $menu[$data['titulo']]['icono'] ?>"></i>
          <?php
          } else { ?>

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
          if (isset($data["img"]["url"])) { ?>
            <img class="h-8 w-8 rounded-full" src="public/img/User/<?php echo $_SESSION['id'] . '/' . $data["img"]["url"] ?>" alt="">
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
        <a href="index.php?controllers=Perfil&a=edit" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Profile</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
        <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
      </div>
    </div>
  </header>
</div>