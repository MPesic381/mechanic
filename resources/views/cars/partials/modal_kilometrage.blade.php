<!-- Modal -->
<div class="modal fade" id="modalKilometrage" tabindex="-1" role="dialog" aria-labelledby="modalKilometrageLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post" id="updateKilometrageForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalKilometrageLabel">Enter kilometrage for this car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="kilometrage" class="form-control">
                    </div>
                    <div class="form-group" id="form-info"></div>
                </div>
                <div class="modal-footer">
                        <div class="form-group">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary" id="submitKilometrage">Submit</button>
                        </div>
                </div>
            </form>
        </div>
    </div>
</div>