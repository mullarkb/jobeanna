<template>
	<div id="jobs-by-skill">
		<h2>{{skill}}</h2>
        <ul>
            <li v-for="job in jobs"><h3>{{job['city']}}:</h3> {{job['pivot']['count']}}</li>
        </ul>
	</div>
</template>
<script>
    export default {
    	name: "JobsBySkill",
        props: [
            'id',
            'skill'
        ],
	    data(){
    		return{
                jobs: {},
    		}
	    },
    	mounted () {
    		this.getJobs()
    	},
    	methods: {
    		async getJobs(){
    			axios.get('/jobs-by-skill?skill=' + this.id).then(response => {
    				this.jobs=response.data
                    console.log(this.jobs)
    			})
    		}
    	},
    }
</script>
<style>
    
</style>