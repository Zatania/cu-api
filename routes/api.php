<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    ProgrammingLanguageController,
    ChapterController,
    LessonController,
    ChapterAssessmentController,
    ExamController,
    BadgeController,
    UserBadgeController
};

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
//user
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'user'
], function ($route) {
    /* $route->get('/', [UserController::class, 'user']);
    $route->put('/update', [UserController::class, 'update']);
    $route->put('/update-password', [UserController::class, 'updatePassword']);
    $route->delete('/delete', [UserController::class, 'delete']); */
    $route->post('/add-badge', [UserBadgeController::class, 'addUserBadge']);
});

Route::group([
], function ($route) {
    $route->post('/login', [AuthController::class, 'login']);
    $route->post('/register', [AuthController::class, 'register']);
    $route->post('/verify-email', [AuthController::class, 'verifyEmail']);
    $route->post('/send-otp', [AuthController::class, 'sendOtp']);
});


Route::group([
    'middleware' => 'auth:sanctum',
], function ($route) {
    $route->get('/logout', [AuthController::class, 'logout']);
});

//programminglanguage
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'programming-language'
], function ($route) {
    $route->get('/', [ProgrammingLanguageController::class, 'index']);
    $route->post('/create', [ProgrammingLanguageController::class, 'create']);
    $route->get('/view/{referenceNumber}', [ProgrammingLanguageController::class, 'show']);
    $route->put('/update/{referenceNumber}', [ProgrammingLanguageController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [ProgrammingLanguageController::class, 'delete']);
});

//chapter
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'chapter'
], function ($route) {
    $route->get('/', [ChapterController::class, 'index']);
    $route->post('/create', [ChapterController::class, 'create']);
    $route->get('/view/{referenceNumber}', [ChapterController::class, 'show']);
    $route->put('/update/{referenceNumber}', [ChapterController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [ChapterController::class, 'delete']);
});

//lesson
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'lesson'
], function ($route) {
    $route->get('/', [LessonController::class, 'index']);
    $route->post('/create', [LessonController::class, 'create']);
    $route->get('/view/{referenceNumber}', [LessonController::class, 'show']);
    $route->put('/update/{referenceNumber}', [LessonController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [LessonController::class, 'delete']);
    $route->post('/upload-video', [LessonController::class, 'uploadVideo']);
});

//chapter assessment
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'chapter_assessment'
], function ($route) {
    $route->get('/', [ChapterAssessmentController::class, 'index']);
    $route->post('/create', [ChapterAssessmentController::class, 'create']);
    $route->get('/view/{referenceNumber}', [ChapterAssessmentController::class, 'show']);
    $route->get('/view/question/{referenceNumber}', [ChapterAssessmentController::class, 'viewQuestion']);
    $route->put('/update/{referenceNumber}', [ChapterAssessmentController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [ChapterAssessmentController::class, 'delete']);
});

//exam
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'exam'
], function ($route) {
    $route->get('/', [ExamController::class, 'index']);
    $route->post('/create', [ExamController::class, 'create']);
    $route->get('/view/{referenceNumber}', [ExamController::class, 'show']);
    $route->get('/view/question/{referenceNumber}', [ExamController::class, 'viewQuestion']);
    $route->put('/update/{referenceNumber}', [ExamController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [ExamController::class, 'delete']);
});

//badge
Route::group([
    'middleware' => 'auth:sanctum',
    'prefix' => 'badge'
], function ($route) {
    $route->get('/', [BadgeController::class, 'index']);
    $route->post('/create', [BadgeController::class, 'create']);
    $route->get('/view/{referenceNumber}', [BadgeController::class, 'show']);
    $route->put('/update/{referenceNumber}', [BadgeController::class, 'update']);
    $route->delete('/delete/{referenceNumber}', [BadgeController::class, 'delete']);
    $route->post('/upload-image', [BadgeController::class, 'uploadBadgeImage']);
});