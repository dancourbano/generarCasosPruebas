<!DOCTYPE html>
<html lang="en">
<head>
  <title>Laravel Crud By Crud Generator</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="http://crudegenerator.in">Laravel Crud By Crud Generator</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active" ><a href="{{Request::root()}}/project">Manage Project</a></li>
        <li><a href="{{Request::root()}}/project/add-project">Add Project</a></li>
      </ul>
  </div>
</nav>

<div class="container">

  <h2>Manage Project</h2>

@if(Session::has('message'))
  <div class="alert alert-success">
                    <strong><span class="glyphicon glyphicon-ok"></span>{{  Session::get('message') }}</strong>
                </div>
@endif

@if(count($projects)>0)
  <table class="table table-hover">
    <thead>
      <tr>
        <th>SL No</th>
        <th>project_id</th>
       <th>Actions</th>
      </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
@foreach($projects as $project)
      <tr>
        <td>{{$i}} </td>
        <td> <a href="{{Request::root()}}/project/view-project/{{$project->id}}" > {{$project->project_id }}</a> </td>

        <td>
        <a href="{{Request::root()}}/project/change-status-project/{{$project->id }}" > @if($project->status==0) {{"Activate"}}  @else {{"Dectivate"}} @endif </a>
        <a href="{{Request::root()}}/project/edit-project/{{$project->id}}" >Edit</a>
        <a href="{{Request::root()}}/project/delete-project/{{$project->id}}" onclick="return confirm('are you sure to delete')">Delete</a>
        </td>

      </tr>
    <?php $i++;  ?>
    @endforeach
    </tbody>
  </table>
   @else
  <div class="alert alert-info" role="alert">
                    <strong>No Projects Found!</strong>
                </div>
 @endif
</div>

</body>
</html>