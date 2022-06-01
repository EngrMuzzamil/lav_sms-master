@extends('layouts.master')
@section('page_title', 'Student Profile of ' .$student->student_name)
@section('content')
<div class="row">

    <div class="col-md-9">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs nav-tabs-highlight">
                    <li class="nav-item"><a href="#info1" class="nav-link active" data-toggle="tab">Course Information</a></li>
                    <li class="nav-item"><a href="#info2" class="nav-link" data-toggle="tab">Personal Information</a></li>
                    <li class="nav-item"><a href="#info3" class="nav-link" data-toggle="tab">Educational Information</a></li>
                    <li class="nav-item"><a href="#info4" class="nav-link" data-toggle="tab">Detail Information</a></li>
                    <li class="nav-item"><a href="#info5" class="nav-link" data-toggle="tab">Additional Information</a></li>
                </ul>


                <div class="tab-content">
                    <div class="tab-pane fade show active" id="info1">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>

                                <th>Name</th>
                                <td>{{$student->student_name}}</td>
                                <th>Course</th>
                                <td>{{$student->course}}</td>
                                <th>Faculty</th>
                                <td>{{$student->faculty}}</td>

                            </tr>
                            <tr>

                                <th>Semester</th>
                                <td>{{$student_session[0]->semester." - ". $student_session[0]->year}}</td>
                                <th>Department</th>
                                <td>{{$student->dept}}</td>
                                <th>Session</th>
                                <td>{{$student_session[0]->session_start.' - '.$student_session[0]->session_end}}</td>

                            </tr>

                            <tr>
                                <th>Roll no</th>
                                <td>{{$student->roll_no}}</td>
                                <th>Registration No</th>
                                <td>{{$student->registration_no}}</td>
                                <th>Degree</th>
                                <td>{{$student->degree}}</td>

                            </tr>

                            <tr>
                                <th>Admission Date</th>
                                <td>{{$student->admission_date}}</td>
                                <th>Failed Credit Exam</th>
                                <td>{{$student->failed_credit_exam}}</td>
                                <th>Remarks</th>
                                <td>{{$student->remarks}}</td>

                            </tr>

                            <tr>
                                <th>Readmission</th>
                                <td>{{date('d-M-Y',strtotime($student->readmission))}}</td>
                                <th>Created At</th>
                                <td>{{date('d-M-Y',strtotime($student->created_at))}}</td>
                                <th>Updated At</th>
                                <td>{{date('d-M-Y',strtotime($student->updated_at))}}</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="info2">
                        <table class="table table-bordered">
                            <tbody>
                            <tr>

                                <th>Father Name</th>
                                <td>{{$student->father_name}}</td>
                                <th>Mother Name</th>
                                <td>{{$student->mother_name}}</td>
                                <th>Date of Birth</th>
                                <td>{{date("d-M-Y",strtotime($student->dob))}}</td>

                            </tr>
                            <tr>
                                <th>NID</th>
                                <td>{{$student->nid}}</td>
                                <th>Gender</th>
                                <td>{{$student->gender}}</td>
                                <th>Birth Place</th>
                                <td>{{$student->birth_place}}</td>

                            </tr>

                            <tr>
                                <th>Guardian Name</th>
                                <td>{{$student->guardian_name}}</td>
                                <th>Permanent Address</th>
                                <td>{{$student->permanent_address}}</td>
                                <th>Present Address</th>
                                <td>{{$student->present_address}}</td>

                            </tr>

                            <tr>
                                <th>Post office, Post code, District, Country, Contact No</th>
                                <td>{{$student->post_office}}</td>
                                <th>Upazilla, Post office , Post code, District, Country , Contact No</th>
                                <td>{{$student->post_office2}}</td>
                                <th>Student Contact No</th>
                                <td>{{$student->student_contact_no}}</td>

                            </tr>

                            <tr>

                                <th>Skills</th>
                                <td>{{date('d-M-Y',strtotime($student->skills))}}</td>
                                <th>Tribal</th>
                                <td>{{date('d-M-Y',strtotime($student->tribal))}}</td>
                                <th>Freedom Fighter</th>
                                <td>{{date('d-M-Y',strtotime($student->fighter))}}</td>
                            </tr>

                            <tr>
                                <th>Guardian Contact No</th>
                                <td>{{date('d-M-Y',strtotime($student->guardian_contact_no))}}</td>
                                <th>Created At</th>
                                <td>{{date('d-M-Y',strtotime($student->created_at))}}</td>
                                <th>Updated At</th>
                                <td>{{date('d-M-Y',strtotime($student->updated_at))}}</td>


                            </tr>
                            </tbody>
                        </table>
                   </div>

                    <div class="tab-pane fade" id="info3">

                        <table class="table table-bordered">
                            <tbody>
                        @foreach($student_edu as $val)
                            <tr>
                                <th class="text-center" colspan="8"><h3><b>{{ucfirst($val->edu_type)}}</b></h3></th>
                            </tr>
                            <tr>
                                <th>Exam</th>
                                <td>{{$val->exam}}</td>
                                <th>Department</th>
                                <td>{{$val->dept}}</td>
                                <th>Institute</th>
                                <td>{{$val->institute}}</td>
                                <th>Roll no</th>
                                <td>{{$val->roll_no}}</td>

                            </tr>
                            <tr>
                                <th>Registration</th>
                                <td>{{$val->registration}}</td>
                                <th>Session</th>
                                <td>{{$val->session}}</td>
                                <th>Result</th>
                                <td>{{$val->result}}</td>
                                <th>Created At</th>
                                <td>{{$val->created_at}}</td>

                            </tr>

                        @endforeach

                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="info4">

                        <table class="table table-bordered">
                            <tbody>
                            <tr>
                                <th>Hall Name</th>
                                <td>{{$student->hall_name}}</td>
                                <th>Room No</th>
                                <td>{{$student->room_no}}</td>
                                <th>Supervisor</th>
                                <td>{{$student->supervisor}}</td>
                                <th>Residential</th>
                                <td>{{$student->residential}}</td>

                            </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="tab-pane fade" id="info5">

                        <table class="table table-bordered">
                            <tbody>
                               @foreach($student_additional as $add)
                                 <tr>
                                    <th>{{ucfirst($add->field_name)}}</th>
                                    <td>{{ucfirst($add->value)}}</td>
                                 </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
            </div>
        </div>
    </div>
</div>




@endsection
