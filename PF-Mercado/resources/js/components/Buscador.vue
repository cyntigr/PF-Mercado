<template>
  <div>
      <input  class="form-control ml-3"  type="text"  name="buscador" id="buscador"
              list="buscar" @keyup="search" />
      <datalist id="buscar">
          <option v-for="item in market" :key="item.idPuesto" :value="item.nombre"></option>
      </datalist>
  </div>
</template>

<script>
    export default {
        data() {
            return{
                market:[],
                word:'',
            }
        },
        methods:{
            search : function(){
                this.word = $('#buscador').val();
                
                axios.get('api/search/'+ this.word).then((response) => {
                    this.market = response.data;
                });    
            }
        },
        mounted() {
          console.log('Component mounted great.')
        }
    }
</script>