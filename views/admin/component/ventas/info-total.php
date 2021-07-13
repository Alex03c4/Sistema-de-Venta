<div class="bg-gray-100 mt-2 rounded-2xl grid grid-cols-2">
    <div id="Tipo-pago" class="my-3 mx-5 font-bold mr-20">
        <h2>Forma de pago :</h2>
        <div x-data="{ open: false }" class="grid grid-cols-2">
            
            <div class="mt-1">
                <input x-on:click="open= false" checked type="radio" id="Tarjeta" name="radio" value="Tarjeta">
                <label for="Tarjeta">Tarjeta</label>
            </div>
            <div class="mt-1">
                <input x-on:click="open= false" type="radio" id="Efectivo" name="radio" value="Efectivo">
                <label for="Efectivo">Efectivo</label>
            </div>
            <div class="mt-1">
                <input x-on:click="open= false"  type="radio" id="Transferencia" name="radio" value="Transferencia">
                <label for="Transferencia">Transferencia</label>
            </div>

            <div class="mt-1">
                <input x-on:click="open= false" type="radio" id="Divisa" name="radio" value="Divisa">
                <label for="Divisa">Divisa</label>
            </div>
            <div class="mt-1">
                <input x-on:click="open= false" type="radio" id="Credito" name="radio" value="Credito">
                <label for="Credito">A Crédito</label>
            </div>
            <div class="mt-1 relative">
                <input x-on:click="open= true"  type="radio" id="Otros" name="radio" value="Otros">
                <label for="Otros">Otros</label>


                <div x-show="open" class="mb-1 absolute ml-24 -mt-20 ">
                    <textarea x-ref="input"  name="desc-venta" id="" class="border-2 border-gray-200 rounded-md p-2 focus:outline-none focus:ring-4 focus:ring-indigo-50 focus:border-indigo-300" placeholder="Por favor una breve Descripción"></textarea>
                </div>
            </div>
        </div>



    </div>



    <div id="Total" class="flex flex-row-reverse">
        <div id="cuenta">
            <div class="m-5 font-bold mr-20">
                <h2>Total :</h2>
                <div class="ml-4">
                    <div id="dolar">
                        <span>$</span> <span id="Totalust"></span>
                    </div>
                    <div>
                        <span>Bs</span> <span id="bsf"></span>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>