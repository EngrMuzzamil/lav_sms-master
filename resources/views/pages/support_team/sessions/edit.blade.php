@extends('layouts.master')
@section('page_title', 'Edit Session')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Edit Session</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <form class="ajax-update" method="post" action="{{ route('sessions.update', $s->id) }}">
                        @csrf @method('PUT')
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label font-weight-semibold">Session Start <span class="text-danger">*</span></label>
                            <div class="col-lg-6">
                                <input name="name" value="{{ $s->session_start }}" required type="date" class="form-control" placeholder="Name of Class">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Session End </label>
                            <div class="col-lg-6">
                                <input class="form-control" id="my_class_id" type="date" value="{{ $s->session_end }}">
                            </div>
                        </div>


                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{--Section Edit Ends--}}

@endsection
