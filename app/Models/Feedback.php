<?php 
namespace App\Models;
use Eloquent, DB;

class Feedback extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
     
    protected $table = 'feedback';


    /**
     * Function for bind Degree model   
     *
     */         
    public function degreeInfo(){
        return $this->belongsTo('App\Models\Degree','degree_id','id')->select(['id','name']);
    }

    /**
     * Function for bind Batch model   
     *
     */         
    public function batchInfo(){
        return $this->belongsTo('App\Models\Batch','batch_id','id')->select(['id','name']);
    }

    /**
     * Function for bind Batch model   
     *
     */         
    public function termInfo(){
        return $this->belongsTo('App\Models\Term','term_id','id')->select(['id','name']);
    }

    /**
     * Function for bind Batch model   
     *
     */         
    public function subjectInfo(){
        return $this->belongsTo('App\Models\Subject','subject_id','id')->select(['id','name']);
    }


    /**
     * Function for bind Batch model   
     *
     */         
    /*public function avgFeedbackInfos(){
        return $this->hasMany('App\Models\Responses','feedback_id','id')->select(['id','feedback_id','feedback_questions_id']);
    }*/

    /**
     * Function for bind Batch model   
     *
     */         
    public function getFeedbackQuestion(){
        return $this->hasMany('App\Models\FeedbackQuestion','feedback_id','id')->select(['id','feedback_id','question_id']);
    }

    
        

 
}// end Feedback class