<template>
    <div class="form-group col-md-6">
        <label for="dni" >DNI</label>
        <input id="dni" type="text" class="form-control " name="dni" placeholder="00000000G" value="" required @keyup="dniCheck" />
        <strong v-if="this.respuesta == 'incorrecto'">El dni no es correcto.</strong>
        <strong v-if="this.respuesta == 'existe'">El dni ya existe.</strong>
    </div>
</template>
<script>
    const axios = require('axios').default ;
    export default {
        data() {
            return{
                respuesta:'',
                dni:'',
            }
        },
        methods:{
            dniCheck : function(){
                this.dni = $('#dni').val();

                axios.get('api/dni/'+ this.dni).then((response) => {
                    this.respuesta = response.data;
                });    
            }
        },
        mounted() {
            console.log('Component mounted great.')
        }
    }
</script>