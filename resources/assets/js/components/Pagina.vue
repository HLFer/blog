<template>
    <div class="container">
        <div class="row">
            <div v-bind:class="defineTamanho">
                <slot>
                    
                </slot>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        props:['tamanho'],
        computed:{
            defineTamanho: function(){
                if(this.tamanho >= 12){
                    return "col-md-12";
                }
                if(this.tamanho <= 2){
                    return "col-md-2 col-md-offset-5";
                }
                if((this.tamanho % 2) == 0){
                    //Para valores pares
                    return "col-md-"+this.tamanho+" col-md-offset-"+((12 - this.tamanho)/2);
                }else{
                    //Para valores ímpares
                    return "col-md-"+(parseInt(this.tamanho) + 1)+" col-md-offset-"+((12 - (parseInt(this.tamanho) +1))/2);
                }
            }
        }
    }
</script>