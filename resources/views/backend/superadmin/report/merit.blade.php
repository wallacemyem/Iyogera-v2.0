@if (isset($students))
    @if (count($students) > 0)
       

<div class="row justify-content-md-center">
    <div class="col-md-4 mt-2">
        <div class="card text-white bg-secondary">
            <div class="card-body">
                <div class="toll-free-box text-center">
                    <h4> <i class="mdi mdi-border-left"></i> {{ translate('report_sheet') }}</h4>
                    <h5>{{ translate('generated') }}</h5>
                    <h5>{{ translate('successfully') }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>

    @else
        <div style="text-align: center;">
                <img src="{{ asset('backend/images/no-data.png') }}" alt="" class="empty-box">
                <p>{{ translate('no_student_found') }}</p>
        </div>
    @endif
@else
<div style="text-align: center;">
        <img src="{{ asset('backend/images/no-data.png') }}" alt="" class="empty-box">
        <p>{{ translate('no_data_found') }}</p>
</div>
@endif
