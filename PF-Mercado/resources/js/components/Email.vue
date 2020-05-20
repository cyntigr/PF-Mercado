<template>
    <div class="form-group col-md-6">
        <label for="email" >Email</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <a href="#" class="input-group-text">
                    <span class="">
                        <i :class="{'fas ':true,'fa-at ':arroba,'fa-times':badGood}"></i>
                    </span>
                </a>
            </div>
            <input id="email" type="email" class="form-control " name="email" value="" required @keyup="comprobarEmail" />
        </div>
        <strong v-if="this.respuesta == 'existe'">Ese correo ya existe en la base de datos.</strong>
    </div>
</template>
<script>
    const axios = require('axios').default ;
    export default {
        data() {
            return{
                badGood: false,
                arroba: true,
                respuesta:'',
                correo:'',
            }

        },
        methods:{
            comprobarEmail : function(){
               this.correo = $('#email').val();

                axios.get('api/email/'+ this.correo).then((response) => {
                    this.respuesta = response.data;
                    console.log(this.respuesta);
                    if(this.respuesta == 'no'){
                        this.badGood = false ;
                        this.arroba  = true;
                    } else{
                        this.badGood = true ;
                        this.arroba  = false;
                    }
                });
                    
            }

        },
        mounted() {
            console.log('Component mounted great.')
        }
    }
</script>