<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
if(Auth::check()){
    Route::get('/', 'QuestionsController@index');
}
else{
    Route::get('/', function (){
        return view('welcome');
    });
}

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('email/verify/{token}',['as'=>'email.verify','uses'=>'EmailController@Verify']);

Route::resource('questions','QuestionsController',['names'=>[
    'create'=>'question.create',
    'show'=>'question.show',
]]);
Route::get('/showUserQuestion','QuestionsController@showUserQuestion');
Route::get('/showUserQuestion/{userId}','QuestionsController@showOtherQuestion');

Route::post('questions/{question}/answer','AnswersController@store');
Route::get('{userId}/answers','AnswersController@showUserAnswer');

Route::get('questions/{question}/follow','QuestionFollowController@follow');

Route::get('notifications','NotificationsController@index');
Route::get('notifications/{notification}','NotificationsController@show');

Route::get('inbox','InboxController@index');

Route::get('inbox/{dialogId}','InboxController@show');

Route::get('topic/{topicId}','TopicsController@show');

Route::post('inbox/{dialogId}/store','InboxController@store');

Route::get('avatar','UsersController@avatar');
Route::post('avatar','UsersController@avatarUpload');

Route::get('password','passwordController@index');
Route::post('password/update','passwordController@update');

Route::get('setting','SettingController@index');
Route::post('setting','SettingController@store');

Route::get('/user/{userId}','UsersController@getUserInfo');
