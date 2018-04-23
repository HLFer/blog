@extends('layouts.app')

@section('content')

<pagina tamanho="12">
    <painel titulo="Lista de Artigos">
        <tabela-lista 
        v-bind:titulos="['#', 'Título','Descrição']"
        v-bind:itens="[[1,'PHP OO', 'Curso de PHP - OO'],[2, 'Vue JS', 'Curso de Vue JS']]"
        ordem="asc" ordemCol="0"
        criar="#criar" detalhe="#detalhe" editar="#editar" deletar="#deletar" token="12344343"
        ></tabela-lista>
    </painel>
</pagina>

@endsection