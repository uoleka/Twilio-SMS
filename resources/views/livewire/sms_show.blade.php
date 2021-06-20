<div>
    <table>
        <tr>
           <th>Message</th>
           <th>From</th>
           <th>Status</th> 
        </tr>
        @foreach ($smss as $sms)
        <tr>
            <td>{{$sms->details}}</td>
            <td>{{$sms->phone_number}}</td>
            <td>{{$sms->status}}</td>
        </tr>
        @endforeach
    
    </table>
    {{ $smss->links() }}
</div>
