<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationController;
use App\Http\Controllers\EmailVerificationController;

/******************************************************
 * Public Routers
 ******************************************************/
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/questions', [QuestionController::class, 'index']);

/******************************************************
 * Protected Routers
 ******************************************************/
Route::group(['middleware' => ['auth:sanctum','verified']], function () {
    #api route for admin to create a question
    Route::post('/questions', [QuestionController::class, 'store']);
    #api route for admin to update question
    Route::put('/questions/{id}', [QuestionController::class, 'update']);
    #api route to forr admin to delete questions based on questions id
    Route::delete('/questions/{id}', [QuestionController::class, 'destroy']);
    #api route for loggine out users
    Route::post('/logout', [AuthController::class, 'logout']);
    #api route to show students answers based on questions number
    Route::get('/students/answer/{question_no}', [QuestionController::class,'search',]);
    #api route for students to answer questions
    Route::put('/answer/{id}', [QuestionController::class, 'answer']);
    #api route to show single question
    Route::get('/questions/{id}', [QuestionController::class, 'show']);
    #api route to register admins
    Route::post('/admin/register', [UsersController::class, 'register']);
    #api route to see all admins
    Route::get('/admin', [UsersController::class, 'index']);
    #api route to see all admins
    Route::delete('/admin/delete/{id}', [UsersController::class, 'destroy']);
});    


/******************************************************
 * Protected Routers 
 ******************************************************/
Route::group(['middleware' => ['auth:sanctum']], function () {
    #api route to send email verification of users
    Route::post('email/verification', [EmailVerificationController::class,'sendVerificationEmail',]);
    #api route to verification of users users email
    Route::get('verify-email/{id}/{hash}', [EmailVerificationController::class,'verify',])->name('verification.verify');
});
