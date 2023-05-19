<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg m-1">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        @if(session('success'))
                        <div id="alert-succes" class="flex p-4 mb-4 text-green-800 border-t-4 border-green-300 bg-green-50 dark:text-green-400 dark:bg-gray-800 dark:border-green-800" role="alert">
                            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <div class="ml-3 text-sm font-medium">
                                {{session('success')}}
                            </div>
                            <button onclick="this.parentNode.style.display = 'none'" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-50 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-green-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-3" aria-label="Close">
                              <span class="sr-only">Dismiss</span>
                              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>

                        @endif
                        @if(session('error'))
                        <div id="alert-error" class="flex p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
                            <svg class="flex-shrink-0 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <div class="ml-3 text-sm font-medium">
                                {{session('error')}}
                            </div>
                            <button onclick="this.parentNode.style.display = 'none'" type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
                              <span class="sr-only">Dismiss</span>
                              <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        @endif

                        <form action="{{ route('modulo.create' ) }}" method="post">
                            @csrf
                            @method('post')
                            <div class="flex flex-wrap  mb-6">
                              <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="moduloname">
                                  Nombre Modulo
                                </label>
                                <input name="moduloname"class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="moduloname" type="text" required>
                              </div>
                              <div>
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="moduloname">
                                    Action
                                  </label>
                                  <div class="md:flex md:items-center">
                                    <div class="md:w-1/3">
                                      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-3 px-4 rounded" type="submit">
                                        Crear
                                      </button>
                                    </div>
                                  </div>
                              </div>
                            </div>
                          </form>
                    </div>
                </div>
            </div>



            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3"> Id </th>
                                    <th scope="col" class="px-6 py-3"> Nombre </th>
                                    <th scope="col" class="px-6 py-3">  </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($modulos as $modulo)
                                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ $modulo->id }}
                                    </th>
                                    <td class="px-6 py-4">
                                        {{ $modulo->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <form id="delete-form-{{ $modulo->id }}" action="{{ route('modulo.delete', ['id' => $modulo->id]) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Eliminar">
                                        </form>
                                    </td>

                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                        <div class="m-2">
                            {{ $modulos->links('pagination::tailwind') }}
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</x-app-layout>
