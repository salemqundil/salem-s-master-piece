<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Deposit;
use App\Models\Product;
use App\Lib\CurlRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Rules\FileTypeValidate;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AdminController extends Controller
{

    public function showLoginForm()
    {
        $pageTitle = "Admin Login";
        return view('admin.auth.login', compact('pageTitle'));
    }
    public function login(LoginRequest $request): RedirectResponse
    {
        if (Auth::guard('admin')->attempt($request->only('email', 'password'))) {
            // تجديد الجلسة
            $request->session()->regenerate();
    
            return redirect('admin/dashboard');
        }
    
        return back()->withErrors([
            'username' => 'The provided credentials are incorrect.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        return redirect('/admin/login');
    }


    public function dashboard()
    {

        $pageTitle = 'Dashboard';

        // User Info
        $widget['total_users']             = User::count();
        // $widget['verified_users']          = User::where('status', 1)->where('ev',1)->where('sv',1)->count();
        // $widget['email_unverified_users']  = User::emailUnverified()->count();
        // $widget['mobile_unverified_users'] = User::mobileUnverified()->count();
        // $widget['open_tickets']            = SupportTicket::whereStatus(0)->count();
        // $widget['total_sales']             = Subscription::sum('amount');

         // order
         $order['total_orders'] = Order::count();
         $order['total_products'] = Product::count();
         $order['total_categories'] = Category::count();
         $order['total_delivered'] = Order::where('status',3)->count();


        // $deposit['total_deposit_amount']        = Deposit::successful()->sum('amount');
        // $deposit['total_deposit_pending']       = Deposit::pending()->count();
        // $deposit['total_deposit_rejected']      = Deposit::rejected()->count();
        // $deposit['total_deposit_charge']        = Deposit::successful()->sum('charge');

        // Monthly Deposit Report Graph
        // $deposits = Deposit::selectRaw("SUM(amount) as amount, MONTHNAME(created_at) as month_name")->orderBy('created_at')
        //             ->whereYear('created_at', date('Y'))->whereStatus(1)
        //             ->groupByRaw("MONTHNAME(created_at)")
        //             ->pluck('amount', 'month_name');
        // $depositsChart['labels'] = $deposits->keys();
        // $depositsChart['values'] = $deposits->values();

        // UserLogin Report Graph

        // $newTickets = SupportTicket::with('user')->orderBy('created_at', 'desc')->whereStatus(0)->limit(6)->get();
        return view('admin.dashboard', compact('pageTitle', 'widget', 'order'));
    }


    public function profile()
    {
        $pageTitle = 'Profile';
        $admin = auth('admin')->user();
        return view('admin.profile', compact('pageTitle', 'admin'));
    }

    public function profileUpdate(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'image' => ['nullable','image',new FileTypeValidate(['jpg','jpeg','png'])]
        ]);
        $user = auth('admin')->user();
        if ($request->hasFile('image')) {
            try {
                $old = $user->image;
                $user->image = fileUploader($request->image, getFilePath('adminProfile'), getFileSize('adminProfile'), $old);
            } catch (\Exception $exp) {
                $notify[] = ['error', 'Couldn\'t upload your image'];
                return back()->withNotify($notify);
            }
        }

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        $notify[] = ['success', 'Profile has been updated successfully'];
        return to_route('admin.profile')->withNotify($notify);
    }


    public function password()
    {
        $pageTitle = 'Password Setting';
        $admin = auth('admin')->user();
        return view('admin.password', compact('pageTitle', 'admin'));
    }

    public function passwordUpdate(Request $request)
    {
        $this->validate($request, [
            'old_password' => 'required',
            'password' => 'required|min:5|confirmed',
        ]);

        $user = auth('admin')->user();
        if (!Hash::check($request->old_password, $user->password)) {
            $notify[] = ['error', 'Password doesn\'t match!!'];
            return back()->withNotify($notify);
        }
        $user->password = bcrypt($request->password);
        $user->save();
        $notify[] = ['success', 'Password changed successfully.'];
        return to_route('admin.password')->withNotify($notify);
    }

    
    // public function readAll(){
    //     AdminNotification::where('read_status',0)->update([
    //         'read_status'=>1
    //     ]);
    //     $notify[] = ['success','Notifications read successfully'];
    //     return back()->withNotify($notify);
    // }

    public function downloadAttachment($fileHash)
    {
        $filePath = decrypt($fileHash);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);
        $general = gs();
        $title = slug($general->site_name).'- attachments.'.$extension;
        $mimetype = mime_content_type($filePath);
        header('Content-Disposition: attachment; filename="' . $title);
        header("Content-Type: " . $mimetype);
        return readfile($filePath);
    }


}
