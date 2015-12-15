@extends('layouts.app')
@section('content')
	 <!-- Bootstrap Boilerplate... -->

    <div class="panel-body">
        <!-- Display Validation Errors -->
        @include('common.errors')

        <!-- New Task Form -->
        <form action="/task" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="task" class="col-sm-3 control-label">Task</label>

                <div class="col-sm-6">
                    <input type="text" name="name" id="task-name" class="form-control">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-plus"></i> Add Task
                    </button>
                </div>
            </div>
        </form>
        <!-- Task list-->
        @if(count($tasks) >0) 
        	<div class="panel panel-default">
        		<div class="panel-heading">
        			Current Task
        		</div>
        	</div>
        	<div class="panel-body">
        		<table class="table table-striped task-table">
        			<!-- Table Headings -->
                    <thead>
                        <th>Task</th>
                        <th>&nbsp;</th>
                    </thead>

                    <!-- Table Body -->
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <!-- Task Name -->
                                <td class="table-text" width="96%">
                                    <div>{{ $task->name }}</div>
                                </td>
                                <td width="2%">
                                    <!-- TODO: Edit Button -->
                                    <form action="/task/{{ $task->id }}" method="GET">
                                        {{ csrf_field() }}
                                        <button class="btn btn-info btn-xs fa fa-edit" title="Sửa"></button>
                                    </form>
                                </td>
                                <td width="2%">
                                    <!-- TODO: Delete Button -->
                                    <form action="/task/{{ $task->id }}" method="POST">
							            {{ csrf_field() }}
							            {{ method_field('DELETE') }}
							           <button class="btn btn-danger btn-xs fa fa-trash" title="Xóa"></button>
        							</form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
        		</table>
        	</div>
    </div>
    	@endif

    <!-- TODO: Current Tasks -->
@endsection