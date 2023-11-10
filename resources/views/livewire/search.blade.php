<form class="pt-2 relative mx-auto text-gray-600" autocomplete="off">

    <input wire:model.live="search" class="w-full border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none"
    type="search" name="search" placeholder="Search" >
   
    <button type="submit" class="iddle none center rounded-lg bg-pink-500 py-3 px-6 font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none absolute right-0 top-0 mt-2">
        BUSCAR
    </button>
    <!--no muestra la busqueda-->
    @if ($search)
        <ul class="absolut left-0 w-full bg-white mt-1 rounded-lg overflow-hidden">
            @foreach ($this->Results as $result)
                <li class="leading-10 px-5 text-sm cursor-pointer hover:bg-gray-300 ">
                    <a href="{{route('courses.show', $result)}}">{{$result->title}}</a>
                </li>
                     
                   
            @endforeach
            
      
        </ul>     
    @endif
                  
</form>
