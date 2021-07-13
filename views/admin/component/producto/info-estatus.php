
<div class="mt-8 ml-5 block text-base font-bold text-gray-700">
<label class="flex items-center relative w-max cursor-pointer select-none">
  <span class=" mr-3">Estatus :</span>
  <input type="checkbox" name="estatus" class="appearance-none transition-colors cursor-pointer w-14 h-7 rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-black focus:ring-blue-500 bg-red-500" />
  <span class="absolute font-medium text-xs uppercase right-1 text-white"> OFF </span>
  <span class="absolute font-medium text-xs uppercase right-8 text-white"> ON </span>
  <span class="w-7 h-7 right-7 absolute rounded-full transform transition-transform bg-gray-200" />
</label>
</div>

<style>
  input:checked {
    background-color: #22c55e; /* bg-green-500 */
  }

  input:checked ~ span:last-child {
    --tw-translate-x: 1.75rem; /* translate-x-7 */
  }
</style>