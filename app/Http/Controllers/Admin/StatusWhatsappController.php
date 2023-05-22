<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StatusWhatsapp;
use App\Models\WhatsappId;
use Illuminate\Http\Request;

class StatusWhatsappController extends Controller
{

    public function index()
    {

        if (auth()->user()->client_id == 1) {
            $data = StatusWhatsapp::orderBy('id', 'DESC')->get();
        } else {
            $data = StatusWhatsapp::where('client_id', auth()->user()->client_id)->orderBy('id', 'DESC')->get();
        }
        if (auth()->user()->client_id == 1) {
            $clients = WhatsappId::orderBy('id', 'DESC')->get();
        } else {
            $clients = WhatsappId::where('client_id', auth()->user()->client_id)->orderBy('id', 'DESC')->get();
        }
        return view('admin.statuswhatsapp.index', compact('data', 'clients'));
    }


    public function store(Request $request)
    {
        StatusWhatsapp::create([
            'client_id' => auth()->user()->client_id == 1 ? $request->client_id : auth()->user()->client_id,
            'whatsapp_id' => $request->whatsapp_id,
            'name' => $request->name,
        ]);
        toastr()->success('تم اضافه البيانات بنجاح', 'عمليه ناجحه');
        return redirect()->route('statusWhatsapp.index');
    }


    public function update(Request $request, string $id)
    {
        StatusWhatsapp::findorfail($request->id)->update([
            'client_id' => auth()->user()->client_id == 1 ? $request->client_id : auth()->user()->client_id,
            'whatsapp_id' => $request->whatsapp_id,
            'name' => $request->name,
        ]);
        toastr()->success('تم التعديل البيانات بنجاح', 'عمليه ناجحه');
        return redirect()->route('statusWhatsapp.index');
    }


    public function destroy(Request $request, string $id)
    {
        StatusWhatsapp::destroy($request->id);
        toastr()->success('تم الحذف البيانات بنجاح', 'عمليه ناجحه');
        return redirect()->route('whatsapp_id.index');
    }
}
