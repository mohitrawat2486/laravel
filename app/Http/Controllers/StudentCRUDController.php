<?php
namespace App\Http\Controllers;
use App\Student;
use Illuminate\Http\Request;
use DB;

class StudentCRUDController extends Controller
{
	
	public function index(){
		$students = Student::all();
		return view('studentCRUD.index',compact('students'))->with('i');
	}
		
	public function create(){
		return view('studentCRUD.registration');
	}
	
	public function show($id)
    {		
		$Student = Student::where('student_id', '=', $id)->first();
		return view('studentCRUD.show',compact('Student'));
    }
	
	public function edit($id)
    {
        $student = Student::where('student_id', '=', $id)->first();
        return view('studentCRUD.edit',compact('student'));
    }
	
	public function update(Request $request, $id)
    {
        $this->validate($request, array(
							'Name'=>'required',
							'Email'=>'required|email', 
							'Age'=>'required',
							'ContactNo'=>'required|digits:10',
							'Image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
						));

       Student::find($id)->update($request->all())	;
	   
       return redirect()->route('studentCRUD.index')
                       ->with('success','Student updated successfully');
    }
	
	
	public function destroy($id)
    {
        Student::find($id)->delete();
        return redirect()->route('studentCRUD.index')
                        ->with('success','Student deleted successfully');
    }
	
	public function store(Request $request){
			
		//Validate the form
		
		$this->validate($request, array(
							'Name'=>'required',
							'Email'=>'required|email|unique:Student', //|unique:users
							'Age'=>'required',
							'ContactNo'=>'required|digits:10',
							'Image'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024'
						));
		
				
		if ($request->hasFile('Image')) {
			
			if(!is_dir(base_path().'/public/images/')){
				//Directory does not exist, so lets create it.
				mkdir(base_path().'/public/images/', 0777);
			}
			
			if($request->file('Image')->isValid()) {
				try {
					$destinationPath = base_path().'/public/images/';// upload path
					$extension = $request->file('Image')->getClientOriginalExtension(); // getting image extension
					$fileName = rand(11111,99999).'.'.$extension; // renameing image

					$request->file('Image')->move($destinationPath, $fileName); // uploading file to given path	
				} 
				catch (Illuminate\Filesystem\FileNotFoundException $e) 
				{
					print_r($e->get_message());
				}
			} 
		}
		
		
		
		//Student::create($request->all());
		
		DB::table('student')->insert(
							array(
								'Name'=>$request->Input('Name'),
								'Email'=>$request->Input('Email'), //|unique:users
								'Age'=>$request->Input('Age'),
								'ContactNo'=>$request->Input('ContactNo'),
								'Address'=>$request->Input('Address'),
								'Image'=>$fileName
							)
						);
		
		return redirect()->route('studentCRUD.index')
                        ->with('success','Student Registered successfully');
	}
	
}