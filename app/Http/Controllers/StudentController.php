<?php
namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\City;
use Illuminate\Http\Request;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::orderBy('created_at', 'DESC')
                        ->paginate(10);
        return view('students.index', ['students'=>$students]);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cities = City::all();
        return view('students.create', ['cities'=>$cities ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $newStudent = Student::create([
        //     'name'=> $request->name,
        //     'email' => $request->email,
        //     'phone' => $request->phone,
        //     'adress' => $request->adress,
        //     'city_id' => $request->city_id,
        //     'birthday' => $request->birthday,
        // ]);

        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'adress' => 'required',
            'city_id' => 'required|numeric',
            'birthday' => 'required|date',
            'email'=> 'required|email|unique:users',
            
        ]);

       $newStudent = new Student;
       $newStudent->fill($request->all());
       $newStudent->save();

        return redirect(route('students.index'))->withSuccess('Nouvel étudiant bien ajouté'); // amene a la page avec tous les articles
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
           //select * from blog_posts where id = $student" 
        return view('students.show', ['student' => $student]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        $cities = City::all();
        return view('students.edit', ['student' => $student, 'cities'=>$cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        // update where student->id => select where student->id
         $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'adress' => 'required',
            'city_id' => 'required|numeric',
            'birthday' => 'required|date',
            'email'=> 'required|email',
            
        ]);
        
        $student->update([
            'name'=> $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'adress' => $request->adress,
            'city_id' => $request->city_id,
            'birthday' => $request->birthday,
        ]);


        return redirect(route('students.show', $student->id))->with('success', 'Modifications effectuées');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();

        return redirect(route('students.index'))->withSuccess('Suppression réussite');
    }



}
