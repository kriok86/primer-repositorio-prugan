<section>
    <h1 class="text-2xl font-bold">REQUERIMIENTOS DEL CURSO</h1>
    <hr class="mt-2 mb-6">

    @foreach ($course->requirements as $item)
        <article class="bg-white shadow-lg rounded overflow-hidden mb-4">
            <div class="px-6 py-6 bg-gray-100">
                @if ($requirement->id == $item->id)
                    <form wire:submit.prevent="update">
                        <input wire:model="requirement.name" class="form-input w-full">

                        @error('requirement.name')
                            <span class="text-xs text-red-500">{{$message}}</span>
                        @enderror

                    </form>
                @else
                       
                    <header class="flex justify-between">
                        <h1>{{$item->name}}</h1>
                        <div >
                            <i wire:click="edit({{$item}})" class="fas fa-edit text-blue-500 cursor-pointer"></i>
                            <i wire:click="destroy({{$item}})" class="fas fa-trash text-red-500 cursor-pointer ml-2"></i>
                        </div>
                    </header>

                @endif
            </div>
        </article>
    @endforeach
    <article class="bg-white shadow-lg rounded overflow-hidden">
        <div class="px-6 py-6 bg-gray-100">
            <form wire:submit.prevent="store">
                <input wire:model.live="name" class="form-input w-full" placeholder="Agregar el nombre de un requerimiento">

                @error('name')
                    <span class="text-xs text-red-500">{{$message}}</span>
                @enderror

                <div class="flex justify-end mt-2">
                    <button type="submit" class="inline-block rounded bg-blue-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-gray-900 shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]">Agregar Requerimiento</button>
                </div>
            </form>
        </div>

    </article>
</section>