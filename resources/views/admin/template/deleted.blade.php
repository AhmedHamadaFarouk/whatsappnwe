<!-- Modal -->
<div class="modal fade" id="deletedWhatsappId{{$row->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" style="font-family: 'Cairo', sans-serif;" id="exampleModalLabel">حذف </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('templates.destroy','test')}}" method="post" autocomplete="off">
                    @method('DELETE')
                    @csrf

                    <input type="hidden" name="id" value="{{$row->id}}">
                    <input type="hidden" name="client_id" value="{{auth()->user()->client_id}}">

                    <div class="row">
                        <div class="col">
                            <label>هل انت متأكد من عمليه الحذف ؟</label>
                            <input type="text" class="form-control" name="name" readonly value="{{$row->name}}">
                        </div>
                    </div>



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
