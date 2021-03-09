@extends('layouts4.app')
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Macros</h2>
            </div>
            <div class="pull-right">
                @can('pacientes-create')
                <a class="btn btn-success" href="{{ route('macros.create') }}"> Nova Macro</a>
                @endcan
            </div>

        </div>
    </div>


    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif



    <table class="table table-bordered">
        <tr>
            <th>id</th>
            <th>nome</th>
            <th width="280px">Ação</th>
        </tr>
	    @foreach ($macros as $macro)
	    <tr>

            <td>{{ $macro->id }}</td>
            <td>{{ $macro->nome }}</td>
          
	        <td>
            <form action="{{ route('macros.destroy',$macro->id) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('macros.edit',$macro->id) }}">Editar</a>
                    @can('macros-edit')
                    <a class="btn btn-primary" href="{{ route('macros.edit',$macro->id) }}">Editar</a>
                    @endcan

                    @csrf
                    @method('DELETE')
                    @can('macros-delete')
                    <button type="submit" class="btn btn-danger">Apagar</button>
                    @endcan
                </form>
	        </td>
	    </tr>
	    @endforeach
    </table>




    {!! $macros->links() !!}
        {!! $macros->links() !!}


<p class="text-center text-primary"><small>Macro</small></p>
@endsection
