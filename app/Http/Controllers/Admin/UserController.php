<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (auth()->user()->client_id == 1) {
            $data = User::orderBy('id', 'DESC')->get();
        } else {
            $data = User::where('client_id', auth()->user()->client_id)->orderBy('id', 'DESC')->get();
        }
        return view('admin.users.index', compact('data'));

    }

    public function messages(Request $request)
    {
        if (!empty($request->whatsapp_id)){
            $data = sendMessages($request->phone,$request->messages,$request->whatsapp_id);
            if ($data){

                toastr()->success('ارسال البيانات بنجاح', 'عمليه ناجحه');
                return redirect()->route('users.index');
            }else{
                toastr()->error('لم تتم الارسال بنجاح', 'خطأ');
                return redirect()->route('users.index');
            }
        }else{
            toastr()->error('لا يوجد رقم التعرفي للواتس اب', 'خطأ');
            return redirect()->route('users.index');
        }
    }

    public function sendWelcomeMessages(Request $request)
    {

        if (!empty($request->whatsapp_id)){
            $data = sendWelcomeMessages($request->phone,$request->template_id,$request->whatsapp_id);
            if ($data){

                toastr()->success('ارسال البيانات بنجاح', 'عمليه ناجحه');
                return redirect()->route('users.index');
            }else{
                toastr()->error('لم تتم الارسال بنجاح', 'خطأ');
                return redirect()->route('users.index');
            }
        }else{
            toastr()->error('لا يوجد رقم التعرفي للواتس اب', 'خطأ');
            return redirect()->route('users.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
