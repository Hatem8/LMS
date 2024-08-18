<?php

use App\Http\Controllers\API\BlogCommentController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\CourseController;
use App\Http\Controllers\API\FaqController;
use App\Http\Controllers\API\LessonController;
use App\Http\Controllers\API\QuizController;
use App\Http\Controllers\API\ReviewController;
use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\BlogController;
use App\Http\Controllers\API\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('blogs',BlogController::class);
Route::apiResource('blogcomments',BlogCommentController::class);
Route::apiResource('categories',CategoryController::class);
Route::apiResource('courses',CourseController::class);
Route::apiResource('faqs',FaqController::class);
Route::apiResource('lessons',LessonController::class);
Route::apiResource('quizzes',QuizController::class);
Route::apiResource('reviews',ReviewController::class);
Route::apiResource('users',UserController::class);

Route::post('register',[AuthController::class,'register']);
Route::post('login', [AuthController::class,'login']);
Route::post('refresh', [AuthController::class,'refresh']);
Route::post('logout', [AuthController::class,'logout']);


