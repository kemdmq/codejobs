<?php
/**
 * Access from index.php:
 */
if(!defined("_access")) {
	die("Error: You don't have permission to access here...");
}

class Videos_Controller extends ZP_Controller {
	
	public function __construct() {
		$this->Templates = $this->core("Templates");
		
		$this->config("videos");

		$this->helper("pagination");
		
		$this->application = $this->app("videos");
		
		$this->Templates->theme();
	}
	
	public function index() {
		$this->videos();
	}
	
	public function videos() {
		$this->CSS("videos", $this->application);
		$this->CSS("prettyPhoto", $this->application);
		$this->CSS("pagination");
		
		$this->Videos_Model = $this->model("Videos_Model");
		
		$limit = $this->limit();
	
		$videos = $this->Videos_Model->getVideos($limit);	
				
		if($videos) {			
			$vars["pagination"] = $this->pagination;
			$vars["videos"] 	= $videos;			
			$vars["view"] 		= $this->view("videos", TRUE);
			
			$this->render("content", $vars);
		} else {
			redirect();
		}
	}
	
	public function video($id){
		$this->Videos_Model = $this->model("Videos_Model");
		$video = $this->Videos_Model->getByID($id);
		if($video){
			$vars["video"] = $video[0];
			$vars["view"]  = $this->view("video", TRUE);
			
			$this->render("content", $vars);
		} else{
			redirect();
		}
	}
	
	private function limit() { 			
		$start = (segment(0, isLang()) === "videos" and segment(1, isLang()) > 0) ? (segment(1, isLang()) * _maxLimitVideos) - _maxLimitVideos : 0;
		
		$limit = $start .", ". _maxLimitVideos;			
		$count = $this->Videos_Model->count();
		$URL   = path("videos/");			
		
		$this->pagination = ($count > _maxLimitVideos) ? paginate($count, _maxLimitVideos, $start, $URL) : NULL;	

		return $limit;
	}
	
}
