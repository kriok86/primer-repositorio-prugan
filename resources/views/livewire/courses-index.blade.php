<div>
    <div class="bg-gray-200 py-4 mb-16 ">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <button class="bg-white shadow h-12 px-4 rounded-lg text-gray-700 mr-4" wire:click="resetFilters"> 
            <i class="fa fa-university text-xs mr-2"></i>
            Todos los cursos
            </button>

            <!-- component -->

            <div class="relative inline-block text-left" x-data= "{open: false}">
                <button id="dropdown-button" class="bg-white shadow inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500" x-on:click="open= !open">
                    Categoria
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="dropdown-menu" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" x-show="open">
                    <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                        @foreach ($categories as $category)
                        <a  class="cursor-pointer block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-300" role="menuitem"wire:click="$set('category_id',{{$category->id}})" x-on:click="open= false">{{$category->name}}</a>
                            
                        @endforeach
                        
                        
                        
                    </div>
                </div>
            </div>


            <script>
                const dropdownButton = document.getElementById('dropdown-button');
                const dropdownMenu = document.getElementById('dropdown-menu');
                let isDropdownOpen = false;

                function toggleDropdown() {
                    isDropdownOpen = !isDropdownOpen;
                    if (isDropdownOpen) {
                        dropdownMenu.classList.remove('hidden');
                    } else {
                        dropdownMenu.classList.add('hidden');
                    }
                }

                toggleDropdown();

                dropdownButton.addEventListener('click', toggleDropdown);

                window.addEventListener('click', (event) => {
                    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                        isDropdownOpen = false;
                    }
                });
            </script>
            
            <div class="relative inline-block text-left mr-4" x-data= "{open: false}">
                <button id="dropdown-button" class="bg-white shadow inline-flex justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-100 focus:ring-blue-500" x-on:click="open= !open">
                    Niveles
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 ml-2 -mr-1" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M6.293 9.293a1 1 0 011.414 0L10 11.586l2.293-2.293a1 1 0 111.414 1.414l-3 3a1 1 0 01-1.414 0l-3-3a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
                <div id="dropdown-menu" class="origin-top-right absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden" x-show="open">
                    <div class="py-2 p-2" role="menu" aria-orientation="vertical" aria-labelledby="dropdown-button">
                        @foreach ($levels as $level)
                        <a class="cursor-pointer block px-4 py-2 mb-1 text-sm text-gray-700 rounded-md bg-white hover:bg-gray-300" role="menuitem"wire:click="$set('level_id',{{$level->id}})" x-on:click="open= false">{{$level->name}};</a>   
                        @endforeach
                       
                        
                        
                    </div>
                </div>
            </div> 
            <script>
                const dropdownButton = document.getElementById('dropdown-button');
                const dropdownMenu = document.getElementById('dropdown-menu');
                let isDropdownOpen = false;

                function toggleDropdown() {
                    isDropdownOpen = !isDropdownOpen;
                    if (isDropdownOpen) {
                        dropdownMenu.classList.remove('hidden');
                    } else {
                        dropdownMenu.classList.add('hidden');
                    }
                }

                toggleDropdown();

                dropdownButton.addEventListener('click', toggleDropdown);

                window.addEventListener('click', (event) => {
                    if (!dropdownButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                        dropdownMenu.classList.add('hidden');
                        isDropdownOpen = false;
                    }
                });
            </script>

        </div>

    </div>
   
    <!--se muestran los cursos-->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-x-6 gap-y-8">
        @foreach ($courses as $course)
        <x-course-card :course="$course" />
            
        @endforeach
        

    </div>
    
</div>
