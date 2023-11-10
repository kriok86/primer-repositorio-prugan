<div>
    

    <h1 class="text-2xl font-bold">LECCIONES DEL CURSO</h1>

    <hr class="mt-2 mb-6">

    

    @foreach ($course->sections as $item)
        <article class="bg-white shadow-lg rounded overflow-hidden mb-6" x-data="{open: true}">
            <div class="px-6 py-6 bg-gray-100">
                @if ($section->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model.live="section.name" class="form-input w-full" placeholder="Ingrese el nombre de la seccion">
                        @error('section.name')
                           <span class="text-xs text-red-500">{{$message}}</span> 
                        @enderror

                    </form>
                    
                @else
                    <header class="flex justify-between items-center">
                        <h1 x-on:click="open = !open" class="cursor-pointer"><strong>Seccion:</strong> {{$item->name}}</h1>
                        <div>
                        <i class="fas fa-edit cursor-pointer text-blue-500" wire:click="edit({{$item}})"></i> 
                        <i class="fas fa-eraser cursor-pointer text-red-500" wire:click="destroy({{$item}})"></i>
                        </div>
                    </header>
                    <div x-show="open">
                        @livewire('Instructor.courses-lesson', ['section' => $item], key($item->id))
                    </div>

                @endif
            </div>
        </article>
    @endforeach

    <div x-data="{open:false}">
        <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer">
            <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
            Agregar nueva seccion
        </a>
        <article x-show="open" class="bg-white shadow-lg rounded overflow-hidden">
            <div class="px-6 py-6 bg-gray-100">
                <h1 class="text-xl font-bold">AGREGAR NUEVA SECCION</h1>
                <div>
                   <input wire:model="name" class="form-input w-full mb-4 rounded" placeholder="Escriba el nombre de la seccion">
                   @error('name')
                       <span class="text-xs text-red-500">{{$message}}</span>
                   @enderror 
                </div>
                <div class="flex justify-end">
                    <button class="inline-block rounded bg-red-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-900 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" x-on:click="open = false"> Cancelar </button>
                    <button class="inline-block rounded bg-blue-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-900 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"wire:click="store"> Agregar </button>
                </div>
            </div>
        </article>
    </div>

</div>
