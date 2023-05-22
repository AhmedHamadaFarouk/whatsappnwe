<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhatsappId;
use Illuminate\Http\Request;

class WhatsappIdController extends Controller
{

    public function index()
    {
        if (auth()->user()->client_id == 1) {
            $data = WhatsappId::orderBy('id', 'DESC')->get();
        } else {
            $data = WhatsappId::where('client_id', auth()->user()->client_id)->orderBy('id', 'DESC')->get();
        }


        return view('admin.whatsapp.index', compact('data'));
    }



    public function store(Request $request)
    {
        WhatsappId::create([
            'client_id' => auth()->user()->client_id == 1 ? $request->client_id : auth()->user()->client_id,
            'whatsapp_id' => $request->whatsapp_id,
            'name' => $request->name,
        ]);
        toastr()->success('تم اضافه البيانات بنجاح','عمليه ناجحه');
        return redirect()->route('whatsapp_id.index');
    }


    public function update(Request $request, string $id)
    {
        WhatsappId::findorfail($request->id)->update([
            'client_id' => auth()->user()->client_id == 1 ? $request->client_id : auth()->user()->client_id,
            'whatsapp_id' => $request->whatsapp_id,
            'name' => $request->name,
        ]);
        toastr()->success('تم التعديل البيانات بنجاح','عمليه ناجحه');
        return redirect()->route('whatsapp_id.index');
    }


    public function destroy(Request $request, string $id)
    {
        WhatsappId::destroy($request->id);
        toastr()->success('تم الحذف البيانات بنجاح','عمليه ناجحه');
        return redirect()->route('whatsapp_id.index');
    }
}
