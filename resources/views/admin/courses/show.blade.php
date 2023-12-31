<x-app-layout>
    <section class="bg-gray-400 py-12">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8  grid grid-cols-1 lg:grid-cols-2 gap-4">
            <figure>
                @if ($course->image)
                    <img class="h-60 w-full object-cover" src="{{asset(Storage::url($course->image->url))}}" alt="">
                @else
                <img class="h-60 w-full object-cover" src="https://images.pexels.com/photos/5905710/pexels-photo-5905710.jpeg?auto=compress&cs=tinysrgb&w=600" alt="">
                @endif
            </figure>
            <div >
                <h1 class="text-4xl mb-2">{{$course->title}}</h1>
                <h2 class="text-xl mb-3">{{$course->description}}</h2>
                <p class="mb-2">Nivel:{{$course->level->name}} </p>
                <p class="mb-2">Categoria:{{$course->category->name}} </p>
                <p class="mb-2">Matriculados:{{$course->students_count}} </p>
            </div>
        </div>

    </section>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 lg:grid-cols-3 gap-6">
        
        @if (session('info'))
            <div class="lg:col-span-3" x-data="{open: true}" x-show="open">
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mt-2" role="alert">
                    <strong class="font-bold">Ocurrio un error!</strong>
                    <span class="block sm:inline">{{session('info')}}</span>
                    <span class="absolute top-0 bottom-0 right-0 px-4 py-3">
                      <svg x-on:click="open= false" class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                    </span>
                  </div>
            </div>
        @endif

        <div class="order-2 lg:col-span-2 lg:order-1">

            {{--Metas--}}
            <section class="py-6">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <h1 class="font-bold text-2xl mb-2 ">Lo que aprenderas</h1>

                    <ul class="grid grid-cols-2 gap-x-6 gap-y-2">

                        @forelse ($course->goals as $goal)
                            <li class="text-gray-700 text-base"><i class="fas fa-check text-gray-600 mr-2"></i>{{$goal->name}}</li>
                        @empty
                            <li class="text-gray-700 text-base">Este curso no tiene asignado ninguna meta</li>
                        @endforelse

                      
                    </ul>
                </div>

            </section>

            {{--Temario--}}
            <section class="mb-12">
                <h1 class="font-bold text-3xl mb-2">Temario</h1>
                @forelse ($course->sections as $section)
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
                @empty

                <article class="bg-white shadow-lg rounded overflow-hidden">
                    <div class="px-6 py-6">
                        Este curso no tiene ninguna seccion asignada
                    </div>
                </article>

                @endforelse
            </section>
            {{--Requisitos--}}
            <section class="mb-8">
                <h1 class="font-bold text-3xl">Requisitos</h1>
                <ul class="list-disc list-inside">
                    @forelse ($course->requirements as $requirement)
                        <li class="text-gray-700 text-base">{{$requirement->name}}</li>
                    @empty
                    <li class="text-gray-700 text-base">Este curso no tiene ningun requerimiento</li>
                    @endforelse
                </ul>
            </section>

            <section>
                <h1 class="font-bold text-3xl">Descripcion</h1>
                <div class="text-gray.700 text-base">
                    {!!$course->description!!}
                </div>
            </section>

            

        </div>
        
        <div class="order-1 py-12 lg:order-2">
            <section class="bg-white shadow-lg rounded overflow-hidden"><!--card-->
                <div class="px-6 py-6"><!--card body-->
                   <div class="flex items-center">
                        @if ($course->teacher)
                        <img class="h-12 w-12 object-cover rounded-full shadow-lg" src="{{$course->teacher->profile_photo_url}}" alt="{{$course->teacher->name}}">
                        <div class="ml-4">
                            <h1 class="font-bold text-gray-500 text-lg">Prof. {{$course->teacher->name}}</h1>
                            <a class="text-blue-400 text-xs font-bold" href="">{{'@'.Str::slug($course->teacher->name,'')}}</a>
                            @endif
                        </div>
                    
                        
                    </div>   
                    <form action="{{route('admin.courses.approved', $course)}}" class="mt-4" method="POST">
                        @csrf
                        <button type="submit" class="bg-red-500 hover:bg-blue-700 text-white text-center block font-bold py-2 px-4 rounded cursor-pointer w-full">Aprobar curso</button>
                    </form>          
                       
                </div>
                              
            </section>
            
        </div>
    </div>
        
   
</x-app-layout>