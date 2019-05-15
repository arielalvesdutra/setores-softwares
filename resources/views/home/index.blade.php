@extends('template.layout')

@section('content')
<div class="main-content-card">

    <h1>Página inicial</h1>
    <hr/>

    <div class="row">
        Seja bem vindo a página inicial.
    </div>
    <div class="row">
        <strong>
            Selecione abaixo o setor para poder verificar os softwares vinculados ao mesmo:
        </strong>
    </div>


    <div class="row">
        <select class="sector-select" onchange="selectSector(event)">
            <option>
                Favor selecionar o setor...
            </option>

            @foreach($sectors as $sector)
                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
            @endforeach
        </select>
    </div>
    <div id="sector-softwares">
        <span>Nenhum setor selecionado.</span>
    </div>


</div>

    <script>
        const selectSector = (e) => {

            const sectorId = parseInt(e.target.value)

            if (sectorId <= 0 || !sectorId) {
                return
            }

            axios.get(`http://localhost:8000/sectors/${sectorId}/rest/sector-softwares`)
                .then(response => {
                    const softwaresDiv = document.getElementById('sector-softwares')
                    const data = response.data
                    let softwaresDivContent = data.reduce(buildSoftwaresDivContent, '')

                    if (!softwaresDivContent) {
                        softwaresDivContent = "<span>O setor não possui softwares vinculados.</span>"
                    }

                    softwaresDiv.innerHTML = softwaresDivContent
                })
                .catch(error => error)
        }

        const buildSoftwaresDivContent = (html, software) => {
            return html + "<div class='software-list-row'>" + software.name  + "</div>"
        }
    </script>
@endsection