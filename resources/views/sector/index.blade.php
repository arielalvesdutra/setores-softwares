@extends('template.layout')

@section('content')
<div class="main-content-card">

    <h1>Página de Setores</h1>
    <hr/>

    <h2>Cadastrar Setor</h2>
    <form method="POST" action="/sectors">
        @csrf
        <div class="row sector-creation">
        <span class="plus-circle-span">
            <i class="fa fa-plus-circle"></i>
        </span>
            <span>
            <input name="name" type="text" placeholder="Digite o nome do setor" />
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
                    Já existe um setor com esse nome.
                </div>
            @endif
            @if($errors->has('nameRequired'))
                <div>
                    É preciso preencher o nome do setor.
                </div>
            @endif
        </div>
    @endif

    @if($sectors->count())

        <h2>Listagem de Setores</h2>

        @foreach($sectors as $sector)
        <div class="sector-list-row">
            <span>
                {{ $sector->name }}
            </span>
            <span>
                <a href="/sectors/{{ $sector->id }}/edit">
                    <i class="fa fa-edit"></i>
                </a>
                <a href="/sectors/{{ $sector->id }}/delete">
                    <i class="fa fa-trash"></i>
                </a>
            </span>
        </div>
        @endforeach
    @endif
</div>
@endsection