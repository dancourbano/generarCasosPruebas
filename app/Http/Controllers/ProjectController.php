<?php namespace App\Http\Controllers;

use App\Models\Project as Project;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;
class ProjectController extends Controller {

    public function index()
      { 
        $data['projects'] = Project::all();
        return view('project/index',$data);
      }
    public function add()
      { 
        return view('project/add');
      }
    public function addPost()
      {
        $project_data = array(
             'project_id' => Input::get('project_id'), 
             'name' => Input::get('name'), 
             'type' => Input::get('type'), 
            );
            $project_id = Project::insert($project_data);
        return redirect('project')->with('message', 'Project successfully added');
    }
    public function delete($id)
    {   
        $project=Project::find($id);
        $project->delete();
        return redirect('project')->with('message', 'Project deleted successfully.');
    }
    public function edit($id)
    {   
        $data['project']=Project::find($id);
        return view('project/edit',$data);
    }
    public function editPost()
    {   
        $id =Input::get('project_id');
        $project=Project::find($id);
                               
        $project_data = array(
          'project_id' => Input::get('project_id'), 
          'name' => Input::get('name'), 
          'type' => Input::get('type'), 
        );
        $project_id = Project::where('id', '=', $id)->update($project_data);
        return redirect('project')->with('message', 'Project Updated successfully');
    }

    
    public function changeStatus($id)
    {   
        $project=Project::find($id);
        $project->status=!$project->status;
        $project->save();
        return redirect('project')->with('message', 'Change project status successfully');
    }
     public function view($id)
    {   
        $data['project']=Project::find($id);
        return view('project/view',$data);
        
    }
}