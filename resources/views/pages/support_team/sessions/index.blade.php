@extends('layouts.master')
@section('page_title', 'Manage Sessions')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Manage Sessions</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">
            <ul class="nav nav-tabs nav-tabs-highlight">
                <li class="nav-item"><a href="#all-classes" class="nav-link active" data-toggle="tab">Manage Sessions</a></li>
                <li class="nav-item"><a href="#new-class" class="nav-link" data-toggle="tab"><i class="icon-plus2"></i> Create New Session</a></li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-classes">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Session Start</th>
                            <th>Session End</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($session as $c)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $c->session_start }}</td>
                                <td>{{ $c->session_end }}</td>

                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-left">
                                                @if(Qs::userIsTeamSA())
                                                    {{--Edit--}}
                                                    <a href="{{ route('sessions.edit', $c->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                @endif
                                                @if(Qs::userIsSuperAdmin())
                                                    {{--Delete--}}
                                                    <a id="{{ $c->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                    <form method="post" id="item-delete-{{ $c->id }}" action="{{ route('sessions.destroy', $c->id) }}" class="hidden">@csrf @method('delete')</form>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="tab-pane fade" id="new-class">

                    <div class="row">
                        <div class="col-md-6">
                            <form class="ajax-store" method="post" action="{{ route('sessions.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label font-weight-semibold">Session Start <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input name="session_start" value="{{ old('session_start') }}" required type="date" class="form-control" placeholder="">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="my_class_id" class="col-lg-3 col-form-label font-weight-semibold">Session End <span class="text-danger">*</span></label>
                                    <div class="col-lg-6">
                                        <input name="session_end" value="{{ old('session_end') }}" required type="date" class="form-control" placeholder="">
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
        </div>
    </div>

    {{--Class List Ends--}}

@endsection
