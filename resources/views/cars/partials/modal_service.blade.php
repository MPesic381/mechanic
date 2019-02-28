<!-- Modal -->
<div class="modal fade" id="modalService" tabindex="-1" role="dialog" aria-labelledby="modalServiceLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="#" method="post" id="updateKilometrageForm">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalServiceLabel">Enter kilometrage for this car</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <td class="font-weight-bold">Service</td>
                                <td class="font-weight-bold" style="width: 20%">Kilometrage</td>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($services as $service)
                                    <tr>
                                        <td>{{ $service->service->name }}</td>
                                        <td>{{ $service->kilometrage }}kilometers</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>