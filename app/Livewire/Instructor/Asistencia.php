<?php

namespace App\Livewire\Instructor;

use App\Models\Course;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Asistencias;
use App\Models\User;

class Asistencia extends Component
{
    use AuthorizesRequests;
    use WithPagination;
    
    public $course, $search;


    public function mount(Course $course){
        $this->course = $course;

        $this->authorize('dicatated',$course);
    }
    public function updatingSearch(){
        $this->resetPage();
    }
    public function render()
    {
        $students = $this->course->students()->where('name', 'LIKE', '%'.$this->search. '%')->paginate(8);
        return view('livewire.instructor.asistencia', compact('students'));
    }
    //Estas modificaciones las hice hoy 29/11
    public function store(Request $request){
        try {
            $user = Auth::user();
            $input = $request->all();
            $fechaActual = \Carbon\Carbon::now()->format('Y-m-d');

            // Itera sobre los datos enviados desde el formulario
            foreach ($input['asistencia'] as $user_id => $asiste) {
                $comentario = $input['comentario'][$user_id];

                // Busca registros existentes con el mismo idEstudiante y diaAsistencia igual a la fecha actual
                $existingRecord = Asistencias::where('user_id', $user_id)
                    ->where('diaAsistencia', $fechaActual)
                    ->first();

                if ($existingRecord) {
                    // Si existe un registro con la misma fecha actual, actualiza sus valores
                    $existingRecord->update([
                        'asistencia' => $asiste,
                        'comentario' => $comentario,
                    ]);
                } else {
                    // Si no existe un registro con la misma fecha actual, crea uno nuevo
                    Asistencias::create([
                       
                        'user_id' => $user->user_id,
                        'asistencia' => $asiste,
                        'diaAsistencia' => $fechaActual,
                        'comentario' => $comentario,
                        
                    ]);
                }
            }
            return redirect()->route('show-listar-asistencia');
        } catch (\Exception $e) {
            $errorMessage = $e->getMessage();

            echo "<script>alert('Hubo un problema al guardar la asistencia: $errorMessage');</script>";
        }
    }

    public function show()
    {

        $courses = Auth::user()->course_id; // Obtiene el id de curso del usuario autenticado
        $estudiantes = User::where('id', $courses)->get(); // Filtra estudiantes por curso

        return view('asistencia.listar-asistencia', compact('estudiantes'));
    }

    public function edit()
    {

        $courses = Auth::user()->course_id; // Obtiene el id de curso del usuario autenticado
        $estudiantes = User::where('id', $courses)->get(); // Filtra estudiantes por curso

        return view('asistencia.editar-asistencia', compact('estudiantes'));
    }
}
