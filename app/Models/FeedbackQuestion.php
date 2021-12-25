<?php 
namespace App\Models;
use Eloquent;

class FeedbackQuestion extends Eloquent  {

    /**
     * The database table used by the model.
     *
     * @var string
     */
     
    protected $table = 'feedback_questions';

    /**
     * Function for bind Batch model   
     *
     */         
    public function sliderQuestionOnly(){
        return $this->belongsTo('App\Models\Question','question_id','id')->where('type','slider')->select(['id','question','type']);
    }


    /**
     * Function for bind Batch model   
     *
     */         
    public function getResponseQuestionOnly(){
        return $this->hasMany('App\Models\Responses','feedback_questions_id','id')->select(['id','feedback_questions_id','answer','feedback_id']);
    }


 
}// end FeedbackQuestion class