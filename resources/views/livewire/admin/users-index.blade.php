<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model.live="search" class="form-control w-100" placeholder="Escriba un nombre...">
        </div>
    @if ($users->count())
        <div class="card-body">
            <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>

                        <td width="10px">
                            <a class="btn btn-primary" href="{{route('admin.users.edit', $user)}}">Editar</a>
                        </td>
                        <td width="10px">
                            <form action="{{route('admin.users.destroy', $user)}}"method="POST">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        </div>
        
        <div class="card-footer">
            {{$users->links()}}
        </div>    
    @else
        <div class="card-body">
            <strong>NO hay resultados</strong>
        </div>
    @endif        
                
    
            
            
    </div>
</div>
