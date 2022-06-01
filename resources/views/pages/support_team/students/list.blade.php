@extends('layouts.master')
@section('page_title', 'Student List')
@section('content')

    <div class="card">
        <div class="card-header header-elements-inline">
            <h6 class="card-title">Students List</h6>
            {!! Qs::getPanelOptions() !!}
        </div>

        <div class="card-body">

            <div class="tab-content">
                <div class="tab-pane fade show active" id="all-students">
                    <table class="table datatable-button-html5-columns">
                        <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Roll no</th>
                            <th>Course</th>
                            <th>Faculty</th>
                            <th>Department</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($students as $s)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $s->student_name }}</td>
                                <td>{{ $s->roll_no }}</td>
                                <td>{{ \App\Helpers\Qs::getValue('my_courses',$s->course_id)  }}</td>
                                <td>{{ \App\Helpers\Qs::getValue('faculties',$s->faculty_id ) }}</td>
                                <td>{{ \App\Helpers\Qs::getValue('departments',$s->department_id)  }}</td>
                                <td class="text-center">
                                    <div class="list-icons">
                                        <div class="dropdown">
                                            <a href="#" class="list-icons-item" data-toggle="dropdown">
                                                <i class="icon-menu9"></i>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-left">

                                                <a href="{{ route('students.show', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-eye"></i> View Profile</a>
                                                <a href="{{ route('students.edit', Qs::hash($s->id)) }}" class="dropdown-item"><i class="icon-pencil"></i> Edit</a>
                                                <a id="{{ Qs::hash($s->id) }}" onclick="confirmDelete(this.id)" href="#" class="dropdown-item"><i class="icon-trash"></i> Delete</a>
                                                <form method="post" id="item-delete-{{ Qs::hash($s->id) }}" action="{{ route('students.destroy', Qs::hash($s->id)) }}" class="hidden">@csrf @method('delete')</form>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>

    {{--Student List Ends--}}

@endsection
