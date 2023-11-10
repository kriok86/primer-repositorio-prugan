<div class="bg-white shadow-lg rounded overflow-hidden " x-data="{open: false}">
    <div class="px-6 py-6 bg-gray-100">

        <header>
            <h1 x-on:click="open = !open" class="cursor-pointer">Recursos de la Leccion</h1>
        </header>
        <div x-show="open">
            <hr class="my-2">
            @if ($lesson->resource)
               <div class="flex justify-between item-center">
                    <p><i wire:click="download" class="fas fa-download text-gray-500 mr-2 cursor-pointer"></i>{{$lesson->resource->url}}</p>
                    <i wire:click="destroy" class="fas fa-trash text-red-500 cursor-pointer"></i>
               </div>
            @else
                
            
                <form wire:submit.prevent="save">
                    <div class="flex items-center">
                        <input wire:model="file" type="file" class="form-input flex-1 rounded">
                        <button type="submit" class="inline-block rounded ml-2 bg-blue-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-900 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">Guardar</button>
                    </div>
                    <div class="text-blue-500 font-bold mt-1" wire:loading wire:target="file">
                        Cargando...
                    </div>
                    @error('file')
                        <span class="text-xs text-red-500">{{$message}}</span>
                    @enderror
                </form>
            @endif
        </div>

    </div>
</div>
