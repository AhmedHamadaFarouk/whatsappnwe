<!-- Modal -->
<div class="modal fade" id="createNewWhatsappId" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">اضافه القالب</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('templates.store')}}" method="post" autocomplete="off">
                    @csrf


                    <br>

                    <div class="row">
                        <div class="col">
                            <label>اسم القالب ( ويجب ان يكون مطابق بنفس الاسم في الفيس بوك)</label>
                            <input type="text" class="form-control" name="name" required placeholder="hello_world">
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
