<?php
namespace App\Http\Controllers;
use App\Models\Batch;
use App\Models\Degree;
use App\Models\Feedback;
use App\Models\FeedbackQuestion;
use App\Models\Question;
use App\Models\Responses;
use App\Models\Subject;
use App\Models\Term;

use Blade,Redirect,Response,View,Request;

 
class HomeController extends Controller {
	
	public function __construct() {
		
		
	}// end function __construct()
	
	public function index() {
		
		$DB 		=	Feedback::Query();
		$DB 		= 	$DB->with(['degreeInfo','batchInfo','termInfo','subjectInfo','getFeedbackQuestion.sliderQuestionOnly','getFeedbackQuestion.getResponseQuestionOnly']);
		$getRecord 	= 	$DB->get()->toArray();

		//$getRecord = array();

		return View::make('index',compact('getRecord'));
	}

	

}
// end HomeController class
