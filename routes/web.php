<?php


use App\Http\Controllers\SecretaryController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\VisitorController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\ChatsController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DiscussionController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\EmergencyController;
use App\Http\Controllers\StripePaymentController;
use App\Http\Controllers\ContactusController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Request;

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
    return view('welcome');
})->name('Home');

//Contact us
Route::get('contact', function () {
    return view('contact_us');
})->name('contact_us');

Route::post('contact_us', [ContactusController::class, 'store'])->name('contact_us.store');
//about us
Route::get('about', function () {
    return view('about_us');
})->name('about_us');

Route::group(['middleware' => ['auth:society', 'role:secretary,society']], function () {
    Route::get('/society',  function () {
        return view('society.index');
    })->name('society.home');
    Route::get('/approvemember/{user_id}', [SecretaryController::class, 'approve'])->name('society.approvemember');
    Route::get('/rejectmember/{user_id}', [SecretaryController::class, 'reject'])->name('society.rejectmember');
    Route::get('/disapprovemembers', [SecretaryController::class, 'disapprovemembers'])->name('society.needapprove');
    Route::get('/committeemembers', [SecretaryController::class, 'get_members'])->name('society.cmembers');
    Route::get('/addcommitteemember/{user_id}', [SecretaryController::class, 'add_committee_members'])->name('society.addcmember');
    Route::get('/removecommitteemember/{user_id}', [SecretaryController::class, 'remove_committee_members'])->name('society.removecmember');

    Route::get('/setpassword/society', [SecretaryController::class, 'getpassword'])->name('society.setpassword');
    Route::post('/setpassword/society', [SecretaryController::class, 'setpassword'])->name('society.setpassword');

    Route::get('/rule', function () {
        return view('society.add_rule');
    })->name('society.rule');
    Route::post('/rule', [SecretaryController::class, 'add_rule'])->name('society.rule');
    Route::get('/all_rule', [SecretaryController::class, 'show_rule'])->name('society.all_rule');
    Route::get('/delete_rule/{id}', [SecretaryController::class, 'delete_rule'])->name('society.delete_rule');
    Route::get('/edit_rule/{id}', [SecretaryController::class, 'edit_rule'])->name('society.edit_rule');
    Route::put('/update_rule', [SecretaryController::class, 'update_rule'])->name('society.update_rule');

    Route::get('/markasreadsociety/{id}',  function ($id) {
        Auth::user()->unreadNotifications->where('id', $id)->markAsRead();
        return redirect()->back();
    })->name('society.markasread');

    Route::get('/edit/society', [LoginController::class, 'edit_society'])->name('society.edit');
    Route::post('/update/society', [LoginController::class, 'update_society'])->name('society.update');


    Route::resource('meetings', MeetingController::class, ['as' => 'society']);
    Route::resource('notices', NoticeController::class, ['as' => 'society']);
    Route::resource('services', ServiceController::class, ['as' => 'society']);


    Route::resource('meetings', MeetingController::class, ['as' => 'society']);
    Route::resource('notices', NoticeController::class, ['as' => 'society']);

    Route::get("/societysessions", [SessionsController::class, 'sessions'])->name('society.sessions');
    Route::post("/create_session", [SessionsController::class, 'createSession'])->name('society.createSession');
    Route::get("/societysessionroom/{id}", [SessionsController::class, 'showSessionRoom'])->where('id', '[0-9]+')->name('society.sessionroom');
});

