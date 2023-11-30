<x-instructor-layout :course="$course">
    <h1 class="text-2xl font-bold text-center">CALIFICACIONES</h1>
    <hr class="mt-2 mb-6">

    <div>
        {!! Form::model($course ) !!}
        {!! Form::label('title', 'Nombre del curso') !!}
        {!! Form::text('title', null, ['class'=>'form-input block w-full mt-1 rounded'. ($errors->has('title') ? 'border-red-600':'')]) !!}
        @error('title')
            <strong class="text-xs text-red-600">{{$message}}</strong>
        @enderror

        {!! Form::close() !!}
        
    </div>
    <div class="bg-white p-8 rounded-md w-full">
        <h3 class="text-2xl font-bold text-center mt-2"></h3>
            <hr class="mt-1 mb-1">

   
        <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto">
            <div class="inline-block min-w-full shadow rounded-lg overflow-hidden">
                @livewire('instructor.calificaciones', ['course' => $course], key($course->id))
               
                

            </div>
            <form action="{{route('instructor.courses.notas', $course)}}" method="GET">
                @csrf
                <button class="inline-block rounded bg-red-400 mr-2 px-6 pb-2 mt-4 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" type="submit">ENVIAR NOTAS</button>
            </form>
        </div>

    </div>

    
</x-instructor-layout>