<?php
use App\Http\Livewire\Activitys;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Dashboard;
use App\Http\Livewire\ManageCompetition;
use App\Http\Livewire\ManageDashboard;
use App\Http\Livewire\ManageNotification;
use App\Http\Livewire\Notification;
use App\Http\Livewire\ParticipantProfile;
use App\Http\Livewire\RegisterPage;
use App\Http\Livewire\Results;
use App\Http\Livewire\UpdateCompetition;


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

Route::get('/', function () {
    return view('home');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('redirects','App\Http\Livewire\DashboardController@render');

Route::get('/participantlist', App\Http\Livewire\ParticipantList::class);
Route::get('/notification', Notification::class)->name('notification');
Route::get('/result',Results::class)->name('result');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/register-page', RegisterPage::class)->name('register-page');
    // Route::get('/register-competition', RegisterCompetition::class)->name('register-competition');
    // Route::get('/update-competition', UpdateCompetition::class)->name('update-competition');
    Route::get('/paricipant-profile', ParticipantProfile::class)->name('paricipant-profile');

    //admin group
    Route::get('/manage-dashboard', ManageDashboard::class)->name('manage-dashboard');
    Route::get('/manage-competition', ManageCompetition::class)->name('manage-competition');
    Route::get('/manage-notification', ManageNotification::class)->name('manage-notification');
    Route::get('/activity', Activitys::class)->name('activity');
});
