<div>
    @foreach ($sms_details as $sms_detail)
        @include('includes.$sms_details', $sms_details)
    @endforeach
</div>
