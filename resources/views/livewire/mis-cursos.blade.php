<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="-mx-4 sm:-mx-8 px-4 sm:px-8 py-4 overflow-x-auto ">
        <!-- component -->
<body class="flex items-center justify-center">
	<div class="container">
		<table class="w-full flex flex-row flex-no-wrap sm:bg-white rounded-lg overflow-hidden sm:shadow-lg my-5">
			<thead class="text-white">
				<tr class="bg-teal-400 flex flex-col flex-no wrap sm:table-row rounded-l-lg sm:rounded-none mb-2 sm:mb-0">
					<th class="p-3 text-center">NOMBRE DEL CURSO</th>
					<th class="p-3 text-center">CATEGORIA</th>
					<th class="p-3 text-left" width="110px">Accion</th>
				</tr>           
			</thead>
			<tbody class="flex-1 sm:flex-none">
        @foreach ($courses as $course)
				<tr class="flex flex-col flex-no wrap sm:table-row mb-2 sm:mb-0">

					<td class="border-grey-light border hover:bg-gray-100 p-3">
            <div class="flex items-center">
              <div class="flex-shrink-0 w-10 h-10">
                  @isset($course->image)
                      <img class="w-full h-full rounded-full object-cover object-center" src="{{asset(Storage::url($course->image->url))}}"/>
                      @else
                      <img class="w-full h-full rounded-full object-cover object-center" src="https://images.pexels.com/photos/5905710/pexels-photo-5905710.jpeg?auto=compress&cs=tinysrgb&w=600"/>
                  @endisset
                  
              </div>
                  <div class="ml-3">
                      <p class="text-gray-900 whitespace-no-wrap">
                         {{$course->title}}
                      </p>
                  </div>
                  
          </td>
          <td class="border-grey-light border hover:bg-gray-100 p-3">
            <div class="ml-3">
              <p class="text-gray-900 whitespace-no-wrap">
                 {{$course->category->name}}
              </p>
          </div>
          </td>
					
					<td class="border-grey-light border hover:bg-gray-100 p-3 text-red-400 hover:text-red-600 hover:font-medium cursor-pointer">
            {!! Form::model($course, ['route'=>['courses.enrolled', $course], 'method'=>'get', 'files'=>true]) !!}
    
            <div class="flex justify-end">
            {!! Form::submit('Ir al curso', ['class'=> 'inline-block rounded bg-blue-400 mr-2 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]']) !!}
            </div>
        
    {!! Form::close() !!}
           
          </td>
				</tr>
        @endforeach
			</tbody>
		</table>
	</div>
</body>

<style>
  html,
  body {
    height: 100%;
  }

  @media (min-width: 640px) {
    table {
      display: inline-table !important;
    }

    thead tr:not(:first-child) {
      display: none;
    }
  }

  td:not(:last-child) {
    border-bottom: 0;
  }

  th:not(:last-child) {
    border-bottom: 2px solid rgba(0, 0, 0, .1);
  }
</style>
    </div>
   
</div>
