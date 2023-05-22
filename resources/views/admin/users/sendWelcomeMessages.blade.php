<!-- Modal -->
<div class="modal fade" id="sendWelcomeMessages{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">ارسال رساله
                    ترحبيه</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('sendWelcomeMessages')}}" method="post" autocomplete="off">
                    @csrf
                    <input type="hidden" name="phone" value="{{$row->phone}}">
                    <input type="hidden" name="whatsapp_id"
                           value="{{$row->client->whatsappIdApi->whatsapp_id ?? null}}">

                    <div class="row">
                        <div class="col">
                            <label>القالب</label>
                            <select class="form-control p-1" name="template_id">
                                <option value="" disabled selected>-- اختر من القائمه --</option>
                                @foreach(App\Models\Template::where('client_id',auth()->user()->client_id)->get() as $row)
                                    <option value="{{$row->name}}">{{$row->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">ارسال</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
