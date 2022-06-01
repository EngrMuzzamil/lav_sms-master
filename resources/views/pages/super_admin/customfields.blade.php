@extends('layouts.master')
@section('page_title', 'Manage Custom Fields')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">Create Custom Fields </h6>
            {!! Qs::getPanelOptions() !!}

        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="ajax-store" method="post" action="{{ url('/super_admin/storefield') }}">
                        @csrf
                        <div class="form-group row">

                            <div class="col-lg-4">
                                <label class="col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                                <input name="name" value="{{ old('name') }}" required type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-lg-4" id="dpdown">
                                <label class="col-form-label font-weight-semibold">Type <span class="text-danger">*</span></label>
                                <select required class="select form-control" id="type" onchange="getValue()" name="type" data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option value="text">Text</option>
                                    <option value="date">Date</option>
                                    <option value="dropdown">Dropdown</option>
                                </select>

                            </div>
                            <div class="col-lg-4">
                                <br> <br>
                                <button id="ajax-btn" type="submit" class="btn btn-primary">Submit form <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>



                        <div class="text-right">

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>S/N</th>
                <th>Field Name</th>
                <th>Field Type</th>
                <th>Options</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fields as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->name }}</td>
                    <td>{{ $d->type }}</td>
                    <td>{{ $d->options }}</td>
                    <td>
                        <div class="list-icons">
                            <div class="dropdown">
                                <a href="#" class="list-icons-item" data-toggle="dropdown">
                                    <i class="icon-menu9"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left">
                                     <a href="{{ url('/super_admin/editcustomefield/'.$d->id) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                     <a id="{{ $d->id }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                     <form method="post" id="item-delete-{{ $d->id }}" action="{{ url('/super_admin/destroycustomfield/'.$d->id) }}" class="hidden">@csrf @method('delete')</form>
                                 </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    {{--Settings Edit Ends--}}
<script>
    function getValue(){
        if($("#type").val() == 'dropdown'){

            $("#dpdown").append("<span id='dparea'>Type options with seperated commas<br><input class='form-control' required id='options' name='options' placeholder='option1,option2,option3'></input></span>")
       }else{
            $("#dparea").remove()
        }

    }
</script>
@endsection
