@extends('layouts.master')
@section('page_title', 'Edit Student')
@section('content')

        <div class="card">
            <div class="card-header bg-white header-elements-inline">
                <h6 id="ajax-title" class="card-title">Please fill The form Below To Edit record of {{ $student->student_name }}</h6>

                {!! Qs::getPanelOptions() !!}

            </div>

            <form method="post" enctype="multipart/form-data" class="wizard-form steps-validation ajax-update" data-reload="#ajax-title" action="{{ route('students.update', Qs::hash($student->id)) }}" data-fouc>
                @csrf @method('PUT')


                <h6>Course Information</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Student Name: <span class="text-danger">*</span></label>
                                <input required value="{{ $student->student_name }}"  type="text" name="student_name" placeholder="Student Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Roll no: <span class="text-danger">*</span></label>
                                <input required value="{{  $student->roll_no }}" class="form-control" placeholder="Roll no" name="roll_no" type="text" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Registration No: <span class="text-danger">*</span></label>
                                <input required value="{{  $student->registration_no }}"  type="text" name="registration_no" placeholder="Registration No" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">

                                <label>Session: </label>
                                <select required data-placeholder="Choose..."  name="session_id" id="session_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($sessions as $nal)
                                        <option {{ ( $student_session[0]->session_id == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ date("d/M/Y", strtotime($nal->session_start)).' --- '.date("d/M/Y", strtotime($nal->session_end)) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Course Name: </label>
                                <select required data-placeholder="Choose..."  name="course_id" id="course_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($courses as $nal)
                                        <option {{ ($student->course_id == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Degree Name: </label>
                                <select required data-placeholder="Choose..."  name="degree_id" id="degree_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($degree as $nal3)
                                        <option {{ ($student->degree_id == $nal3->id ? 'selected' : '') }} value="{{ $nal3->id }}">{{ $nal3->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Admission Date:</label>
                                <input required value="{{$student->admission_date }}" type="date" name="admission_date" class="form-control" placeholder="" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Faculty Name:</label>
                                <select required data-placeholder="Choose..."  name="faculty_id" id="faculty_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($faculty as $nal4)
                                        <option {{ ($student->faculty_id == $nal4->id ? 'selected' : '') }} value="{{ $nal4->id }}">{{ $nal4->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Department:</label>
                                <select required data-placeholder="Choose..."  name="department_id" id="department_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($department as $nal)
                                        <option {{ ( $student->department_id == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Failed credit exam:</label>
                                <input required value="{{ $student->failed_credit_exam }}" type="text" name="failed_credit_exam" class="form-control" placeholder="" >

                            </div>
                        </div>

                        <div class="col-md-3">
                            <label>Remarks:</label>
                            <input required value="{{ $student->remarks }}" type="text" name="remarks" class="form-control" placeholder="" >

                        </div>

                        <div class="col-md-3">
                            <label>Readmission on:</label>
                            <input required value="{{ $student->readmission }}" type="date" name="readmission" class="form-control" placeholder="" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Semester - Year:</label>
                                <select required data-placeholder="Choose..."  name="semester_id" id="semester_id" class="select-search form-control">
                                    <option value=""></option>
                                    @foreach($semester as $nal)
                                        <option {{ ($student_session[0]->semester_id == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->semester.' - '.$nal->year }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>


                </fieldset>
                <h6>Personal Information</h6>
                <fieldset>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Father Name: <span class="text-danger">*</span></label>
                                <input required value="{{ $student->father_name }}"  type="text" name="father_name" placeholder="Father Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Mother Name: <span class="text-danger">*</span></label>
                                <input required value="{{ $student->mother_name }}"  type="text" name="mother_name" placeholder="Mother Name" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>DOB: <span class="text-danger">*</span></label>
                                <input required value="{{ $student->dob }}"  type="date" name="dob" placeholder="" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label>NID: <span class="text-danger">*</span></label>
                                <input required value="{{ $student->nid }}" class="form-control" placeholder="NID" name="nid" type="text" >
                            </div>
                        </div>

                    </div>
                    <div class="row">


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="gender">Gender: <span class="text-danger">*</span></label>
                                <select required class="select form-control" id="gender" name="gender"  data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option {{ ($student->gender == 'Male') ? 'selected' : '' }} value="Male">Male</option>
                                    <option {{ ($student->gender == 'Female') ? 'selected' : '' }} value="Female">Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="bg_id">Blood Group: </label>
                                <select required class="select form-control" id="blood_id" name="blood_id" data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    @foreach(App\Models\BloodGroup::all() as $bg)
                                        <option {{ ($student->blood_id == $bg->id ? 'selected' : '') }} value="{{ $bg->id }}">{{ $bg->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Place of Birth:</label>
                                <input required value="{{ $student->birth_place }}" type="text" name="birth_place" class="form-control" placeholder="NY" >
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Guardian Name:</label>
                                <input required value="{{ $student->guardian_name }}" type="text" name="guardian_name" class="form-control" placeholder="Guardian Name" >
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Permanent Address:</label>
                                <input required name="permanent_address" value="{{ $student->permanent_address }}" type="text" class="form-control" placeholder="Permanent Address">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Present Address:</label>
                                <input required name="present_address" value="{{ $student->present_address }}" type="text" class="form-control" placeholder="Present Address">

                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Post office, Post code, District, Country, Contact No:</label>
                                <input required name="post_office" value="{{ $student->post_office }}" type="text" class="form-control" placeholder="">
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Upazilla, Post office , Post code, District, Country , Contact No):</label>
                                <input required name="post_office2" value="{{ $student->post_office2 }}" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Student Contact No</label>
                                <input required name="student_contact_no" value="{{ $student->student_contact_no }}" type="text" class="form-control" placeholder="">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Guardian Contact No</label>
                                <input required name="guardian_contact_no" value="{{ $student->guardian_contact_no }}" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Skills</label>
                                <input required name="skills" value="{{ $student->skills }}" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tribal</label>
                                <br>
                                <input required type="radio" id="html" name="tribal" value="yes" @if( $student->tribal == 'yes') checked @endif>
                                  <label for="html">Yes</label><br>
                                <input required type="radio" id="css" name="tribal" value="no" @if( $student->tribal == 'no') checked @endif>
                                  <label for="css">No</label><br>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Freedom Fighter</label>
                                <br>
                                <input required type="radio" id="html" name="fighter" value="yes" @if( $student->fighter == 'yes') checked @endif>
                                  <label for="html">Yes</label><br>
                                <input required type="radio" id="css" name="fighter" value="no" @if( $student->fighter == 'no') checked @endif>
                                  <label for="css">No</label><br>
                            </div>
                        </div>
                    </div>


                </fieldset>
                <h6>Education Information</h6>
                <fieldset>
                    <h3>Secondary</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                 <label for="my_class_id">Exam: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[0]->exam }}"  type="text" name="s_exam" placeholder="Exam" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Dept Name: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[0]->dept }}"  type="text" name="s_dept" placeholder="Dept Name" class="form-control">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_parent_id">Institute Name: </label>
                                <input required value="{{ $student_edu[0]->institute }}"  type="text" name="s_institute" placeholder="Institute Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year_admitted">Roll No: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[0]->roll_no }}"  type="text" name="s_roll_no" placeholder="Roll No" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my_class_id">Registration: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[0]->registration }}"  type="text" name="s_registration" placeholder="Registration" class="form-control">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id">Session: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[0]->session }}"  type="text" name="s_session" placeholder="Session" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my_parent_id">Result: </label>
                                <input required value="{{ $student_edu[0]->result }}"  type="text" name="s_result" placeholder="Result" class="form-control">

                            </div>
                        </div>


                    </div>

                    <h3>Higher</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_class_id">Exam: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[1]->exam }}"  type="text" name="h_exam" placeholder="Exam" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Dept Name: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[1]->dept }}"  type="text" name="h_dept" placeholder="Dept Name" class="form-control">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_parent_id">Institute Name: </label>
                                <input required value="{{ $student_edu[1]->institute }}"  type="text" name="h_institute" placeholder="Institute Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year_admitted">Roll No: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[1]->roll_no }}"  type="text" name="h_roll_no" placeholder="Roll No" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my_class_id">Registration: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[1]->registration }}"  type="text" name="h_registration" placeholder="Registration" class="form-control">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id">Session: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[1]->session  }}"  type="text" name="h_session" placeholder="Session" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my_parent_id">Result: </label>
                                <input required value="{{ $student_edu[1]->result }}"  type="text" name="h_result" placeholder="Result" class="form-control">

                            </div>
                        </div>


                    </div>

                    <h3>Graduate</h3>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_class_id">Exam: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[2]->exam }}"  type="text" name="g_exam" placeholder="Exam" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Dept Name: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[2]->dept }}"  type="text" name="g_dept" placeholder="Dept Name" class="form-control">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_parent_id">Institute Name: </label>
                                <input required value="{{ $student_edu[2]->institute }}"  type="text" name="g_institute" placeholder="Institute Name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year_admitted">Roll No: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[2]->roll_no }}"  type="text" name="g_roll_no" placeholder="Roll No" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my_class_id">Registration: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[2]->registration }}"  type="text" name="g_registration" placeholder="Registration" class="form-control">

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="section_id">Session: <span class="text-danger">*</span></label>
                                <input required value="{{ $student_edu[2]->session }}"  type="text" name="g_session" placeholder="Session" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="my_parent_id">Result: </label>
                                <input required value="{{ $student_edu[2]->result  }}"  type="text" name="g_result" placeholder="Result" class="form-control">

                            </div>
                        </div>


                    </div>


                </fieldset>
                <h6>Detail Information</h6>
                <fieldset>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hall Name: <span class="text-danger">*</span></label>
                                <input value="{{ old('hall_name') }}"  type="text" name="hall_name" placeholder="Hall name" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="section_id">Room no: <span class="text-danger">*</span></label>
                                <input value="{{ old('room_no') }}"  type="text" name="room_no" placeholder="Room No" class="form-control">

                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="my_parent_id">Supervisor: </label>
                                <input value="{{ old('supervisor') }}"  type="text" name="supervisor" placeholder="Supervisor" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="year_admitted">Residential : <span class="text-danger">*</span></label>
                                <br>
                                <input type="radio" id="html" name="residential" value="yes" checked>
                                <label for="html">Yes</label>&nbsp;&nbsp;
                                <input type="radio" id="css" name="residential" value="no">
                                <label for="css">No</label><br>
                            </div>
                        </div>
                    </div>

                </fieldset>
                <h6>Additional Fields</h6>
                <fieldset>
                    <div class="row">
                        @foreach($fields as $fval)
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label>{{ucfirst($fval->name)}} <span class="text-danger">*</span></label>
                                    @if($fval->type == 'dropdown')
                                        <?php $options = explode(",",$fval->options) ?>
                                        <select required name="{{str_replace(' ', '', $fval->name)}}" data-placeholder="Choose..."  class="select-search form-control">
                                            <option value=""></option>
                                            @foreach($options as $opt)
                                                <option @if(\App\Models\StudentAdditionalDetail::where(['field_name'=>$fval->name,'std_id'=>$student->id])->value('value') ==$opt ) selected @endif value="{{ucfirst($opt)}}">{{ucfirst($opt)}}</option>
                                            @endforeach

                                        </select>

                                    @else
                                        <input required name="{{str_replace(' ', '', $fval->name)}}" value="{{\App\Models\StudentAdditionalDetail::where(['field_name'=>$fval->name,'std_id'=>$student->id])->value('value')}}" type="{{$fval->type}}" placeholder="{{ucfirst($fval->name)}}" class="form-control">
                                    @endif

                                </div>
                            </div>
                        @endforeach
                    </div>
                </fieldset>


            </form>
        </div>
@endsection
