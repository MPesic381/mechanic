<h3>Car Service history</h3>

<div class="table-responsive">
    <table class="table table-hover table-bordered">
        <thead>
        <tr>
            <td class="font-weight-bold" style="width: 15%">Serviced at</td>
            <td class="font-weight-bold">Service</td>
            <td class="font-weight-bold" style="width: 20%">Kilometrage</td>
        </tr>
        </thead>
        <tbody>
            @foreach($works as $work)
                <tr>
                    <td>{{ $work->serviced_at }}</td>
                    <td>{{ $work->service->name }}</td>
                    <td>{{ $work->kilometrage }} kilometers</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>