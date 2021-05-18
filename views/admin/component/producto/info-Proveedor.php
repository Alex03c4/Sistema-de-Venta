<div class="col-span-6 sm:col-span-4 m-5 ">
    <label for="country" class="block text-base font-bold text-gray-700">Proveedor</label>

    <select id="Proveedor" name="id_proveedor" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
        <!-- <option value="-1" selected="" disabled="">Select one</option> -->
        <option value="0">Nuevo Producto</option>
        <?php
        foreach ($data['proveedor'] as $key) { ?>
            <option value="<?php echo $key->id ?>">
                <?php echo $key->nombre ?>
            </option>
        <?php } ?>

    </select>
</div>