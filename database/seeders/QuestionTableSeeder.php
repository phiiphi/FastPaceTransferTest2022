<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;

class QuestionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $questions = [
            [
                'id'                    => 1,
                'course_name'           => 'CSharp Programming',
                'course_code'           => 'CSC 202',
                'question_no'           => '1',
                'question'              => 'Which of the following variable types can be assigned a value directly in C#?A - Value types B - Reference types C - Pointer types D - All of the above.',
                'answer'                => 'A',
                'students_answer'       => 'C',
                'students_name'       => 'John Doe',
                'user_id'               => 2,
                'created_at'            => '2022-01-22 14:00:26',
                'updated_at'            => '2022-01-22 14:00:26',
            ],
              [
                'id'                    => 2,
                'course_name'           => 'CSharp Programming',
                'course_code'           => 'CSC 202',
                'question_no'           => '1',
                'question'              => 'Which of the following variable types can be assigned a value directly in C#?A - Value types B - Reference types C - Pointer types D - All of the above.',
                'answer'                => 'A',
                'students_answer'       => 'B',
                'students_name'         => 'Ciri King',
                'user_id'               => 4,
                'created_at'            => '2022-01-22 14:00:26',
                'updated_at'            => '2022-01-22 14:00:26',
            ],
              [
                'id'                    => 3,
                'course_name'           => 'CSharp Programming',
                'course_code'           => 'CSC 202',
                'question_no'           => '1',
                'question'              => 'Which of the following variable types can be assigned a value directly in C#?A - Value types B - Reference types C - Pointer types D - All of the above.',
                'answer'                => 'A',
                'students_answer'       => 'A',
                'students_name'         => 'Mary Doe',
                'user_id'               => 3,
                'created_at'            => '2022-01-22 14:00:26',
                'updated_at'            => '2022-01-22 14:00:26',
            ],
              [
                'id'                    => 4,
                'course_name'           => 'CSharp Programming',
                'course_code'           => 'CSC 202',
                'question_no'           => '1',
                'question'              => 'Which of the following variable types can be assigned a value directly in C#?A - Value types B - Reference types C - Pointer types D - All of the above.',
                'answer'                => 'A',
                'students_answer'       => 'C',
                'students_name'         => 'Jane Doe',
                'user_id'               => 2,
                'created_at'            => '2022-01-22 14:00:26',
                'updated_at'            => '2022-01-22 14:00:26',
            ],
        ];

        Question::insert($questions);
    }
}
