<template>
	<div id="content">
		Vue component is updating
	</div>
</template>
<script>
    export default {
    	name: "Home",
	    data(){
	    		return{

	    		}
	    },
    	mounted () {
    		this.getJobs()
    	},
    	methods: {
    		async getJobs(){
    			axios.get('/get-data').then(response => {
    				console.log(response.data)
    			})
    		}
    	},
    }
</script>
<style>
    
</style>