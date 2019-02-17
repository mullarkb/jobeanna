<?php

namespace App\Http\Controllers\Scraper;

use App\Http\Controllers\Controller;
use App\skill;
use App\location;
use Goutte;
use Illuminate\Http\Request;


class ScrapeController extends Controller
{
	public function index(){
		$locations= location::all();
    	$skills= skill::all();
    	$jobslist=[];
        $mostRecent=[];
        $newlist =[];

    
    	//get every entry from pivot table with skill and city name
        foreach ($skills as $skill) {
    		foreach ($skill->locations as $job){
                $listing = [
    				'skill' => $skill->skill,
    				'location' => $job->city,
    				'count' => $job->pivot->count,
                    'updated_at' => $job->pivot->updated_at
    			];
                array_push($jobslist, $listing); 
    		}
    	}
        //need to figure out way to only desplay most recent search for combination of skill and locartion

		// send whichever array to blade file.
        /* 
        return view('jobs', [ 
			'jobslist' => $jobslist
		]); */
        return json_encode($jobslist);
	}
   public function getSkills(){
        $skills = skill::all();
        return json_encode($skills);
    }
    public function getLocations(){
        $locations = location::all();
        return json_encode($locations);
    }
    public function getJobsByLocation(Request $request ){
        $jobslist=[];
        $locationId = $request->location;
        $locationData= location::where('id', $locationId)->first();
        return json_encode($locationData->skills);
    }
    public function getJobsBySkill(Request $request ){
        $jobslist=[]; //return this list
        $skillId = $request->skill;
        //echo("<pre>");print_r($skillId);exit;
        $skillData= skill::where('id', $skillId)->first();
        
        
        return json_encode($skillData->locations);

    }

    public function scrape(){
    	$locations= location::all();
    	$skills= skill::all();
    	
    	foreach($locations as $place){
    		$city = $place['city'];
    		$city_id = $place['id'];
    		foreach ($skills as $skill) {
    			$skill_name = $skill['skill'];
    			$skill_id = $skill['id'];
    			$url = 'https://ie.indeed.com/jobs?q='.$skill_name.'&l='.$city;
    			$crawler = Goutte::request('GET', $url);
    			$number_of_jobs = $crawler->filter('#searchCount')->each(function ($node) {
			      $count = $node->text();
			      $count = preg_split('/ /', $count, -1, PREG_SPLIT_NO_EMPTY);
			      $count = $count[4];
			      return $count;
			    });
			    //check to see if same location / skill combo pivot exists already - if it does, it gets deleted
                $skill->locations()->wherePivot('location_id',$city_id)->detach();
                //attach new 
                $skill->locations()->attach($place, ['count' => $number_of_jobs[0]]);
                //need an archive table to also store shit for trend data later...
    		}
    	}
    }
}
