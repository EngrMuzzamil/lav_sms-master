@extends('layouts.master')
@section('page_title', 'Manage Promotions')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Promotions</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#new-class" class="nav-link active" data-toggle="tab"><i class="icon-plus2"></i> Manage Promotions</a></li>
                <li class="nav-item"><a href="#all-classes" class="nav-link" data-toggle="tab">View Promotions</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="new-class">

                    <div class="row">
                        <div class="col-md-12">
                            <form class="ajax-store" method="post" action="{{ url('promotion/addPromotion') }}">
                                @csrf
                                <div class="text-center"><h2>Current Session</h2></div>
                                <div class="form-group row">
                                    <div class="col-lg-6">
                                        <label class="col-form-label font-weight-semibold">Select Session <span class="text-danger">*</span></label>
                                        <select required data-placeholder="Choose..."  name="session_id" id="session_id" class="select-search form-control">
                                            <option value=""></option>
                                            @foreach($sessions as $nal)
                                                <option {{ (old('session_id') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ date("d/M/Y", strtotime($nal->session_start)).' --- '.date("d/M/Y", strtotime($nal->session_end)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-form-label font-weight-semibold">Semester - Year:<span class="text-danger">*</span></label>
                                        <select onchange="getCurrentStudents()" required data-placeholder="Choose..."  name="semester_id" id="semester_id" class="select-search form-control">
                                            <option value=""></option>
                                            @foreach($semester as $nal)
                                                <option {{ (old('semester_year') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->year.' - '.$nal->semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-12">
                                        <label class="col-form-label font-weight-semibold"><span id="loader">Students</span><span class="text-danger">*</span></label>
                                        <select multiple required data-placeholder="Choose..."  name="student_ids[]" id="student_ids" class="select-search form-control">
                                        </select>
                                    </div>
                                </div>
                                <div class="text-center"><h2>Promote to :</h2></div>
                                <div class="form-group row">

                                    <div class="col-lg-6">
                                        <label class="col-form-label font-weight-semibold">Select Session <span class="text-danger">*</span></label>
                                        <select required data-placeholder="Choose..."  name="p_session_id" id="p_session_id" class="select-search form-control">
                                            <option value=""></option>
                                            @foreach($sessions as $nal)
                                                <option {{ (old('session_id') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ date("d/M/Y", strtotime($nal->session_start)).' --- '.date("d/M/Y", strtotime($nal->session_end)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="col-lg-6">
                                        <label class="col-form-label font-weight-semibold">Semester - Year:<span class="text-danger">*</span></label>
                                        <select required data-placeholder="Choose..."  name="p_semester_id" id="p_semester_id" class="select-search form-control">
                                            <option value=""></option>
                                            @foreach($semester as $nal)
                                                <option {{ (old('semester_year') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->year.' - '.$nal->semester }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                </div>

                                <div class="text-right">
                                    <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                <div class="tab-pane fade" id="all-classes">
                    <div class="form-group row">

                        <div class="col-lg-6">
                            <label class="col-form-label font-weight-semibold">Select Session <span class="text-danger">*</span></label>
                            <select required data-placeholder="Choose..."  name="s_session_id" id="s_session_id" class="select-search form-control">
                                <option value=""></option>
                                @foreach($sessions as $nal)
                                    <option {{ (old('session_id') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ date("d/M/Y", strtotime($nal->session_start)).' --- '.date("d/M/Y", strtotime($nal->session_end)) }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-lg-6">
                            <label class="col-form-label font-weight-semibold">Semester - Year:<span class="text-danger">*</span></label>
                            <select onchange="getPromotedStudents()" required data-placeholder="Choose..."  name="s_semester_id" id="s_semester_id" class="select-search form-control">
                                <option value=""></option>
                                @foreach($semester as $nal)
                                    <option {{ (old('semester_year') == $nal->id ? 'selected' : '') }} value="{{ $nal->id }}">{{ $nal->year.' - '.$nal->semester }}</option>
                                @endforeach
                            </select>
                        </div>


                    </div>

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Roll No</th>

                        </tr>
                        </thead>
                        <tbody id="promoted">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{--Class List Ends--}}

@endsection
