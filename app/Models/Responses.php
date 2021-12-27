<?php 
namespace App\Models;
use Eloquent;

class Responses extends Eloquent  {

    /**
    * The database table used by the model.
    *
    * @var string
    */
 
    protected $table = 'responses';

    /**
     * Function for bind Batch model   
     *
     */         
    
    public function feedbackQuestionInfo(){
        return $this->hasMany('App\Models\FeedbackQuestion','question_id','feedback_questions_id')->select(['id','question_id','feedback_id']);
    }


 
}// end Responses class