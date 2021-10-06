

<!-- Modal -->
<div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <form id="formulary" class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel"> <span id="title"></span> Hubspot</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input name="contactId" type="number" hidden id="contactId">
                <div class="col-row">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="example@example.com">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Nombre</label>
                        <input name="firstname" type="text" class="form-control" id="firstname" placeholder="nombre">
                    </div>
                    <div class="form-group">
                        <label for="firstname">Apellidos</label>
                        <input name="lastname" type="text" class="form-control" id="lastname" placeholder="apellidos">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </form>
</div>