<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        <x-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            
            

            <!-- Page Content -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 grid grid-cols-5 gap-4">
                <aside>
                    <h1 class="font-bold text-lg mb-4">Edicion del curso</h1>
                    <ul class="text-sm text-gray-600">
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.edit',$course) border-indigo-400 @else border-transparent @endif  pl-2">
                            <a href="{{route('instructor.courses.edit',$course)}}">Informacion del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4 @routeIs('instructor.courses.curriculum',$course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.curriculum', $course)}}">Lecciones del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4  @routeIs('instructor.courses.goals',$course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.goals', $course)}}">Metas del curso</a>
                        </li>
                        <li class="leading-7 mb-1 border-l-4  @routeIs('instructor.courses.students',$course) border-indigo-400 @else border-transparent @endif pl-2">
                            <a href="{{route('instructor.courses.students', $course)}}">Estudiantes</a>
                        </li>
                    </ul>

                    @switch($course->status)
                        @case(1)
                          <!--boton para cambiar el status del curso-->
                            <form action="{{route('instructor.courses.status', $course)}}" method="POST">
                                @csrf
                                <button class="inline-block rounded bg-red-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" type="submit">Solicitar revision</button>
                            </form>  
                            @break
                        @case(2)
                        <div class="bg-white shadow-lg rounded overflow-hidden mr-2">
                            <div class="px-6 py-6 ">
                                Este curso se encuentra en revision
                            </div>
                            
                        </div>
                            @break
                        @case(3)
                        <div class="bg-white shadow-lg rounded overflow-hidden mr-2">
                            <div class="px-6 py-6 ">
                                Este curso se encuentra publicado
                            </div>
                            
                        </div>
                            @break
                        @default
                            
                    @endswitch

                


                </aside>
                <div class="col-span-4 bg-white shadow-lg rounded overflow-hidden">
                    <main class="px-6 py-6 text-gray-600">
                       
                        {{$slot}}
        
                    </main>
        
                </div>
        
            </div>
        </div>

        @stack('modals')

        @livewireScripts
        @isset($js)
            {{$js}}
        @endisset
    </body>
</html>
