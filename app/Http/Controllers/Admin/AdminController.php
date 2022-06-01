<?php

namespace App\Http\Controllers\Admin;

use App\Groups;
use App\Promotion;
use App\ResetPassword;
use App\Settings;
use App\User;
use App\Work;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use Image;

class AdminController extends Controller
{

    protected $siteEmail;
    protected $siteName;


    public function getAdmins(){

//        dd(randIdNumber(4, 3));
        $checked = Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $data = User::with(['group' => function($q)  {
                        $q->select('id', 'name');
                    }])
                    ->where([ ['is_admin', 1], ['user_type', 1] ])
//                    ->select('id', 'name', 'phone','email', 'created_at', 'group_id', 'status')
                    ->get();

        $type = 'admin';

        return view('admin.admins.showAll', compact('data', 'type'));
    }

    public function getUsers(){

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $data = User::where([ ['is_admin', '!=', 1], ['user_type', 3] ])
//                    ->select('id', 'name', 'phone','email', 'created_at', 'status')
                    ->get();

        $type = 'user';

        return view('admin.admins.showAll', compact('data', 'type'));
    }

    public function getCenters() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $data = User::where('user_type', 2)->where('admin_is_conf', 1)
//                    ->select('id', 'name', 'phone','email', 'location_text', 'photo', 'created_at', 'status')
                    ->get();

        return view('admin.centers.showAll', compact('data'));
    }



    public function getDeActiveCenters() {

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $data = User::where('user_type', 2)->where('admin_is_conf', 0)->get();

        return view('admin.centers.deactevsShowAll', compact('data'));


    }


    public function getActiveCenter($id) {

        $id = (int) $id;

        $data = User::where('user_type', 2)->where('admin_is_conf', 0)->where('id' , $id)->first();

        return view('admin.centers.activeCenter', compact('data'));        

    }

    public function postActiveCenter(Request $request, $id) {

        
        $rules = [

            'duration' => 'required|integer',
            'admin_is_conf' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('deactive-centers')->withErrors($validator)->withInput();
        }        

        $id = (int) $id;

        $data = User::where('user_type', 2)->where('admin_is_conf', 0)->where('id' , $id)->first();

        if($data) {
            $data->admin_is_conf = $request->admin_is_conf;
            $data->duration = $request->duration;
            $data->active_at = Carbon::now();
            $data->save();

            return redirect()->route('deactive-centers')->with('mOk', 'تم التعديل بنجاح');

        }

        return redirect()->route('deactive-centers')->with('mNo', 'يوجد خطأ في بيانات المستخدم المرسلة');

    }



    public function getAddAdmin(){

        $checked =  Controller::checkAuthorization();

        if( !$checked ) {
            return view('errors.403');
        }

        $groups = Groups::where('status', 1)->orderBy('id', 'DESC')->select('id', 'name')->get();

        return view('admin.admins.add', compact('groups'));
    }

//    public function getAddCenter(){
//
//        $checked =  Controller::checkAuthorization();
//
//        if( !$checked ) {
//            return view('errors.403');
//        }
//
//        return view('admin.centers.add');
//    }

    public function postAddAdmin(Request $request)
    {

        $rules = [
            'name' => 'required|min:3|max:200',
            'email' => 'required|email|unique:users|min:3:max:255',
            'phone' => 'required|max:15|unique:users',
            'password' => 'required|min:3|max:255',
            'password_con' => 'same:password',
//            'group_id' => 'required',
            'status' => 'required',
            'is_admin' => 'required',
            'photo' => 'required|mimes:jpg,jpeg,png,gif'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            
            dd($validator);

            return redirect()->route('admin-add')->withErrors($validator)->withInput();
        }

        if(filterNumber($request->phone) == FALSE) {

            return redirect()->route('admin-add')->with('error', 'ادخل رقم جوال صحيح');
        }


    //if_admin_send_email.....
        if ($request->is_admin ==1){

//            $code = mb_substr(abs(intval(crc32(rand(10000, 9999) . $request->email))), 0, 5, 'utf8');

            $this->siteEmail = Controller::getSiteData()['site_email'];
            $this->siteName = Controller::getSiteData()['site_name'];

            $vars = [
                'from' => $this->siteEmail,
                'messagesTitle' => 'موقع '. $this->siteName,
                'to' => $request->email,
                'fromName' => $this->siteName,
                'subject' => 'تفعيل حسابك في '. $this->siteName,
                'token' => md5(csrf_token())
            ];

            $mailed = sendEmail('admin.emails.AdminActive', $vars);

            if( !$mailed ) {
                return redirect()->route('admin-add')->with('mNo', trans('messages.emailSendNo'));
            }
        }


        $newAdmin = new User();

        $newAdmin->name = $request->name;
        $newAdmin->phone = $request->phone;
        $newAdmin->email = trim($request->email);
        $newAdmin->password = bcrypt(trim($request->password));
        $newAdmin->is_admin = $request->is_admin;
        $newAdmin->status = $request->status;
        
        if($request->has('id_number')){
            $newAdmin->id_number = $request->id_number;
        }

        if (isset($request->photo) && $request->photo != '') {

            $newAdmin->photo = newUploading($request->file('photo'), '/uploads/users');
        }

        if ( $request->is_admin == 1 ) {
            $newAdmin->user_type = 1;
            $newAdmin->group_id = $request->group_id;
            $newAdmin->conf_status = 0;
            $newAdmin->remember_token = md5(csrf_token());
            $msg = trans('messages.addAdminOk');
        }
        else {
            $newAdmin->user_type = 3;
            $newAdmin->group_id = NULL;
            $newAdmin->conf_status = 1;
            $msg = trans('messages.addUserOk');
        }


        if($newAdmin->save()) {

            if($request->is_admin == 1){

                $newAdmin->id_number = randIdNumber($newAdmin->id, 3);
                $newAdmin->save();
            }
            return redirect()->route('admin-add')->with('mOk', $msg);
        }
        return redirect()->route('admin-add')->with('mNo', trans('messages.addAdminNo'))->withInput();

//        return $newAdmin->save() ? redirect()->route('admin-add')->with('mOk', $msg) :
//                                redirect()->route('admin-add')->with('mNo', trans('messages.addAdminNo'))->withInput();
    }

