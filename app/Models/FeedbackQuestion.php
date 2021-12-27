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


    
    


 
}// end FeedbackQuestion class