<x-app-layout>
   <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white shadow-lg rounded overflow-hidden">
            <div class="px-6 py-6">
                <h1 class="text-2xl font-bold">CREAR NUEVO CURSO</h1>

                <hr class="mt-2 mb-6">

                {!! Form::open(['route'=>'instructor.courses.store', 'file'=>true , 'autocomplete'=>'off']) !!}
                    {!! Form::hidden('user_id', auth()->user()->id) !!}
                
                    @include('instructor.courses.partials.form')
                    <div class="flex justify-end">
                        {!! Form::submit('Crear nuevo curso', ['class'=>'inline-block rounded bg-red-400 mt-4 px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal text-white shadow-[0_4px_9px_-4px_#3b71ca] transition duration-150 ease-in-out hover:bg-primary-600 hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:bg-primary-600 focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] focus:outline-none focus:ring-0 active:bg-primary-700 active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.3),0_4px_18px_0_rgba(59,113,202,0.2)] dark:shadow-[0_4px_9px_-4px_rgba(59,113,202,0.5)] dark:hover:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:focus:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)] dark:active:shadow-[0_8px_9px_-4px_rgba(59,113,202,0.2),0_4px_18px_0_rgba(59,113,202,0.1)]cursor-pointer']) !!}
                    </div>
                {!! Form::close() !!}
            </div>
        </div>

   </div>
   <x-slot name="js">
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>

    <script>
         //Slug automático
document.getElementById("title").addEventListener('keyup', slugChange);

function slugChange(){

title = document.getElementById("title").value;
document.getElementById("slug").value = slug(title);

}

function slug (str) {
var $slug = '';
var trimmed = str.trim(str);
$slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
replace(/-+/g, '-').
replace(/^-|-$/g, '');
return $slug.toLowerCase();
}

    //CKEditor
    ClassicEditor
.create( document.querySelector( '#description' ), {
toolbar: [ 'heading', '|', 'bold', 'italic', 'link', 'bulletedList', 'numberedList', 'blockQuote' ],
heading: {
    options: [
        { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
        { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
        { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' }
    ]
}
} )
.catch( error => {
console.log( error );
} );

//Cambiar imagen
document.getElementById("file").addEventListener('change', cambiarImagen);

function cambiarImagen(event){
var file = event.target.files[0];

var reader = new FileReader();
reader.onload = (event) => {
    document.getElementById("picture").setAttribute('src', event.target.result); 
};

reader.readAsDataURL(file);
}
    </script>
    
</x-slot>
</x-app-layout>