<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #044faa;
  color: white;
}
</style>
</head>
<body>

<h1>A Task Register</h1>
<div class="container">
    <div class="col-md-12">
    <form action="create" method="post">
        @csrf
        <p>Task Name</p>
        <input type="text" name="task_name">
        <p>Task Details</p>
        <input type="text" name="details">
        <input type = 'submit' value = "Add Task"/>
    </form>
    </div>
</div>



<h1>A Task Table</h1>
<table id="customers">
    <thead>
        <tr>
            <th>S/N</th>
            <th>Task Name</th>
            <th>Details</th>
            <th>Actions</th>
          </tr>
    </thead>

  <tbody>
    @foreach($tasks as $task)
    <tr>
        <td> {{ $loop-> index + 1 }}</td>
        <td>{{$task->task_name}}</td>
        <td>{{$task->details}}</td>
        <td>
                {{-- <a href="javascript::void()" class="btn btn-xs btn-primary" data-toggle="modal" data-target="#modal-edit-task-{{$task->id}}">Edit</a> --}}
            <a href="javascript::void()" class="btn btn-danger btn-xs" onclick="if(confirm('Are you sure you want to delete this task ?')){
                              getElementById('delete-headTeacher-{{$task->id}}').submit()}">Delete</a>
            <form action="/task/{{$task->id}}" method="post" style="display: inline-block;" id="delete-task-{{$task->id}}">
              @csrf
              @method('DELETE')
            </form>

          </td>

    </tr>

    <!--edit modal-->
{{-- <div class="modal" id="modal-edit-task-{{ $task->id }}">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Edit Task</h4>
        </div>
        <form action="/task/{{ $task->id }}" method="post" role="form">
          @csrf
          @method('PATCH')
           <div class="modal-body">
              @include('edittask')
           </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
           <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
       </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div> --}}
  <!-- /.modal -->
  @endforeach
  </tbody>
  <tfoot>
    <tr>
    <th scope="col">S/N</th>
    <th scope="col">Task Name</th>
    <th scope="col">Task Details </th>

      <th scope="col">Actions</th>
    </tr>
  </tfoot>
</table>

</body>
</html>


