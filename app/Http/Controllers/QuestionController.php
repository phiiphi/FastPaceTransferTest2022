<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Question;
use App\Models\User;
use Auth;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        #fetch all questionsand questions numbers  data from database
        return Question::distinct()->get(['question_no', 'question']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        #fetch admins users
        $admUser    = User::where('user_type', 'Admin')->first();
        $admin      = $admUser->user_type;

        #check if user is admin
        if ($admin !== $request->user()->user_type) {
            return $response = [
                'message' => 'Unauthorised User, Contact Admin',
            ];
        }

        #validate user input
        $feilds = $request->validate([
            'course_name'   => 'required',
            'course_code'   => 'required',
            'question_no'   => 'required',
            'question'      => 'required',
            'answer'        => 'required',
          
        ]);

        #insert data inot Questions table
        return $user = Question::create([
            'course_name'   => $feilds['course_name'],
            'course_code'   => $feilds['course_code'],
            'question_no'   => $feilds['question_no'],
            'question'      => $feilds['question'],
            'answer'        => $feilds['answer'],
        ]);

        #send feedback to user if successful
        return response($response, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        #fetch admins users
        $admUser = User::where('user_type', 'Admin')->first();
        $admin = $admUser->user_type;

        #check if user is an admin
        if ($admin !== $request->user()->user_type) {
            return $response = [
                'message' => 'Unauthorised User, Contact Admin',
            ];
        }
        return Question::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        #fetch data
        $admUser = User::where('user_type', 'Admin')->first();
        $admin   = $admUser->user_type;

        #check if user is an admin
        if ($admin !== $request->user()->user_type) {
            return $response = [
                'message' => 'Unauthorised User, Contact Admin',
            ];
        }
        $question = Question::find($id);
        $question->update($request->all());
        return $question;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {

        #fetch data
        $admUser = User::where('user_type', 'Admin')->first();
        $admin   = $admUser->user_type;

        #check if user is an admin
        if ($admin !== $request->user()->user_type) {
            return $response = [
                'message' => 'Unauthorised User, Contact Admin',
            ];
        }
        return Question::destroy($id);
    }

    public function search(Request $request, $question_no)
    {
        #fetch data
        $admUser = User::where('user_type', 'Admin')->first();
        $admin   = $admUser->user_type;

        #check if user is an admin
        if ($admin !== $request->user()->user_type) {
            return $response = [
                'message' => 'Unauthorised User, Contact Admin',
            ];
        }

        #fetch data based on question number
        $questions = Question::where('question_no', '=', $question_no)
            ->pluck(
            'students_name',
            'students_answer'
        );

        $response = [
            'Students Name and Answers to Question' => $question_no,
            'Answer:Student Name'                   => $questions,
        ];

        return response($response, 201);
    }

    public function answer(Request $request, $id)
    {
        #validation
        $feilds = $request->validate([
            'students_answer'   => 'required',
            'user_id'           => 'nullable',
            'students_name'     => 'nullable',
        ]);

        #student answer based on usedtion id
        $question = Question::find($id);
        $question->update([
            'course_name'       => $question->course_name,
            'course_code'       => $question->course_code,
            'question_no'       => $question->question_no,
            'question'          => $question->question,
            'answer'            => $question->answer,
            'students_answer'   => $feilds['students_answer'],
            'user_id'           => $request->user()->id,
            'students_name'     => $request->user()->name,
        ]);
        return $question;
    }
}
