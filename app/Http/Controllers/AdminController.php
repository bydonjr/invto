<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Sale;


class AdminController extends Controller
{

    public function dashboard()
    {
        $sales = Sale::with(['customer', 'saleItems.product'])
        ->orderBy('created_at', 'desc')
        ->limit(3)
        ->get();

        $totalSalesCount = Sale::count();

        return view('admin.index', compact('sales', 'totalSalesCount'));
    }

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



    public function Profile(){
        $id = Auth::user()->id;
        $adminData = User::find($id);


        return view('admin.profile',compact('adminData'));
    }


    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.profile_edit',compact('editData'));
    }


}
