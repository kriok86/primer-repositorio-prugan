<div class="mt-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-3">
        <div class="col-span-2 gap-8">
            {!!$current->url!!}
            <h1 class="text-3xl text-gray-600 font-bold mt-4">
                {{$current->name}}
            </h1>
            @if ($current->description)
                <div class="text-gray-600">
                    {{$current->description->name}}
                </div>
            @endif
            <div class="flex items-center mt-4 cursor-pointer">
                <i class="fas-fa-toggle-off text-2xl text-gray-600"></i>
                <p class="text-sm ml-2">Marcar esta unidad como culminada</p>
            </div>
            <div class="bg-white shadow-lg rounded overflow-hidden mt-2">
                <div class="px-6 py-2 flex text-gray-500 font-bold">
                    @if ($this->previous)
                        <a class="cursor-pointer">Tema anterior</a>
                    @endif
                    <a class="ml-auto cursor-pointer">Siguiente tema</a>
                </div>

            </div>
            
            <p>Indice:{{$this->index}}</p>
            <p>Anterior: @if ($this->previous)
                {{$this->previous->id}}
            @endif</p>
            <p>proximo: @if ($this->next)
                {{$this->next->id}}
            @endif </p>
        </div>
        <div class="bg-white shadow-lg rounded">
            <div class="px-6 py-6">
                <h1>{{$course->title}}</h1>

                <div class="flex items-center">
                    <figure>
                        <img src="{{$course->teacher->profile_photo_url}}" alt="">
                    </figure>
                    <div>
                        <p>{{$course->teacher->name}}</p>
                        <a class="text-blue-500" href="">{{'@'.Str::slug($course->teacher->name, '')}}</a>
                    </div>

                </div>
                <ul>
                    @foreach ($course->sections as $section)
                        <li>
                            <a class="font-bold">{{$section->name}}</a>
                            <ul>
                                @foreach ($section->lessons as $lesson)
                                    <li>
                                        <a class="cursor-pointer" wire:click="changeLesson({{$lesson}})">{{$lesson->id}}@if ($lesson->complete)
                                            (completado)
                                        @endif</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                </ul>

            </div>

        </div>

    </div>
    
</div>
