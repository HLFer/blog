<template>

    <div v-bind:class="defineCor">
        <div class="panel-heading">{{titulo}}</div>

        <div class="panel-body">
            <slot>
                
            </slot>
        </div>
    </div>

</template>

<script>
    export default {
        props:['titulo','cor'],
        computed:{
            defineCor: function(){
                return "panel "+ (this.cor||"panel panel-primary");
            }
        }
        
    }
</script>

<style media="screen">
    .blue {
        border-color: #0d4a96;
    }

    .blue > .panel-heading {
        color: #fff;
        background-color: #0d4a96;
        border-color: #0d4a96;
    }

    .green {
        border-color: #209006;
    }

    .green > .panel-heading {
        color: #fff;
        background-color: #209006;
        border-color: #209006;
    }

    .red {
        border-color: #ff0000;
    }

    .red > .panel-heading {
        color: #fff;
        background-color: #ff0000;
        border-color: #ff0000;
    }

</style>