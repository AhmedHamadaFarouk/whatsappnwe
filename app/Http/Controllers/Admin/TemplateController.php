<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (auth()->user()->client_id == 1) {
            $data = Template::orderBy('id', 'DESC')->get();
        } else {
            $data = Template::where('client_id', auth()->user()->client_id)->orderBy('id', 'DESC')->get();
        }
        return view('admin.template.index', compact('data'));
    }


    public function store(Request $request)
    {
        Template::create([
            'client_id' => auth()->user()->client_id == 1 ? $request->client_id : auth()->user()->client_id,
            'name' => $request->name,
        ]);
        toastr()->success('تم اضافه البيانات بنجاح', 'عمليه ناجحه');
        return redirect()->route('templates.index');
    }


    public function update(Request $request, string $id)
    {
        Template::findorfail($request->id)->update([
            'client_id' => auth()->user()->client_id == 1 ? $request->client_id : auth()->user()->client_id,
            'name' => $request->name,
        ]);
        toastr()->success('تم التعديل البيانات بنجاح', 'عمليه ناجحه');
        return redirect()->route('templates.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        Template::destroy($request->id);
        toastr()->success('تم الحذف البيانات بنجاح', 'عمليه ناجحه');
        return redirect()->route('templates.index');
    }
}
