<template>
    <div id="jobs-by-location">
        <h2>{{city}}</h2>
        <ul>
            <li v-for="job in jobs"><h3>{{job['skill']}}:</h3> {{job['pivot']['count']}}</li>
        </ul>
    </div>
</template>
<script>
    export default {
        name: "JobsByLoaction",
        props: [
            'id',
            'city'
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
                axios.get('/jobs-by-location?location=' + this.id).then(response => {
                    this.jobs=response.data
                    console.log(this.jobs)
                })
            }
        },
    }
</script>
<style>
    
</style>