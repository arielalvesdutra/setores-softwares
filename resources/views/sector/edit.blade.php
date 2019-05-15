@extends('template.layout')

@section('content')
<div class="main-content-card">

    <h1>Página de Setores</h1>
    <hr/>

    <h2>Editar Setor</h2>
    <form method="POST" action="/sectors/{{ $sector->id }}">
        @csrf
        @method('PUT')

        <div class="row sector-creation">
            <span>
                <input name="name" type="text" value="{{ $sector->name }}"
                       placeholder="Digite o nome do setor" />
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

    <h2>Vincular Softwares</h2>

    @if($allSoftwares->count())

        <div>
            @foreach($allSoftwares as $software)
                <div class="sector-softwares-list-row">
                <span>
                {{ $software->name }}
                </span>
                    <span>
                    @if($sectorSoftwares->where('id', $software->id)->toArray())
                            <form action="/sectors/{{ $sector->id }}/unlink-software/{{ $software->id }}" method="POST">
                            @csrf
                            <input onclick="submit()" name="use" checked
                                   type="checkbox" value="{{ $software->id }}" />
                        </form>
                        @endif
                        @if(!$sectorSoftwares->where('id', $software->id)->toArray())
                            <form action="/sectors/{{ $sector->id }}/link-software/{{ $software->id }}" method="POST">
                            @csrf
                            <input onclick="submit()" name="use" type="checkbox"
                                   value="{{ $software->id }}" />
                        </form>
                        @endif
                </span>
                </div>
            @endforeach
        </div>

    @endif

    <div class="back-page-row">
        <a href="/sectors" class="back-page-link">Voltar</a>
    </div>
</div>
@endsection