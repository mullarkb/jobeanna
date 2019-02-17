<section id="jobs-page">
@foreach($jobslist as $job)
	 <h2>Location: {{ $job['location'] }}</h2>
	 <h3>Skill: {{ $job['skill'] }}</h3>
	 <p>Number of Jobs: {{ $job['count'] }}</p>
	 <p>Updated: {{ $job['updated_at'] }}</p>


@endforeach
</section>