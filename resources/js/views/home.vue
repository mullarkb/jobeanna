<template>
	<div id="content">
		<p>Search by Skill or Search by location</p>
		<a @click=searchBySkill>Skill</a>
		<a @click=searchByLocation>Location</a>
		<div v-if=showSkills>
			<ul>
				<li v-for='skill in skills'><a @click=selectSkill(skill)>{{skill.skill}}</a></li>
			</ul>
			<JobsBySkill v-if=selectedSkill v-bind="selectedSkill"></JobsBySkill>
		</div>
		<div v-if=showLocations>
			<ul>
				<li v-for='location in locations'><a @click=selectLocation(location)>{{location.city}}</a></li>
			</ul>
			<JobsByLocation v-if=selectedLocation v-bind="selectedLocation"></JobsByLocation>
		</div>
	</div>
</template>
<script>
	import JobsByLocation from '../components/JobsByLocation'
	import JobsBySkill from '../components/JobsBySkill'
    export default {
    	name: "Home",
    	components: {
    		JobsByLocation,
    		JobsBySkill,
    	},
	    data(){
    		return{
    			showSkills: '',
    			showLocations: '',
    			locations: {},
    			skills: {},
    			selectedSkill:'',
    			selectedLocation: '',
    		}
	    },
    	mounted () {
    		this.getSkills()
    		this.getLocations()
    	},
    	methods: {
    		async getSkills(){
    			axios.get('/skills').then(response => {
    				this.skills = response.data
    			})
    		},
    		async getLocations(){
    			axios.get('/locations').then(response => {
    				this.locations = response.data
    			})
    		},
    		searchBySkill(){
    			this.showSkills=true
    			this.showLocations=false
    		},
    		searchByLocation(){
    			this.showSkills=false
    			this.showLocations=true
    		},
    		selectSkill(skill){
    			this.selectedSkill = skill
    			console.log(this.selectedSkill)
    		},
    		selectLocation(location){
    			this.selectedLocation = location
    			console.log(this.selectedLocation)
    		},
    	},
    }
</script>
<style>
    
</style>