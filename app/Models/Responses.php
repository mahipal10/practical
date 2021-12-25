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
        return $this->belongsTo('App\Models\Question','question_id','id')->where('type','slider')->select(['id','question','type']);
    }


 
}// end Responses class