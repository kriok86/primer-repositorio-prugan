<div>
    <h1 class="text-2xl font mb-4">ASISTENCIAS DEL CURSO</h1>
    <hr>

    <div class="bg-white p-8 rounded-md w-full">
		<h4>FECHA </h4>
        <div class="col-md-6">
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Día</span>
                <input type="text" class="form-control rounded" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" name="fecha"
                    value="{{ \Carbon\Carbon::now()->format('d-m-Y') }}" disabled>
            </div>


        </div>
		<div class="py-6 px-6">
		    <input  wire:model.live="search" class="form-input w-full rounded bg-gray-50 outline-none ml-1 block "  placeholder="Ingrese el nombre del estudiante...">
        </div>
		{{--Tabla de Asistencia--}}
		<div>
           
			<div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
				<div class="inline-block min-w-full shadow rounded-lg overflow-hidden">               
                  @if ($students->count())
                      
                  
                    <table class="border-collapse w-full col-span-3">
                        <thead>
                            <tr>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Nro</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Nombre</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">E-mail</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Asiste</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">No asiste</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Observaciones</th>
                            </tr>
                        </thead>
						<tbody>
                            @foreach ($students as $student)              
                            <tr>
                                <td>{{ $loop->index + 1 }}</td> <!-- Número de fila -->
                                <td>{{ $student->name }}</td>
                                <!-- Nombre completo -->
                                <td>{{ $student->email }}</td>
                                <td><input type="radio" name="asistencia[{{ $student->id }}]" value="1">
                                </td>
                                <!-- Asiste -->
                                <td><input type="radio" name="asistencia[{{ $student->id }}]" value="0">
                                </td>
                                <!-- No Asiste -->
                                <td class="text-center">
                                    <textarea  name="comentario[{{ $student->id }}]" class="form-control"></textarea>
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