Route::group(['middleware' => ['auth', 'role:member']], function () {

    Route::middleware(['approved'])->group(function () {
        Route::get('/member', [MemberController::class, 'index'])->name('member.home');
        Route::get('/approval', [MemberController::class, 'approve'])->name('member.approval');

        Route::get('/addfamilymem', function () {
            return view('member.addfamilymem');
        })->name('member.addfamilymem');
        Route::post('/addfamilymem', [MemberController::class, 'add_familymem'])->name('member.addfamilymem');
        Route::get('/allfamilymem', [MemberController::class, 'show_familymem'])->name('member.allfamilymem');
        Route::get('/deletefamilymem/{id}', [MemberController::class, 'delete_familymem'])->name('member.deletefamilymem');
        Route::get('/editfamilymem/{id}', [MemberController::class, 'edit_familymem'])->name('member.editfamilymem');
        Route::put('/updatefamilymem', [MemberController::class, 'update_familymem'])->name('member.updatefamilymem');

        Route::get('/approvevisitor/{visitor_id}', [MemberController::class, 'approvevisitor'])->name('member.approvevisitor');
        Route::get('/rejectvisitor/{visitor_id}', [MemberController::class, 'rejectvisitor'])->name('member.rejectvisitor');
        Route::get('/disapprovevisitors', [MemberController::class, 'disapprovevisitors'])->name('member.needapprovevisitor');
        Route::get('/preregistervisitor', [MemberController::class, 'previsitor'])->name('member.preregistervisitor');
        Route::post('/preregistervisitor', [MemberController::class, 'preregistervisitor'])->name('member.preregistervisitor');
        Route::get('/visitors/index', [VisitorController::class, 'index'])->name('member.visitors');
        Route::get('/markasreadmember/{id}',  function ($id) {
            Auth::user()->unreadNotifications->where('id', $id)->markAsRead();
            return redirect()->back();
        })->name('member.markasread');

        Route::get('/edit/member', [LoginController::class, 'edit_member'])->name('member.edit');
        Route::post('/update/member', [LoginController::class, 'update_member'])->name('member.update');

        Route::get('/setpassword/member', [MemberController::class, 'getpassword'])->name('member.setpassword');
        Route::post('/setpassword/member', [MemberController::class, 'setpassword'])->name('member.setpassword');

        Route::resource('staffs', StaffController::class, ['as' => 'member']);
        Route::resource('assets', AssetController::class, ['as' => 'member']);
        Route::resource('complaints', ComplaintController::class, ['as' => 'member']);
        Route::get('/complaints/resolve/{complaint}', [ComplaintController::class, 'resolve'])->name('member.complaints.resolve');

        Route::get('/allservice', [ServiceController::class, 'show_service'])->name('member.services.allservice');
        Route::get('/allrule', [SecretaryController::class, 'show_rule_mem'])->name('member.rules.allrule');

        Route::resource('assets', AssetController::class, ['as' => 'member']);
        Route::get('/staffAttendance/{id}', [StaffController::class, 'staffAttendance'])->name('member.staffAttendance');
        Route::post('/paysalary', [StaffController::class, 'payStaffSalary'])->name('member.paysalary');
        Route::get('/showSalary/{id}', [StaffController::class, 'showStaffSalary'])->name('member.showSalary');
        Route::resource('complaints', ComplaintController::class, ['as' => 'member']);
        Route::get('/complaints/resolve/{complaint}', [ComplaintController::class, 'resolve'])->name('member.complaints.resolve');

        Route::resource('discussion', DiscussionController::class, ['as' => 'member']);
        Route::get('/chats/{discussion}', [ChatsController::class, 'index'])->name('member.discussion.chats');;
        Route::get('/messages/{discussion}', [ChatsController::class, 'fetchMessages'])->name('member.discussion.messages');;
        Route::post('/messages/{discussion}', [ChatsController::class, 'sendMessage'])->name('member.discussion.messages');;

        Route::get('/member/send_emergency', [EmergencyController::class, 'send_emergency'])->name('member.send_emergency');

        Route::get("/membersessions", [SessionsController::class, 'sessions'])->name('member.sessions');
        Route::get("/membersessionroom/{id}", [SessionsController::class, 'showSessionRoom'])->where('id', '[0-9]+')->name('member.sessionroom');

        Route::middleware(['role:committeemember'])->group(function () {
            Route::resource('meetings', MeetingController::class, ['as' => 'member']);
            Route::resource('notices', NoticeController::class, ['as' => 'member']);
            Route::resource('expenses', ExpenseController::class, ['as' => 'member']);
        });
    });
});

