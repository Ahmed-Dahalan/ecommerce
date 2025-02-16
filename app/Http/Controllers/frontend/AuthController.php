<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Symfony\Component\HttpFoundation\Response;
use Intervention\Image\Facades\Image;


class AuthController extends Controller
{
    public function ShowLogin(Request $request)
    {
        $request->merge(['guard' => $request->guard]);
        $validator = validator($request->all(), [
            'guard' => 'string|in:admin,web',
        ]);

        session()->put('guard', $request->input('guard'));

        if (!$validator->fails()) {
            return response()->view('frontend.auth.login');
        } else {
            abort(Response::HTTP_NOT_FOUND, 'the page not found');
        }
    }

    public function login(Request $request)
    {
        $validator = validator($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:3',
            'remember' => 'required'
        ]);
        $guard = session()->get('guard');
        if (!$validator->fails()) {
            $crednetials = ['email' => $request->email, 'password' => $request->password];
            if (Auth::guard($guard)->attempt($crednetials, $request->remember)) {
                return response()->json(['message' => 'login succsess'], Response::HTTP_OK);
                redirect()->route('profile');
            } else {
                return response()->json(
                    ['message' => 'login faild'],
                    Response::HTTP_BAD_REQUEST
                );
            }
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
    public function register(Request $request){
        $validator = validator($request->all(), [
            'email' => 'required|email',
            'name'=>'required|string',
            'password' => 'required|string',
            
        ]);
        if(!$validator->fails()){
            $user = new User();
            $user->email = $request->input('email');
            $user->name = $request->input('name');
            $user->password = Hash::make($request->input('password'));
            $saved =  $user->save();
            return response()->json(['message'=>$saved?'created success':'created faild'],$saved?Response::HTTP_OK:Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(
                ['message' => $validator->getMessageBag()->first()],
                Response::HTTP_BAD_REQUEST
            );
        }
    }
    public function logout(Request $request)
    {
        $guard = session()->get('guard');
        Auth::guard($guard)->logout();
        session()->forget('guard');
        return redirect()->route('web.login',$guard);
    }

    public function updateProfile(Request $request, $id)
    {

        $user = User::find($id);
        if ($request->file('profile_image')) {
            $image = $request->file('profile_image');
            @unlink(public_path('upload/user_image/' . $user->image));
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();  // 3434343443.jpg

            Image::make($image)->resize(200, 200)->save('upload/user_image/' . $name_gen);
            $save_url =  $name_gen;

            User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'image' => $save_url,

            ]);
            $notification = array(
                'message' => 'Blog Updated with Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('profile')->with($notification);
        } else {

            User::findOrFail($id)->update([
                'name' => $request->name,
                'email' => $request->email,

            ]);

            $notification = array(
                'message' => 'Blog Updated without Image Successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('edit.profile')->with($notification);
        } // end Else
    }

    public function editPassword()
    {
        $guard =  Auth::guard('admin')->check() ? 'admin' : 'web';
        return response()->view('frontend.profile.edit-password', compact('guard'));
    }

    public function updatePassword(Request $request)
    {
        $guard = auth('admin')->check() ? 'admin' : 'web';
        $validator = validator($request->all(), [
            'old_password' => 'required|current-password:' . $guard,
            'new_password' => ['required', 'confirmed', Password::min(8)->letters()->symbols()->mixedCase()->uncompromised()]

        ]);
        if (!$validator->fails()) {
            $user = $request->user();
            $user->forceFill([
                'password' => Hash::make($request->input('new_password')),
            ]);
            $isSaved = $user->save();
            Auth::logout();
            $notification = array(
                'message' => $isSaved ? 'update change password Successfully' : 'update change password faild',
                'alert-type' => 'success'
            );

            return redirect()->route('profile')->with($notification);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

    public function MyOrders()
    {

        $orders = Order::where('user_id', Auth::id())->orderBy('id', 'DESC')->get();
        return view('frontend.order.order_view', compact('orders'));
    }

    public function OrderDetails($order_id)
    {

        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        return view('frontend.order.order_details', compact('order', 'orderItem'));
    } // end mehtod

    public function InvoiceDownload($order_id)
    {
        $order = Order::with('division', 'district', 'state', 'user')->where('id', $order_id)->where('user_id', Auth::id())->first();
        $orderItem = OrderItem::with('product')->where('order_id', $order_id)->orderBy('id', 'DESC')->get();
        $pdf = Pdf::loadView('frontend.order.order_invoic', compact('order', 'orderItem'))->setPaper('a4')->setOptions([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    } // end mehtod 

    public function ReturnOrder(Request $request, $order_id)
    {

        Order::findOrFail($order_id)->update([
            'return_date' => Carbon::now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);


        $notification = array(
            'message' => 'Return Request Send Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('my.orders')->with($notification);
    } // end method 

    public function ReturnOrderList()
    {

        $orders = Order::where('user_id', Auth::id())->where('return_reason', '!=', NULL)->orderBy('id', 'DESC')->get();
        return view('frontend.order.return_order', compact('orders'));
    } // end method 

    public function CancelOrders()
    {

        $orders = Order::where('user_id', Auth::id())->where('status', 'cancel')->orderBy('id', 'DESC')->get();
        return view('frontend.order.cancel_order', compact('orders'));
    } // end method

    public function OrderTraking(Request $request)
    {

        $invoice = $request->code;

        $track = Order::where('invoice_no', $invoice)->first();

        if ($track) {

            // echo "<pre>";
            // print_r($track);

            return view('frontend.tracking.track_order', compact('track'));
        } else {

            $notification = array(
                'message' => 'Invoice Code Is Invalid',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
    } // end mehtod 



}
