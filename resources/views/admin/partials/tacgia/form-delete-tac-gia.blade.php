<!-- BS4 MODAL: DELETE -->
<div class="modal fade" id="modalXoa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Xóa Tác Giả</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formXoa" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="hidden" name="id" id="idInput" value="" />
                    <p>
                        Bạn có chắc muốn xóa tác giả này không?
                    </p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                    <button type="submit" class="btn btn-danger">Xóa</button>
                </form>

            </div>
        </div>
    </div>
</div>