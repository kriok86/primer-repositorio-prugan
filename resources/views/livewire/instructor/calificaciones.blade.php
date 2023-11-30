<div>
    <h1 class="text-2xl font mb-4">ESTUDIANTES DEL CURSO</h1>
    <hr>
    
    <div class="bg-white p-8 rounded-md w-full">
		
		<div class="py-6 px-6">
		    <input  wire:model.live="search" class="form-input w-full rounded bg-gray-50 outline-none ml-1 block "  placeholder="Ingrese el nombre del estudiante...">
        </div>
		{{--Tabla de Calificaciones--}}
		<div>
           
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">               
                  @if ($students->count())
                      
                  
                    <table class="border-collapse w-full col-span-3">
                        <thead>
                            <tr>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Nombre</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">E-mail</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Calificacion</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Comentarios</th>
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
                                    <td class="px-5 py-5 radius border-b border-gray-200 bg-white text-sm">
                                        {!! Form::label('', '') !!}
                                        {!! Form::select('', $calificacion, null, ['class'=>'form-input block w-full mt-1']) !!}
                                    </td>
                                    <td class="px-5 py-5 radius border-b border-gray-200 bg-white text-sm">
                                        <textarea class="text-gray-900 whitespace-no-wrap">Observaciones</textarea>
                                    </td>
                                                                      
                                   
                                </tr>
                                @endforeach
                                
						</tbody>
                        
					</table>
                    @endif 
					
                   
				</div>
			</div>
		</div>

	</div>

</div>
