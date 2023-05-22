<!-- Modal -->
<div class="modal fade" id="createNewWhatsappId" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">اضافه رقم تعريفي</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('statusWhatsapp.store')}}" method="post" autocomplete="off">
                    @csrf


                    <div class="row">
                        <div class="col">
                            <label>رقم التعريفي للواتس اب</label>
                          <select class="form-control p-1" name="whatsapp_id" required>
                              <option value="" disabled selected>-- اختر من القائمه --</option>
                              @foreach($clients as $client)
                                  <option value="{{$client->id}}">{{$client->whatsapp_id}}</option>
                              @endforeach
                          </select>
                        </div>
                    </div>

                    <br>

                    <div class="row">
                        <div class="col">
                            <label>اسم الحاله</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                    </div>

                    <br>

                    @if(auth()->user()->client_id == 1)
                        <div class="row">
                            <div class="col">
                                <label>اختر العميل </label>
                                <select class="form-control p-1" name="client_id">
                                    <option value="" disabled selected>-- اختر من القائمه --</option>
                                    @foreach(App\Models\Client::get() as $row)
                                        <option value="{{$row->id}}">{{$row->name}}</option>
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
