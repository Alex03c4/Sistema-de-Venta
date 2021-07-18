<label for="country" class="  m-5  block text-base font-bold text-gray-700">Nivel de Usuario</label>
<div class="col-span-6 sm:col-span-4 m-5 flex -mt-3 ">
    
    <i class="fas fa-user-tag mt-3 mr-1"></i>
    <select id="rol"  name="rol" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">       
        <?php                    
            if ($data["user_role"]['id_role'] == 2) { ?>                
                    <option value="2">Administrador</option>
                    <option value="3">Empleado</option>
                <?php
            }else if ($data["user_role"]['id_role'] == 3)  {
                ?> 
                    <option value="3">Empleado</option>
                    <option value="2">Administrador</option>
                <?php
            
            }
        ?>
    </select>
</div>