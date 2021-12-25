<html>

<head>

<title></title>

<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css"/>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.css"/>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.3/datatables.min.js"></script>

</head>	

<body>

<script type="text/javascript">
$(document).ready(function() {
    $('#feedback_data').DataTable();
} );
</script>	

<div class="container">
 
<h1 align="center"> FeedBack Data</h1>

<table id="feedback_data" class="display table" style="width:100%">
        <thead>
            <tr>
                <th>FeedBackId</th>
                <th>FeedBackName</th>
                <th>Degree Name</th>
                <th>Batch Name</th>
                <th>Term Name</th>
                <th>Subject Name</th>
                <th>AVG of Feedback</th>
            </tr>
        </thead>
        <tbody>

        	@if(!empty($getRecord))
        		@foreach($getRecord as $result)

        			@php

        				$totalAnswerCount = 0;
        				$totalStudent = 0;
        				$feedbackAvg = 0;

        				if(!empty($result['get_feedback_question'])) {


        					foreach($result['get_feedback_question'] as $rowList) {
        						if(
        							($rowList['feedback_id'] == $result['id']) 
        							&& ($rowList['question_id'] == $rowList['slider_question_only']['id'])  
        						) {

        							if(!empty($rowList['get_response_question_only'])) {
        								
        								foreach($rowList['get_response_question_only'] as $feedback_list) {

        									if(
        										($feedback_list['feedback_id'] == $result['id'])
        										&& isset($feedback_list['answer'])
        									)  {
        										
        										$totalAnswerCount = $totalAnswerCount + $feedback_list['answer']; 

        										$totalStudent++;

        										
        									}	

        								}

        							}


        						}
        					}

        				}
        				

        				if(!empty($totalAnswerCount) && !empty($totalStudent)) {
        					$feedbackAvg = $totalAnswerCount / $totalStudent;
        				} 

        				

        			@endphp


        			<tr>
		                <td>{{ isset($result['id']) ? $result['id'] : '' }}</td>
		                <td>{{ isset($result['feedbacktitle']) ? $result['feedbacktitle'] : '' }}</td>
		                <td>{{ isset($result['degree_info']['name']) ? $result['degree_info']['name'] : '' }}</td>
		                <td>{{ isset($result['batch_info']['name']) ? $result['batch_info']['name'] : '' }}</td>
		                <td>{{ isset($result['term_info']['name']) ? $result['term_info']['name'] : '' }}</td>
		                <td>{{ isset($result['subject_info']['name']) ? $result['subject_info']['name'] : '' }}</td>
		                <td>{{ round($feedbackAvg,2)  }}</td>
            		</tr>	

        		@endforeach


        	@endif

        </tbody>
        
    </table>

</div>

</body>	

</html>