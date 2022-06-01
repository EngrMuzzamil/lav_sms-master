@extends('layouts.master')
@section('page_title', 'Manage Custom Fields')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title font-weight-semibold">Update Custom Fields </h6>
            {!! Qs::getPanelOptions() !!}


        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12">
                    <form class="ajax-store" method="post" action="{{ url('/super_admin/updatefield/'.$fields->id) }}">
                        @csrf
                        <div class="form-group row">

                            <div class="col-lg-4">
                                <label class="col-form-label font-weight-semibold">Name <span class="text-danger">*</span></label>
                                <input name="name" value="{{ $fields->name }}" required type="text" class="form-control" placeholder="Name">
                            </div>
                            <div class="col-lg-4" id="dpdown">
                                <label class="col-form-label font-weight-semibold">Type <span class="text-danger">*</span></label>
                                <select required class="select form-control" id="type" onchange="getValue()" name="type" data-fouc data-placeholder="Choose..">
                                    <option value=""></option>
                                    <option @if( $fields->type == 'text') selected @endif value="text">Text</option>
                                    <option @if( $fields->type == 'date') selected @endif value="date">Date</option>
                                    <option @if( $fields->type == 'dropdown') selected @endif value="dropdown">Dropdown</option>
                                </select>
                                @if( $fields->type == 'dropdown')
                                    <span id='dparea'>
                                        Type options with seperated commas<br>
                                        <input class='form-control' required id='options' name='options' placeholder='option1,option2,option3' value="{{$fields->options}}"></input>
                                    </span>
                                @endif
                            </div>
                            <div class="col-lg-4">
                                <br><br>
                                <button id="ajax-btn" type="submit" class="btn btn-primary ref">Submit form <i class="icon-paperplane ml-2"></i></button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>

    </div>

    {{--Settings Edit Ends--}}
    <script>
        $(document).ready(function(){
            $(".ref").click(function(){
                setTimeout(function (){
                    location.reload()
                },500)

            });
        })
        function getValue(){
            if($("#type").val() == 'dropdown'){

                $("#dpdown").append("<span id='dparea'>Type options with seperated commas<br><input class='form-control' required id='options' name='options' placeholder='option1,option2,option3'></input></span>")
            }else{
                $("#dparea").remove()
            }

        }
    </script>
@endsection
