<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3"> Nombre Modulo </th>
                                    <th scope="col" class="px-6 py-3"> Nombre Unidad Formativa </th>
                                    <th scope="col" class="px-6 py-3"> Nota </th>
                                    <th scope="col" class="px-6 py-3">  </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($evaluaciones as $evaluacion)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                  <td class="px-6 py-4">
                                    {{ $evaluacion->modulo->name }}
                                  </td>
                                  <td class="px-6 py-4">
                                    {{ $evaluacion->unidadf->name }}
                                  </td>
                                  <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                      {{ $evaluacion->nota }}
                                  </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <div class="m-2">
                            {{ $evaluaciones->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
