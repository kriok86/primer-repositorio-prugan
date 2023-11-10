<div>
   @foreach ($section->lessons as $item)

   <article class="bg-white shadow-lg rounded overflow-hidden mt-4" x-data="{open: false}">
        <div class="px-6 py-6">
        @if ($lesson->id == $item->id)
        <form wire:submit.prevent="update">
            <div class="flex items-center">
                <label class="w-20">Nombre:</label>
                <input wire:model.live="lesson.name" class="form-input w-full rounded">
            </div>
            @error('lesson.name')
                <span class="text-xs text-red-500">{{$message}}</span>
            @enderror
        
        
            <div class="flex items-center mt-2">
                <label class="w-20">URL:</label>
                <input wire:model.live="lesson.url" class="form-input w-full rounded">
            </div>
            @error('lesson.url')
                <span class="text-xs text-red-500">{{$message}}</span>
            @enderror
            <div class="mt-4 flex justify-end">
                <button type="submit" class="inline-block rounded bg-blue-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-900 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"> Actualizar </button>
                <button type="button" class="inline-block rounded bg-red-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-900 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" wire:click="cancel"> Cancelar </button>
            </div>
        </form>
        @else
            <header>
                <h1 x-on:click="open = !open" class="cursor-pointer"><i class="far fa-play-circle text-blue-500 mr-1"></i> Leccion: {{$item->name}}</h1>
            </header>

        <div x-show="open">
            <hr class="my-2">
            <div class="my-2">
                <button class="inline-block rounded bg-blue-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-900 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"wire:click="edit({{$item}})"> Editar </button>
                <button class="inline-block rounded bg-red-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-900 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" wire:click="destroy({{$item}})"> Eliminar </button>
            </div>
            <div class="mb-4">
                @livewire('instructor.lesson-description', ['lesson' => $item], key('lesson-description'.$item->id))
            </div>
            <div>
                @livewire('instructor.lesson-resources', ['lesson' => $item], key('lesson-resources'.$item->id))
            </div>
        </div>
        @endif       
           
        </div>
   </article>
       
   @endforeach
   <div x-data="{open:false}">
    <a x-show="!open" x-on:click="open = true" class="flex items-center cursor-pointer mt-2">
        <i class="far fa-plus-square text-2xl text-red-500 mr-2"></i>
        Agregar nueva Leccion
    </a>
    <article x-show="open" class="bg-white shadow-lg rounded overflow-hidden">
        <div class="px-6 py-6 bg-gray-100">
            <h1 class="text-xl font-bold">AGREGAR NUEVA LECCION</h1>
            <div>
                <div class="flex items-center">
                    <label class="w-20">Nombre:</label>
                    <input wire:model.live="name" class="form-input w-full rounded">
                </div>
                @error('name')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div>
                <div class="flex items-center mt-2">
                    <label class="w-20">URL:</label>
                    <input wire:model.live="url" class="form-input w-full rounded">
                </div>
                @error('url')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-2">
                <button class="inline-block rounded bg-red-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-900 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]" x-on:click="open = false"> Cancelar </button>
                <button class="inline-block rounded bg-blue-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-900 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]"wire:click="store"> Agregar </button>
            </div>
        </div>
    </article>
</div>
</div>
