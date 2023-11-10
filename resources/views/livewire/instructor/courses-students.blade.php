<div>
    

    <h1 class="text-2xl font mb-4">ESTUDIANTES DEL CURSO</h1>

    <div class="bg-white p-8 rounded-md w-full">
		
		<div class="py-6 px-6">
		    <input  wire:model.live="search" class="form-input w-full rounded bg-gray-50 outline-none ml-1 block "  placeholder="Ingrese el nombre del estudiante...">
        </div>
		
		<div>
           
                
            
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">               
                   
                    <table class="min-w-full leading-normal">
						<thead>
							<tr>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Nombre 
								</th>
								<th
									class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
									Email
								</th>
							</tr>
						</thead>
						<tbody>
                            @foreach ($students as $student)              
                                <tr>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 w-10 h-10">
                                                
                                                <img class="w-full h-full rounded-full object-cover object-center" src="{{$student->profile_photo_url}}"/>
                                                   
                                                
                                            </div>
                                                <div class="ml-3">
                                                    <p class="text-gray-900 whitespace-no-wrap">
                                                       {{$student->name}}
                                                    </p>
                                                
                                                </div>
                                        </div>
                                    </td>
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">{{$student->email}}</p>
                                    </td>
                                                                      
                                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                        <a href="" class="text-gray-900 whitespace-no-wrap">Ver</a>
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
