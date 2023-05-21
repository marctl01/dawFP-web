<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            @if(auth()->user()->rol->name == 'profesor')
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-1">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Hola Profesor, {{ auth()->user()->name }}.
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-1">
                    

                    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 m-2">
                        <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                            Funciones
                        </h5>
                        <ul class="my-4 space-y-3">
                            <li>
                                <a href="{{ url('/adm_modulos') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <span class="flex-1 ml-3 whitespace-nowrap">Administrar Modulos</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/adm_uf') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <span class="flex-1 ml-3 whitespace-nowrap">Administar Unidades formativas</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/adm_evaluaciones') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <span class="flex-1 ml-3 whitespace-nowrap">Administar Evaluaciones</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{ url('/adm_users') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <span class="flex-1 ml-3 whitespace-nowrap">Administar Usuarios</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                


                </div>
            @else
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        Hola Alumno, {{ auth()->user()->name }}.
                    </div>

                    <div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow sm:p-6 dark:bg-gray-800 dark:border-gray-700 m-2">
                        <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                            Funciones
                        </h5>
                        <ul class="my-4 space-y-3">
                            <li>
                                <a href="{{ url('/evaluaciones') }}" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                                    <span class="flex-1 ml-3 whitespace-nowrap">Ver Evaluaciones</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
