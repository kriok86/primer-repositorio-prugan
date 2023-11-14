<x-app-layout>
    <section class="bg-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  grid grid-cols-1 lg:grid-cols-2 gap-4">
            <figure>
                <img class="h-60 w-full object-cover" src="{{asset(Storage::url($courses->image->url))}}" alt="">
            </figure>
            <div >
                <h1 class="text-4xl mb-2">{{$courses->title}}</h1>
                <h2 class="text-xl mb-3">{{$courses->description}}</h2>
                <p class="mb-2">Nivel:{{$courses->level->name}} </p>
                <p class="mb-2">Categoria:{{$courses->category->name}} </p>
                <p class="mb-2">Matriculados:{{$courses->students_count}} </p>
            </div>
        </div>

    </section>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="order-2 lg:col-span-2 lg:order-1">
            <section class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="font-bold text-2xl mb-2 ">Lo que aprenderas</h1>
                    <ul class="grid grid-cols-2 gap-x-6 gap-y-2">
                        @foreach ($courses->goals as $goal)
                         <li class="text-gray-700 text-base">{{$goal->name}}</li>   
                        @endforeach
                    </ul>
                </div>

            </section>

            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Temario</h1>
                @foreach ($courses->sections as $section)
                <article class="mb-4 shadow"
                @if ($loop->first)
                    x-data="{open: true}"
                    @else
                    x-data="{open: false}"
                    
                @endif>
                    <header class="border-gray-200 px-4 py-2 cursor-pointer bg-gray-200"x-on:click="open != open">
                        <h1 class="font-bold text-lg text-gray-600">{{$section->name}}</h1>
                    </header>
                    <div class="bg-white py-2 px-4"x-show="open">
                        <ul class="grid grid-cols-1 gap-2">
                            @foreach ($section->lessons as $lesson)
                            <li class="text-gray-700 text-base">{{$lesson->name}}</li>
                                
                            @endforeach
                        </ul>
                    </div>

                </article>
                    
                @endforeach
            </section>

            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @foreach ($courses->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @endforeach
                </ul>
            </section>

            <section>
                <h1 class="font-bold text-3xl">Descripcion</h1>
                <div class="text-gray.700 text-base">
                    {!!$courses->description!!}
                </div>
            </section>

            

        </div>
        
        <div class="order-1 py-12 lg:order-2">
            <section class="bg-white shadow-lg rounded overflow-hidden"><!--card-->
                <div class="px-6 py-6"><!--card body-->
                   <div class="flex items-center">
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$courses->teacher->profile_photo_url}}" alt="{{$courses->teacher->name}}">
                            <div class="ml-4">
                                <h1 class="font-bold text-gray-500 text-lg">Prof. {{$courses->teacher->name}}</h1>
                                <a class="text-blue-400 text-xs font-bold" href="">{{'@'.Str::slug($courses->teacher->name,'')}}</a>
                            </div>
                   </div>
                        @can('enrolled', $courses)  
                        
                        <a class="bg-red-500 hover:bg-blue-700 text-white text-center block font-bold py-1 px-4 mt-4 rounded" href="{{route('courses.status', $courses)}}"> Continuar con el curso</a>
                        
                        @else
                            <form action="{{route('courses.enrolled', $courses)}}" method="POST">
                                @csrf
                                    <button class="bg-red-500 hover:bg-blue-700 text-white text-center block font-bold py-2 px-4 mt-4 rounded cursor-pointer" type="submit"> Solicitar inscripcion </button>
                            </form>
                        @endcan
                </div>
                              
            </section>
            <aside class="py-8">
                <!--Aca debo incorporar el formulario de inscripcion de los estudiantes no esta terminado-->
        <!-- component -->
            <div class=" flex items-center justify-center  ">
                
                <form id="form" class=" shadow-md rounded px-8 pt-6 pb-8 mb-4  ">
                    <h1 class="block text-gray-700 font-bold mb-2 text-xl text-center">DEJANOS TU CONSULTA AQUI</h1>
                    <br>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Nombre
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="name" id="name" type="text" placeholder="Ingresa tu nombre" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Número de Celular
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="tel" id="tel" type="tel" placeholder="Ingresa tu Número de Celular" required>
                    </div>
                    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Correo
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="email" id="email" type="email" placeholder="Ingresa tu correo" required>
                    </div>
    
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="Date">
                            Fecha
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="date" id="date" type="date" placeholder="Ingresa tu Fecha de Nacimiento" required>
                    </div>
    
                    <div class="mb-4">
    
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Que curso le interesa
                        </label>
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="message1" id="message1" type="text" placeholder="Escríbe tu respuesta Aquí..."required></textarea>
                    </div>
    
                    <div class="mb-4">
    
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Que curso le interesa
                        </label>
                        
                        <textarea class="bshadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="message2" id="message2" type="text" placeholder="Escríbe tu respuesta Aquí..." required></textarea>
                    </div>
    
                    
                    <div class="flex items-center justify-between">
                        <button id="submit"
                            class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            <i class="fab fa-whatsapp"></i> Enviar a WhatsApp
                        </button>
                    </div>
    
                    <div class="mb-4">
    
    
                </form>
                
                </div>
                <script src="https://kit.fontawesome.com/1e268974cb.js" crossorigin="anonymous"></script>
            </aside>
        </div>
    </div>
        
   
</x-app-layout>