<x-app-layout>
    <section class="bg-cover" style="background-image: url({{asset('img/home/portada1.jpg')}})">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-36">
            <div class="w-full md:w-3/4 lg:w-1/2">
                <h1 class="text-gray-950 font-bold text-4xl">Centro de formacion profesional N°20   
                </h1>
                <p class="text-gray-950  font-bold text-lg mt-2 mb-4">Te ofrece cursos gratuitos</p>
                <p class="text-gray-950  font-bold text-lg mt-2 mb-4">Estan homologados por INET</p>

                    <!-- component -->
                    <!-- This is an example component -->
                    @livewire('search')
            </div>
        </div>
    </section>
    @livewire('courses-index')
</x-app-layout>