Route::group(['middleware' => ['auth:staff_security', 'role:staff|security,staff_security']], function () {
    Route::get('/staff',  function () {

        return view('staff_security.index');
    })->name('staff.home');

    Route::get('/attendance', [StaffController::class, 'attendance'])->name('staff.attendance');
    Route::get('/salaries', [StaffController::class, 'showSalary'])->name('staff.showSalary');
    Route::group(['middleware' => ['permission:set password,staff_security']], function () {
        //
        Route::get('/setpassword', [StaffController::class, 'getpassword'])->name('staff.setpassword');
        Route::post('/setpassword', [StaffController::class, 'setpassword'])->name('staff.setpassword');
    });
    Route::group(['middleware' => ['role:security,staff_security']], function () {
        Route::resource('visitors', VisitorController::class, ['as' => 'staff']);
        Route::get('/checkout/{visitor}', [VisitorController::class, 'checkout'])->name('staff.visitors.checkout');
        Route::get('/allvisitors', [VisitorController::class, 'index'])->name('staff.visitors.allvisitors');
        Route::get('/parkingdetails', [VisitorController::class, 'index'])->name('staff.visitors.parkings');
        Route::get('/allstaffs', [StaffController::class, 'allStaffs'])->name('staff.allstaffs');
        Route::get('/checkinstaff/{id}', [StaffController::class, 'checkinStaff'])->name('staff.checkinstaff');
        Route::get('/checkoutstaff/{id}', [StaffController::class, 'checkoutStaff'])->name('staff.checkoutstaff');
        Route::get('/visitor-export', [App\Http\Controllers\VisitorController::class, 'visitorExport'])->name('staff.visitor.export');
    });
    Route::get('/markasread/{id}',  function ($id) {
        Auth::user()->unreadNotifications->where('id', $id)->markAsRead();
        return redirect()->back();
    })->name('staff.markasread');
});

Route::get('/login/society', [LoginController::class, 'show_login'])->name('login.society');
Route::post('/login/society', [LoginController::class, 'check_login'])->name('login.society');
Route::get('/register/society', [LoginController::class, 'show_register'])->name('register.society');
Route::post('/register/society', [LoginController::class, 'create_society'])->name('register.society');
Route::post('/forgot-password/society', [LoginController::class, 'forgot_passwrod'])->name('forgot.society');

Route::get('/login/member', [LoginController::class, 'show_login'])->name('login.member');
Route::post('/login/member', [LoginController::class, 'check_login'])->name('login.member');
Route::get('/register/member', [LoginController::class, 'show_register'])->name('register.member');
Route::post('/register/member', [LoginController::class, 'create_member'])->name('register.member');
Route::post('/forgot-password/member', [LoginController::class, 'forgot_passwrod'])->name('forgot.member');


Route::get('/login/staff', [LoginController::class, 'show_login'])->name('login.staff');
Route::post('/login/staff', [LoginController::class, 'check_login'])->name('login.staff');
Route::post('/forgot-password/staff', [LoginController::class, 'forgot_passwrod'])->name('forgot.staff');

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');


Route::get('/country', function () {
    $country = Storage::get('public/country.json');
    return json_decode($country, true);
});

Route::get('stripe', function () {
    return view('stripe');
})->name('stripe.pay');
Route::post('stripe', [StripePaymentController::class, 'stripePost'])->name('stripe.post');
Route::post('/save-token', [App\Http\Controllers\MemberController::class, 'saveToken'])->name('save-token');

Route::post('stripesalary', [StaffController::class, 'salarypayment'])->name('stripe.salary');
Route::post('stripesalarypay', [StaffController::class, 'payStaffSalary'])->name('stripe.paysalary');
