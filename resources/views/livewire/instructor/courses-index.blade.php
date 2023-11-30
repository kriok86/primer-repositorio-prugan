<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
 
    <!-- component -->

    <div class="bg-white p-8 rounded-md w-full">
		
		<div class="py-6 px-6">
            <input wire:keydown="limpiar_page" wire:model.live="search" class="form-input w-full rounded bg-gray-50 outline-none ml-1 block "  placeholder="Ingrese el nombre del curso...">
            <a class="inline-block rounded bg-red-400 mt-4 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" href="{{route('instructor.courses.create')}}">Crear nuevo curso</a>

        </div>
		
		<div>
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
					
               
                        
                   
                    <table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Nombre del curso
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Cantidad de estudiantes
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Status
								</th>
                                <th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Edicion de cursos
								</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($courses as $course)              
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                @isset($course->image)
                                                    <img class="w-full h-full rounded-full object-cover object-center" src="{{asset(Storage::url($course->image->url))}}"/>
                                                    @else
                                                    <img class="w-full h-full rounded-full object-cover object-center" src="https://images.pexels.com/photos/5905710/pexels-photo-5905710.jpeg?auto=compress&cs=tinysrgb&w=600"/>
                                                @endisset
                                                
                                            </div>
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                       {{$course->title}}
                                                    </p>
                                                
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                       {{$course->category->name}}
                                                    </p>
                                                </div>
                                            </div>
                                            </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{$course->students->count()}}</p>
                                    </td>
                                                                      
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        
                                        @switch($course->status)
                                            @case(1)
                                            
                                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                                                <span aria-hidden  class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Borrador</span>
                                                </span>
                                                @break
                                            @case(2)
                                                <span class="relative inline-block px-3 py-1 font-semibold text-yellow-900 leading-tight">
                                                <span aria-hidden  class="absolute inset-0 bg-yellow-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Revision</span>
                                                </span>
                                                @break
                                            @case(3)
                                            <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                                                <span aria-hidden  class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                                                <span class="relative">Publicado</span>
                                                </span>
                                                @break
                                            @default
                                                
                                        @endswitch
                                    </td>
                                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                            <a href="{{route('instructor.courses.edit', $course)}}" class="text-gray-900 whitespace-no-wrap">Editar</a>
                                        </td>
                                        
                                </tr>
                                @endforeach
						</tbody>
					</table>
					<div class="px-5 py-5 bg-white border-t flex flex-col xs:flex-row items-center xs:justify-between">
						
                        <span class="text-xs xs:text-sm text-gray-900">
                            Showing 1 to 4 of 50 Entries
                        </span>
						<div class="inline-flex mt-2 xs:mt-0">
							<button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-l">
                                Prev
                            </button>
							&nbsp; &nbsp;
							<button
                                class="text-sm text-indigo-50 transition duration-150 hover:bg-indigo-500 bg-indigo-600 font-semibold py-2 px-4 rounded-r">
                                Next
                            </button>
						</div>
					</div>
                   
				</div>
			</div>
		</div>
	</div>


</div>