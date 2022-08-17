<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\volunteer\VChatController;
use App\Http\Controllers\volunteer\VHomeController;
use App\Http\Controllers\volunteer\VFormsController;
use App\Http\Controllers\volunteer\VPostsController;
use App\Http\Controllers\coordinator\CChatController;
use App\Http\Controllers\coordinator\CHomeController;
use App\Http\Controllers\volunteer\VPrizesController;
use App\Http\Controllers\coordinator\CCloudController;
use App\Http\Controllers\coordinator\CFormsController;
use App\Http\Controllers\coordinator\CPostsController;
use App\Http\Controllers\coordinator\CPrizesController;
use App\Http\Controllers\volunteer\VSettingsController;
use App\Http\Controllers\coordinator\CSponsorController;
use App\Http\Controllers\coordinator\CSettingsController;
use App\Http\Controllers\coordinator\CPrizeOrderController;
use App\Http\Controllers\coordinator\CVolunteersController;
use App\Http\Controllers\coordinator\CFormCategoryController;
use App\Http\Controllers\coordinator\CPrizeCategoryController;

App::setLocale(session('locale'));

Route::get('language/{locale}', function($locale) { if (! in_array($locale, ['pl', 'en', 'uk'])) { abort(404); } App::setLocale($locale); session(['locale' => $locale]); return back(); })->name('language');
Route::get('/pl', function() { session(['locale' => 'pl']); App::setLocale('pl'); return back(); })->name('language.pl');
Route::get('/en', function() { session(['locale' => 'en']); App::setLocale('en'); return back(); })->name('language.en');
Route::get('/uk', function() { session(['locale' => 'uk']); App::setLocale('uk'); return back(); })->name('language.uk');

