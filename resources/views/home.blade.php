@extends('layouts.app')

@section('content')

<pagina tamanho="10">
    <painel titulo="Painel de Controle | Dashboard">
        Teste de Conteúdo

        <div class="row">
            <div class="col-md-4">
                <caixa qtd="80" titulo="Artigos" url="{{route('artigos.index')}}" cor="orange" icone="ion ion-pie-graph">
                             
                </caixa>
            </div>

            <div class="col-md-4">
                <caixa qtd="45" titulo="Usuários" url="#" cor="green" icone="ion ion-person-stalker">
                             
                </caixa>
            </div>

            <div class="col-md-4">
                <caixa qtd="2375" titulo="Relatórios" url="#" cor="blue" icone="ion ion-stats-bars">
                             
                </caixa>
            </div>
        </div>
    </painel>
</pagina>

@endsection
