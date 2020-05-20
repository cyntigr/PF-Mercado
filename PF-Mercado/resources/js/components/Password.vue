<template>
    <div class="input-group">
        <div class="input-group-prepend">
			<b-link href="#" class="input-group-text" @click="seePassword">
				<span class="">
					<i :class="{'fas':true, 'fa-eye-slash':lock,'fa-eye':!lock}"></i>
                </span>
			</b-link>
		</div>
		<input class="form-control" name="password" :type="inputPassword" :required="mandatory" /> 
	</div>
</template>

<script>
    export default {
		props: {
			mandatory: { type: Boolean, default: false },
		},

		methods:
		{
			seePassword: function()
			{
				this.lock          = !this.lock ;
				this.inputPassword = (this.lock)?'password':'text' ;
			},
		},

		data()
		{
			return {
				lock          :  true,
				inputPassword : 'password',
			} ;
		},
        mounted() {
            console.log('Component mounted great.')
        }
    }
</script>
