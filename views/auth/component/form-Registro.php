<!-- component -->
<div class="font-sans">
    <div class="relative min-h-screen flex flex-col sm:justify-center items-center bg-gray-100 ">
        <div class="relative sm:max-w-sm w-full">
            <div class="card bg-blue-400 shadow-lg  w-full h-full rounded-3xl absolute  transform -rotate-6"></div>
            <div class="card bg-green-400 shadow-lg  w-full h-full rounded-3xl absolute  transform rotate-6"></div>
            <div class="relative w-full rounded-3xl  px-6 py-4 bg-gray-100 shadow-md">
                <label for="" class="block text-sm text-gray-700 text-center font-semibold">
                    Registro
                </label>
                <form name="Registro-User-form" id="Registro-User" method="post" action="index.php?controllers=Auth&a=Registro" 
                role="form" class="mt-10">
                    <!--                 
                    <div>
                        <input type="text" placeholder="Name" 
                            class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                        >
                    </div>
                     -->
                    <div class="mt-7">                
                        <input type="email" placeholder="Email" name="email" 
                            class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                        >                           
                    </div>

                    <div class="mt-7">                
                        <input type="password" placeholder="Contraseña" name="pass"
                            class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                        >                           
                    </div>

                    <div class="mt-7">                
                        <input type="password" placeholder="Confirmar contraseña" name="passConfir"
                            class="mt-1 block w-full border-none bg-gray-100 h-11 rounded-xl shadow-lg hover:bg-blue-100 focus:bg-blue-100 focus:ring-0"
                        >                           
                    </div>                    
        
                    <div class="mt-7">
                        <input type="hidden" name="Registro-User" value="Iniciar">
                        <input type="submit" value="Registrar" 
                        class="bg-blue-500 w-full py-3 rounded-xl text-white shadow-xl hover:shadow-inner focus:outline-none transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105" /> 
                    </div>
        

                    <div class="flex mt-7 items-center text-center">
                        <hr class="border-gray-300 border-1 w-full rounded-md">
                        <label class="block font-medium text-sm text-gray-700 w-full">
                            Registrate con
                        </label>
                        <hr class="border-gray-300 border-1 w-full rounded-md">
                    </div>
        
                    <div class=" mt-7 flex justify-center w-full">
                        <button class="text-2xl mr-5 bg-blue-500 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">                         
                            <i class="fab fa-facebook"></i>
                        </button>
                                
                
                        <button class="text-2xl bg-red-500 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    <i class="fab fa-google"></i>
                        </button>

                        <button class="ml-4 text-2xl bg-gray-700 border-none px-4 py-2 rounded-xl cursor-pointer text-white shadow-xl hover:shadow-inner transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                    <i class="fab fa-github-alt"></i>
                        </button>
                    </div>
        
                    <div class="mt-7">                  
                        <div class="flex justify-center items-center">
                            <label class="w-full text-sm text-gray-600">¿Ya tienes una cuenta?</label>
                            <a href="index.php?controllers=Auth&a=ViewLogin" class="w-full text-blue-500 transition duration-500 ease-in-out  transform hover:-translate-x hover:scale-105">
                                Login
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>