//    public function postAddCenter(Request $request)
//    {
//
//        $rules = [
//            'name' => 'required|min:3|max:200',
//            'email' => 'required|email|unique:users|min:3:max:255',
//            'phone' => 'required|max:15|unique:users',
//            'password' => 'required|min:3|max:255',
//            'password_con' => 'same:password',
//            'location_text' => 'required|min:3',
//            'status' => 'required',
//        ];
//
//        $validator = Validator::make($request->all(), $rules);
//
//        if ($validator->fails()) {
//
//            return redirect()->route('center-add')->withErrors($validator)->withInput();
//        }
//
//        if(filterNumber($request->phone) == FALSE) {
//
//            return redirect()->route('center-add')->with('error', 'ادخل رقم جوال صحيح');
//        }
//
//
//        $centerData = new User();
//
//        $centerData->name = $request->name;
//        $centerData->phone = $request->phone;
//        $centerData->email = trim($request->email);
//        $centerData->password = bcrypt(trim($request->password));
//        $centerData->location_text = $request->location_text;
//        $centerData->status = $request->status;
//        $centerData->user_type = 2;
//        $centerData->conf_status = 1;
//        $centerData->is_admin = 0;
//
//        if (isset($request->photo) && $request->photo != '') {
//            $centerData->photo = uploading($request->file('photo'), 'users');
//        }
//        else {
//            $centerData->photo = '';
//        }
//
//        return $centerData->save() ? redirect()->route('center-add')->with('mOk', trans('messages.addCenterOk')) :
//            redirect()->route('center-add')->with('mNo', trans('messages.addAdminNo'))->withInput();
//    }


    public function getActiveEmail($active)
    {

        $user = User::where('remember_token', $active)->first();

        if (isset($user) && $user->is_admin) {

            if ($active == $user->remember_token) {

                $activeEmail = User::find($user->id);
                $activeEmail->conf_status = 1;
                $activeEmail->save();

                return redirect()->route('admin-login')->with('mOk', trans('messages.activeOk'));
            }
        }

        return redirect()->route('admin-login')->with('mNo', trans('messages.activeNo'));
    }


    public function getEditAdmin($id){

        $data = User::where('id', $id)
//                    ->select('id', 'name', 'email', 'phone', 'status', 'is_admin', 'group_id')
                    ->first();

        if ( !$data ){
            return view('errors.404');
        }

        if (CheckData($data) !== true) {
            return back();
        }

//        dd($data);
        return view('admin.admins.edit', [
            'data' => $data
        ]);
    }

    public function getEditCenter($id){

        $data = User::where('id', $id)
                    ->select('id', 'name', 'email', 'phone', 'status', 'photo', 'location_text', 'duration', 'is_pro')->first();

        if ( !$data ){
            return view('errors.404');
        }
        
        if (CheckData($data) !== true) {
            return back();
        }

        return view('admin.centers.edit', [
            'data' => $data
        ]);
    }


    public function postEditAdmin(Request $request, $id)
    {

        $id = (int) $id;

        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => "required|email|unique:users,email,$id",
            'phone' => 'required|max:15|unique:users,phone,' . $id,
            'status' => 'required',
            'is_admin' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('admin-edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        if(filterNumber($request->phone) == FALSE) {

            return redirect()->route('admin-edit', ['id' => $id])->with('mNo', 'ادخل رقم جوال صحيح');
        }

        $adminData = User::where('id', $id)->firstOrFail();

        if (isset($request->photo) && $request->photo != '') {

            @unlink(public_path('uploads/users/') . $adminData->photo);

            $adminData->photo = newUploading($request->file('photo'), '/uploads/users');
        }

        $adminData->name = $request->name;
        $adminData->email = trim($request->email);
        $adminData->phone = $request->phone;
        $adminData->is_admin = $request->is_admin;
        $adminData->duration = $request->duration;
        $adminData->is_pro = $request->is_pro;
        $adminData->status = $request->status;
        
        if($request->has('id_number')){
            $adminData->id_number = $request->id_number;
        }

        if ( $request->is_admin == 0 ) {
            $adminData->user_type = 3;
            $adminData->group_id = NULL;
        }
        else {
            $adminData->user_type = 1;
            $adminData->group_id = $request->group_id;
        }

        return $adminData->save() ? redirect()->route('admins')->with('mOk', trans('messages.updateTrue')) : redirect()->route('admin-edit', ['id' => $id])->with('mNo', trans('messages.updateFalse'))->withInput();



//        $trans = 0;

//        if ($request->email != $adminData->email) {
//
//            $adminData->email = trim($request->email);
//
//            // send active email
//
//            $vars = [
//                'from' => settings()->site_email,
//                'messagesTitle' => trans('email.activeTitle'),
//                'to' => $request->email,
//                'fromName' => settings()->site_name,
//                'subject' => trans('email.activeSubject'),
//                'data' => [
//                    'token' => csrf_token(),
//                    'siteName' => settings()->site_name
//                ]
//
//            ];
//
//            sendEmail('admin.emails.AdminActive', $vars);
//
//            $adminData->active_email = 0;
//
//            $trans = 1;
//        }
    }

    public function postEditCenter(Request $request, $id)
    {

       

        $rules = [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,id,' . $id . '|min:3:max:255',
            'phone' => 'required|max:15|unique:users,id,' . $id,
            'location_text' => 'required|min:3',
            'status' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {

            return redirect()->route('center-edit', ['id' => $id])->withErrors($validator)->withInput();
        }

        if(filterNumber($request->phone) == FALSE) {

            return redirect()->route('center-edit', ['id' => $id])->with('mNo', 'ادخل رقم جوال صحيح');
        }

        $centerData = User::where('id', $id)->firstOrFail();

        $centerData->name = $request->name;
        $centerData->email = trim($request->email);
        $centerData->phone = $request->phone;
        $centerData->location_text = $request->location_text;
        $centerData->is_pro = $request->is_pro;
      
        if($request->has('renew') && $request->renew != '') {

            $centerData->duration = $request->duration;
            $centerData->active_at = date('Y-m-d');
            
        }
        

        $centerData->status = $request->status;

        if (isset($request->photo) && $request->photo != '' && $centerData->photo != $request->photo) {

            @unlink(base_path('uploads/users') . DIRECTORY_SEPARATOR . $centerData->photo);

            $centerData->photo = uploading($request->file('photo'), 'users');
        }

        return $centerData->save() ? redirect()->route('centers')->with('mOk', trans('messages.updateTrue')) : redirect()->route('center-edit', ['id' => $id])->with('mNo', trans('messages.updateFalse'))->withInput();
    }


    public function getAdminDetails($id){

        $data = User::find($id);

        if ( !$data ){
            return view('errors.404');
        }

        return view('admin.admins.details', ['data' => $data]);
    }

    public function getCenterDetails($id) {

        $data = User::find($id);
        
        // dd(Carbon::now()->diffInDays($data->active_at) > $data->duration * 30);

        if ( !$data ){
            return view('errors.404');
        }

        return view('admin.centers.details', ['data' => $data]);
    }


    public function getDeleteAdmin($id)
    {

        if (Auth::user()->id == $id) {
            return back()->with('mNo', 'لا يمكن حذف العضو الحالى');
        }

        $userData = User::where('id', $id)->select('photo')->first();

        if (isset($userData->photo) && $userData->photo != '') {

            @unlink(public_path('uploads/users') . DIRECTORY_SEPARATOR . $userData->photo);
        }

        return User::where('id', $id)->delete() ? back()->with('mOk', trans('messages.deletedOk')) : back()->with('mNo', trans('messages.deletedNo'));
    }

    public function getDeleteCenter($id) {

        $userData = User::where('id', $id)->first();

        if (isset($userData->photo) && $userData->photo != '') {

            @unlink(public_path('uploads/users') . DIRECTORY_SEPARATOR . $userData->photo);
        }

        $ids = $userData->services()->pluck('id')->toArray();

    //delete-this-company-if-set-as-promotion...
        $userData->promotions()->delete();

    //delete-this-company-services-in-promotions..
        Promotion::where('promotionable_type', 'App\Service')->whereIn('promotionable_id', $ids)->delete();

    //delete-this-company-work-times...
        $userData->works()->delete();

    //delete-this-company-services-work-times..
        Work::where('workable_type', 'App\Service')->whereIn('workable_id', $ids)->delete();

        return User::where('id', $id)->delete() ? back()->with('mOk', trans('messages.deletedOk')) : back()->with('mNo', trans('messages.deletedNo'));
    }


    // admin auth
    public function getLogin()
    {

        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {

        if ($request->ajax() || $request->wantsJson()) {
            return response('Unauthorized.', 401);
        }

        $rules = [

            'email' => 'required|email|min:3:max:255',
            'password' => 'min:3|max:255',

        ];

        // validation done ^_^
       // collValidation($request, $rules);

        return Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ]) ? redirect()->route('dashboard') : back()->with('mNo', trans('messages.loginFalse'));

    }


    public function getLogout()
    {

        Auth::logout();

        return redirect()->route('home');

    }

    public function getForgetPassword()
    {

        return view('admin.auth.forgetPassword');
    }

    public function postForgetPassword(Request $request)
    {

        $rules = [

            'email' => 'required|email|min:3:max:255',
        ];

        // validation done ^_^
        collValidation($request, $rules, "back");

        $email = User::where('email', $request->email)->where('is_admin', 1)->first()->email;

        if (isset($email) && $email != '') {

            // send active email

            $vars = [
                'from' => $this->siteEmail,
                'messagesTitle' => trans('email.forgetTitle'),
                'to' => $email,
                'fromName' => $this->siteName,
                'subject' => trans('email.forgetTitle'),
                'token' => csrf_token(),
                'data' => [
                    'token' => csrf_token(),
                    'siteName' => $this->siteName
                ]

            ];

            sendEmail('admin.emails.forgetPassword', $vars);

            $gData = new ResetPassword;
            $gData->email = $email;
            $gData->token = csrf_token();
            $gData->save();

            return back()->with('mOk', trans('messages.fPasswordTrue'));

        }

        return back()->with('mNo', trans('messages.fPasswordError'));

    }


    public function getRestPassword($token)
    {

        $tokenIsValid = ResetPassword::where('token', $token)->count();

        if ($tokenIsValid != 1) {
            return redirect()->route('home')->with('mNo', trans('messages.tokenNotValid'));
        }

        return view('admin.auth.restPassword');
    }

    public function postRestPassword(Request $request, $token)
    {

        $rules = [

            'password' => 'min:3|max:255',
            'password_con' => 'same:password',

        ];

        // validation done ^_^
        collValidation($request, $rules, "route('back()')");

        $email = ResetPassword::where('token', $token)->first()->email;

        if (isset($email) && $email != '') {

            $updatePassword = User::where('email', $email)->first();

            $updatePassword->password = bcrypt(trim($request->password));

            return $updatePassword->save() ? redirect()->route('dashboard')->with('mOk', trans('messages.rPasswordOk')) : redirect()->route('dashboard')->with('mNo', trans('messages.rPasswordNo'));

        }

        return redirect()->route('home')->with('mNo', trans('messages.tokenNotValid'));

    }

    public function changeStatus(Request $request) {

        $user = User::find($request->user_id);

        $user->status = $request->status;
        $user->save();

        return $user->save() ? '1' : '0';
    }


//    public function centersRatings() {
//
//        $checked =  Controller::checkAuthorization();
//
//        if( !$checked ) {
//            return view('errors.403');
//        }
//
//        $data = User::where('user_type', 2)
//                        ->with([
//                            'ratings' => function($query) {
//                                $query->select('id', 'company_id', 'stars_count');
//                            }
//                        ])
//                        ->select('id', 'name')
//                        ->get();
//
//        foreach( $data as $key => $user ) {
//
//            if ($data[$key]->ratings->count()) {
//
//                $rating_count = $data[$key]->ratings->count();
//                $rating_sum = 0;
//                $stars_arr = [];
//
//                foreach ($data[$key]->ratings as $rating) {
//
//                    $stars_arr[] = $rating->stars_count;
//                }
//                $rating_sum += array_sum($stars_arr);
//                $data[$key]['rating'] = number_format((float)$rating_sum / $rating_count, 2, '.', '');
//            }
//            else
//                unset($data[$key]);
//        }
//
//        return view('admin.admins.centersRatings', compact('data'));
//    }


}