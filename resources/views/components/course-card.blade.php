@props(['course'])
<!--card-->
<article class="bg-white shadow-lg rounded overflow-hidden"><!--card estilos-->
    <img class="h-36 w-full object-cover" src="{{asset(Storage::url($course->image->url))}}" alt="">
    <div class="px-6 py-4"><!--card body-->
        <h1 class="text-xl text-gray-700 mb-2 leading-6">{{$course->title}}</h1><!--card title-->
        <p class="text-gray-500 text-sm mb-2">Prof:{{$course->teacher->name}}</p>

        <a href="{{route('courses.show', $course)}}" class="w-full mt-2 text-center block bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded"><!--boton-->
        Mas informacion
        </a> 

    </div>

</article>