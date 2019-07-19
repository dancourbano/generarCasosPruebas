<?php namespace App\Http\Controllers;

use App\Models\Testcase as Testcase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Hash;
class TestcaseController extends Controller {

    public function index()
      { 
        $data['testcases'] = Testcase::all();
        return view('testcase/index',$data);
      }
    public function add()
      { 
        return view('testcase/add');
      }
    public function addPost()
      {
        $testcase_data = array(
             'testcase_id' => Input::get('testcase_id'), 
             'name' => Input::get('name'), 
             'description' => Input::get('description'), 
             'status' => Input::get('status'), 
             'precondition' => Input::get('precondition'), 
             'project_id' => Input::get('project_id'), 
            );
                        $testcase_id = Testcase::insert($testcase_data);
        return redirect('testcase')->with('message', 'Testcase successfully added');
    }
    public function delete($id)
    {   
        $testcase=Testcase::find($id);
        $testcase->delete();
        return redirect('testcase')->with('message', 'Testcase deleted successfully.');
    }
    public function edit($id)
    {   
        $data['testcase']=Testcase::find($id);
        return view('testcase/edit',$data);
    }
    public function editPost()
    {   
        $id =Input::get('testcase_id');
        $testcase=Testcase::find($id);
                                                       
        $testcase_data = array(
          'testcase_id' => Input::get('testcase_id'), 
          'name' => Input::get('name'), 
          'description' => Input::get('description'), 
          'status' => Input::get('status'), 
          'precondition' => Input::get('precondition'), 
          'project_id' => Input::get('project_id'), 
        );
        $testcase_id = Testcase::where('id', '=', $id)->update($testcase_data);
        return redirect('testcase')->with('message', 'Testcase Updated successfully');
    }

    
    public function changeStatus($id)
    {   
        $testcase=Testcase::find($id);
        $testcase->status=!$testcase->status;
        $testcase->save();
        return redirect('testcase')->with('message', 'Change testcase status successfully');
    }
     public function view($id)
    {   
        $data['testcase']=Testcase::find($id);
        return view('testcase/view',$data);
        
    }
}