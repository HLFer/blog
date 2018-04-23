<template>
    <div class="">

        <div class="form-inline">
            <a v-if="criar" v-bind:href="criar">Criar</a>
            <div class="form-group pull-right">
                <input type="search" class="form-control" placeholder="Buscar" v-model="buscar">
            </div>
        </div>



        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th style="cursor:pointer" v-on:click="ordenaColuna(index)" v-for="(titulo,index) in titulos">{{titulo}}</th>

                    <th v-if="detalhe || editar || deletar">Ação</th>
                </tr>
            </thead>
            <tbody>
                
                <tr v-for="(item, index) in lista">
                    <td v-for="i in item">{{i}}</td>
                    
                    <td v-if="detalhe || editar || deletar">
                        <form v-bind:id="index" v-if="deletar && token" v-bind:action="deletar" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" name="_token" v-bind:value="token">

                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a> 
                            <a v-if="editar" v-bind:href="editar"> Editar |</a> 

                            <a href="#" v-on:click="executaForm(index)"> Deletar</a>

                        </form>

                        <span v-if="!token">

                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a> 
                            <a v-if="editar" v-bind:href="editar"> Editar |</a> 

                        </span>

                        <span v-if="token && !deletar">
                            <a v-if="detalhe" v-bind:href="detalhe">Detalhe |</a> 
                            <a v-if="editar" v-bind:href="editar"> Editar |</a>
                            <a v-if="deletar" v-bind:href="deletar"> Deletar</a>  
                        </span>

                    </td>
                </tr>
               
            </tbody>
        </table>
    </div>
</template>

<script>
    export default {
        props:['titulos', 'itens', 'ordem', 'ordemCol', 'criar', 'detalhe', 'editar', 'deletar', 'token'],
        data: function(){
            return {
                buscar:'',
                ordemAux: this.ordem || "asc",
                ordemAuxCol: this.ordemCol || 0
            }
        },
        methods:{
            executaForm: function(index){
                document.getElementById(index).submit();
            },
            ordenaColuna: function(coluna){
                this.ordemAuxCol = coluna;
                if(this.ordemAux.toLowerCase() == "asc"){
                    this.ordemAux = 'desc';
                }else{
                    this.ordemAux = 'asc';
                }
            }
        },
        computed:{
            lista: function(){
                
                let ordemAux = this.ordemAux; 
                let ordemAuxCol = this.ordemAuxCol;

                ordemAux = ordemAux.toLowerCase();
                ordemAuxCol = parseInt(ordemAuxCol);

                if(ordemAux == "asc"){
                    this.itens.sort(function(a,b){
                    if(a[ordemAuxCol] > b[ordemAuxCol]) {return 1;}
                    if(a[ordemAuxCol] < b[ordemAuxCol]) {return -1;}
                    return 0;
                    });
                }
                else{
                    this.itens.sort(function(a,b){
                        if(a[ordemAuxCol] < b[ordemAuxCol]) {return 1;}
                        if(a[ordemAuxCol] > b[ordemAuxCol]) {return -1;}
                        return 0;
                    });
                }

                return this.itens.filter(response => {
                    for(let k = 0; k < response.length; k++){
                        if((response[k] + "").toLowerCase().indexOf(this.buscar.toLowerCase()) >= 0){
                        return true;
                        }
                    }
                    return false; 
                });
                return this.itens;
            }
        }
    }
</script>