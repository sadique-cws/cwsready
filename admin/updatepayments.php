<?php
include('../include/config.php');

$now = new DateTime();


$student_courses=callingRecords('student_course', "status='1'");
if(!empty($student_courses)):

    foreach($student_courses as $sc) {
        $dateOfJoin = new DateTime($sc['date_of_join']);
        $interval = $now->diff($dateOfJoin);
        $start_year = $dateOfJoin->format('Y');
        $end_year = $now->format('Y');
        for($year=$start_year; $year<=$end_year;$year++){
            if($start_year==$end_year){
                $start_month = $dateOfJoin->format('m');
                $end_month = $now->format('m');
            }
            elseif($year==$start_year){
                $start_month = $dateOfJoin->format('m');
                $end_month = 12;
            }
            elseif($year==$end_year){
                $start_month = 01;
                $end_month = $now->format('m');
            }
            else{
                $start_month = 01;
                $end_month = 12;
            }
            for($month=$start_month;$month<=$end_month;$month++){
                $result = new DateTime($year.'-'.$month.'-1');
                $new_date = $result->format("Y-m-d");
                echo $new_date."<br>";
                $student_id = $sc['student_id'];
                $sc_id = $sc['id'];
                if(countRecord('payments', "student_id='$student_id' and sc_id='$sc_id' and date_of_creation='$new_date'")==0){
                    $data = [
                        'student_id'=>$student_id,
                        'date_of_creation'=>$new_date,
                        'date_of_payment'=>$new_date,
                        'sc_id'=>$sc_id,
                        'amount'=>'700',
                        'status'=>'0'
                    ];
                    $query=insertRecords('payments', $data);
                }
            }
        }

    }
endif;