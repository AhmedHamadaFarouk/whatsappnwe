<!-- Modal -->
<div class="modal fade" id="editWhatsappId{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">تعديل القالب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('templates.update','test')}}" method="post" autocomplete="off">
                    @method('PATCH')
                    @csrf

                    <input type="hidden" name="id" value="{{$row->id}}">
                    <input type="hidden" name="client_id" value="{{auth()->user()->client_id}}">


                    <br>

                    <div class="row">
                        <div class="col">
                            <label>اسم القالب</label>
                            <input type="text" class="form-control" name="name" value="{{$row->name}}">
                        </div>
                    </div>

                    <br>
                    @if(auth()->user()->client_id == 1)
                        <div class="row">
                            <div class="col">
                                <label>اختر العميل </label>
                                <select class="form-control p-1" name="client_id">

                                    @foreach(App\Models\Client::get() as $client)
                                        <option value="{{$client->id}}" {{$client->id == $row->client_id ? 'selected' : null}}>{{$client->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    @endif
                    <br>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-primary">حفظ</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
