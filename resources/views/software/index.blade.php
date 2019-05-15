@extends('template.layout')

@section('content')
<div class="main-content-card">

    <h1>Página de Softwares</h1>
    <hr/>

    <h2>Cadastrar Software</h2>
    <form method="POST" action="/softwares">
        @csrf
        <div class="row software-creation">
        <span class="plus-circle-span">
            <i class="fa fa-plus-circle"></i>
        </span>
            <span>
            <input name="name" type="text" placeholder="Digite o nome do software" />
        </span>
            <span>
            <button>Cadastrar</button>
        </span>
        </div>
    </form>

    @if ($errors->count())
        <div class="errors-container">

            @if($errors->has('duplicated'))
                <div>
                    Já existe um software com esse nome.
                </div>
            @endif
            @if($errors->has('nameRequired'))
                <div>
                    É preciso preencher o nome do software.
                </div>
            @endif
        </div>
    @endif

    @if($softwares->count())

        <h2>Listagem de Softwares</h2>

        @foreach($softwares as $software)
        <div class="software-list-row">
            <span>
                {{ $software->name }}
            </span>
            <span>
                <a href="/softwares/{{ $software->id }}/edit">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="/softwares/{{ $software->id }}/delete">
                    <i class="fa fa-trash"></i>
                </a>
            </span>
        </div>
        @endforeach
    @endif
</div>
@endsection