Route::middleware('setlocale')->group(function(){

    Route::view('/', 'home.home')->name('home');
    Route::view('/regulations', 'home.regulations')->name('regulations');
    Route::view('/codex', 'home.codex')->name('codex');
    Route::view('/privacy-policy', 'home.privacy_policy')->name('privacy_policy');
    Route::view('/help-ukraine', 'home.ukraine')->name('help_ukraine');

    Route::controller(HomeController::class)->group(function () {
        Route::get('/volunteer-id/{id}', 'volunteer')->name('volunteer.id');
        Route::middleware('auth')->group(function(){
            Route::get('/login-auth', 'loginauth')->name('loginauth');
            Route::get('/2fa', 'twofa')->name('twofa');
            Route::post('/2fa', 'twofa_send')->name('twofa_send');
            Route::post('/2fa_validate', 'twofa_validate')->name('twofa_validate');

            Route::view('/new-agreement', 'auth.agreement')->middleware('agreementcheck')->name('new.agreement');
            Route::post('/new-agreement', 'update_agreement')->middleware('agreementcheck');
        });

        Route::get('/google/redirect', 'googleredirect')->name('google.redirect');
        Route::get('/google/callback', 'googlecallback');
        Route::post('/google/disconect', 'googledisconect')->name('v.google.disconect')->middleware(['auth', 'volunteercheck', 'verified']);

        Route::get('/facebook/redirect', 'facebookredirect')->name('facebook.redirect');
        Route::get('/facebook/callback', 'facebookcallback');
        Route::post('/facebook/disconect', 'facebookdisconect')->name('v.facebook.disconect')->middleware(['auth', 'volunteercheck', 'verified']);
    });

    Auth::routes();

    //COORDINATOR

    Route::prefix('coordinator')->middleware(['auth', 'coordinatorcheck', 'verified'])->group(function () {

        //DASHBOARD & OTHERS
        Route::prefix('/commands')->group(function(){
            Route::get('/storage', function(){Artisan::call('storage:link');});
        });

        Route::controller(CHomeController::class)->group(function() {
            Route::get('/', 'dashboard')->name('c.dashboard');
            Route::get('/chart', 'chart')->name('c.chart');
            Route::get('/profile', 'profile')->name('c.profile');
            Route::post('/profile', 'update_profile');
            Route::post('/change-photo', 'change_photo')->name('c.change.profile');
            Route::get('/calendar', 'calendar')->name('c.calendar');
            Route::get('/load-events', 'load_events')->name('c.loadevents');
            Route::view('/info', 'coordinator.info')->name('c.info');
            Route::view('/maps', 'coordinator.maps')->name('c.maps');
            Route::get('/send-mail', 'sendmail')->name('c.mail');
            Route::post('/send-mail', 'send_mail');
            Route::post('/mail-preview', 'mail_preview')->name('c.mail.preview');

            Route::get('/update-volunteer', 'update_v')->name('c.update.v');
            Route::post('/update-volunteer', 'update_volunteer');
        });

        //SETTINGS

        Route::prefix('/settings')->controller(CSettingsController::class)->group(function(){
            Route::get('/', 'index')->name('c.settings');
            Route::post('/profile', 'profile')->name('c.settings.profile');
            Route::post('/password', 'password')->name('c.settings.password');
        });

        //DRIVE

        Route::prefix('/cloud')->controller(CCloudController::class)->group(function(){
            Route::view('/', 'coordinator.cloud.index')->name('c.cloud.index');
            Route::post('/create-folder', 'create_folder')->name('c.cloud.create-folder');
            Route::post('/upload-file', 'upload_file')->name('c.cloud.upload-file');
        });

        //CHAT

        Route::prefix('chat')->controller(CChatController::class)->group(function() {
            Route::get('/', 'chat')->name('c.chat');
            Route::post('/getallmessages', 'getallmessages');
            Route::post('/getmessages', 'getmessages');
            Route::post('/getmessage', 'getmessage');
            Route::post('/sendmessage', 'sendmessage');
        });

        //VOLUNTEER

        Route::prefix('volunteer')->controller(CVolunteersController::class)->group(function() {
            Route::get('/', 'index')->name('c.v.list');
            Route::get('/id/{id}', 'show')->name('c.v.volunteer');
            Route::get('/id/{id}/edit', 'edit')->name('c.v.volunteer.edit');
            Route::post('/id/{id}/edit', 'update');
            Route::post('/points/{id}', 'points')->name('c.v.volunteer.points');

            Route::post('/export', 'export')->name('c.v.exportlist');
            Route::post('/reset-points', 'reset_points')->name('c.v.reset_points');
            Route::post('/block', 'block')->name('c.v.volunteer.block');
            Route::post('/unblock', 'unblock')->name('c.v.volunteer.unblock');
            Route::get('/search', 'search')->name('c.v.search');
            Route::get('/active', 'active')->name('c.v.active');
            Route::post('/active', 'activation');
            Route::post('/dactive', 'dactivation')->name('c.v.dactive');
            Route::get('/agreement/{volunteer}', 'agreement')->name('c.v.agreement');
            Route::get('/other', 'other')->name('c.v.other');
        });

        //FORMS

        Route::prefix('/forms')->controller(CFormsController::class)->group(function(){
            Route::get('/archive', 'archive')->name('c.form.archive');
            Route::post('/list/{id}', 'generate_list')->name('c.form.volunteers');
            Route::post('/generate-id/{id}', 'generate_id')->name('c.form.id');
            Route::get('/raport/{id}', 'generate_raport')->name('c.form.raport');
            Route::post('/create-category', 'create_category')->name('c.form.createcategory');

            Route::post('/stop-sign/{id}', 'stop_sign')->name('c.form.stopsign');
            Route::post('/start-sign/{id}', 'start_sign')->name('c.form.startsign');

            Route::get('/positions/{id}', 'positions')->name('c.form.positions');
            Route::post('/positions/{id}', 'set_positions');

            Route::get('/presence/{id}', 'presence')->name('c.form.presence');
            Route::post('/presence/{id}', 'save_presence');

            Route::get('/sign/{id}', 'sign')->name('c.form.sign');
            Route::post('/sign/{id}', 'save_sign');
            Route::post('/reject/{id}', 'reject_sign')->name('c.form.reject');
            Route::get('/view-presence/{id}', 'view_presence')->name('c.form.viewpresence');

            Route::post('/add-volunteer/{id}', 'add_volunteer')->name('c.form.addvolunteer');
            Route::post('/remove-folunteer', 'remove_volunteer')->name('c.form.removevolunteer');
        });

            Route::resource('/form/category', CFormCategoryController::class, ['names' => [
                'index' => 'c.formcategory.list', 'create' => 'c.formcategory.create', 'store' => 'c.formcategory.store', 'show' => 'c.formcategory.show', 'edit' => 'c.formcategory.edit', 'update' => 'c.formcategory.update', 'destroy' => 'c.formcategory.destroy',
            ]]);

        Route::resource('/forms', CFormsController::class, ['names' => [
            'index' => 'c.form.list', 'create' => 'c.form.create', 'store' => 'c.form.store', 'show' => 'c.form.show', 'edit' => 'c.form.edit', 'update' => 'c.form.update', 'destroy' => 'c.form.destroy',
        ]]);

        //PRIZES

        Route::prefix('/prizes')->group(function(){
            Route::controller(CPrizesController::class)->group(function(){
                Route::get('/search', 'search')->name('c.prize.search');
                Route::post('/update-quantity/{id}', 'update_quantity')->name('c.prize.updatequantity');
                Route::post('/create-category', 'create_category')->name('c.prize.createcategory');
                Route::post('/create-sponsor', 'create_sponsor')->name('c.prize.createsponsor');
            });

            Route::prefix('/orders')->controller(CPrizeOrderController::class)->group(function(){
                Route::get('/', 'index')->name('c.prize.orders');
                Route::get('/id/{id}', 'show')->name('c.prize.order');
                Route::post('/create', 'create')->name('c.prize.order.create');
                Route::delete('/id/{id}', 'destroy');
                Route::get('/confirmation/{id}', 'order_confirmation')->name('c.prize.order.confirmation');
                Route::post('/status/{id}', 'change_status')->name('c.prize.order.status');
            });
        });

        Route::resource('/prizes/category', CPrizeCategoryController::class, ['names' => [
            'index' => 'c.prizecategory.list', 'create' => 'c.prizecategory.create', 'store' => 'c.prizecategory.store', 'show' => 'c.prizecategory.show', 'edit' => 'c.prizecategory.edit', 'update' => 'c.prizecategory.update', 'destroy' => 'c.prizecategory.destroy',
        ]]);

        Route::get('/prizes/sponsor/search', [CSponsorController::class, 'search'])->name('c.sponsor.search');
        Route::resource('/sponsor', CSponsorController::class, ['names' => [
            'index' => 'c.sponsor.list', 'create' => 'c.sponsor.create', 'store' => 'c.sponsor.store', 'show' => 'c.sponsor.show', 'edit' => 'c.sponsor.edit', 'update' => 'c.sponsor.update', 'destroy' => 'c.sponsor.destroy',
        ]]);

        Route::resource('/prizes', CPrizesController::class, ['names' => [
            'index' => 'c.prize.list', 'create' => 'c.prize.create', 'store' => 'c.prize.store', 'show' => 'c.prize.show', 'edit' => 'c.prize.edit', 'update' => 'c.prize.update', 'destroy' => 'c.prize.destroy',
        ]]);

        //POSTS

        Route::resource('/posts', CPostsController::class, ['names' => [
            'index' => 'c.post.list', 'create' => 'c.post.create', 'store' => 'c.post.store', 'show' => 'c.post.show', 'edit' => 'c.post.edit', 'update' => 'c.post.update', 'destroy' => 'c.post.destroy',
        ]]);
    });

    //VOLUNTEER

    Route::prefix('volunteer')->middleware(['auth', 'volunteercheck', 'verified'])->group(function () { // 'agreementcheck',

        //DASHBOARD & ETC.

        Route::controller(VHomeController::class)->group(function(){
            Route::get('/', 'dashboard')->name('v.dashboard');
            Route::get('/profile', 'profile')->name('v.profile');
            Route::post('/profile', 'save_profile');
            Route::post('/change-photo', 'change_photo')->name('v.change.profile');
            Route::get('/calendar', 'calendar')->name('v.calendar');
            Route::get('/load-events', 'load_events')->name('v.loadevents');
            Route::view('/info', 'volunteer.info')->name('v.info');
            Route::get('/id', 'id')->name('v.id');
            Route::view('/maps', 'volunteer.maps')->name('v.maps');//mailtest
            Route::get('/search', 'search')->name('v.search');
        });

        //SETTINGS

        Route::prefix('/settings')->name('v.settings')->controller(VSettingsController::class)->group(function(){
            Route::get('/', 'index')->name('');
            Route::get('/agreement', 'agreement')->name('.agreement');
            Route::post('/profile', 'profile')->name('.profile');
            Route::post('/password', 'password')->name('.password');

            Route::post('/send-email-code', 'send_email_code')->name('.sendemailcode');
            Route::post('/email2fa', 'email2fa')->name('.email2fa');
            Route::post('/email2fa-change', 'email2fa_change')->name('.email2fa_change');

            Route::post('/google2fa', 'google2fa')->name('.google2fa');
            Route::post('/google2fa-change', 'google2fa_change')->name('.google2fa_change');

            Route::post('/notifications', 'save_notifications')->name('.save_notifications');

            Route::post('/new-agreement', 'new_agreement')->name('.newagreement');
        });

        //CHAT

        Route::prefix('/chat')->controller(VChatController::class)->group(function() {
            Route::view('/', 'volunteer.chat.chat')->name('v.chat');
        });

        //POSTS

        Route::prefix('/posts')->controller(VPostsController::class)->group(function() {
            Route::get('/', 'index')->name('v.post.list');
            Route::get('/{id}', 'show')->name('v.post');
        });

        //FORMS

        Route::prefix('/forms')->controller(VFormsController::class)->group(function() {
            Route::get('/', 'list')->name('v.form.index');
            Route::get('/archive', 'archive')->name('v.form.archive');
            Route::get('/id/{id}', 'form')->name('v.form.show');
            Route::post('/id/{id}', 'signto');
            Route::post('/delete/{id}', 'unsign')->name('v.form.unsign');
            Route::post('/certificate', 'certificate')->name('v.form.certificate');
            Route::post('/feedback/{id}', 'feedback')->name('v.form.feedback');
        });

        //PRIZES

        Route::prefix('/prizes')->controller(VPrizesController::class)->group(function() {
            Route::get('/', 'index')->name('v.prize.list');
            Route::get('/id/{id}', 'show')->name('v.prize');
            Route::post('/get-prize/{id}', 'store')->name('v.prize.get');
            Route::get('/orders', 'orders')->name('v.prize.orders');
            Route::get('/order/{id}', 'order')->name('v.prize.order');
            Route::get('/order/confirmation/{id}', 'order_confirmation')->name('v.prize.order.confirmation');
        });
    });
});
