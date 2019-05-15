@extends('template.layout')

@section('content')
<div class="main-content-card">

    <h1>Página de Softwares</h1>
    <hr/>

    <h2>Cadastrar Software</h2>
    <form method="POST" action="/softwares/{{ $software->id }}">
        @csrf
        @method('PUT')

        <div class="row software-creation">
            <span>
                <input name="name" type="text" value="{{ $software->name }}"
                       placeholder="Digite o nome do software" />
            </span>
            <span>
                <button>Editar</button>
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

    <div class="row">
        <a href="/softwares" class="back-page-link">Voltar</a>
    </div>
</div>
@endsection