<section class="px-4 sm:px-6 lg:px-4 xl:px-6 pt-4 pb-4 sm:pb-6 lg:pb-4 xl:pb-6 space-y-4">
  <header class="flex items-center justify-between">
    <h2 class="text-lg leading-6 font-medium text-black">SMS Status</h2>
    
  </header>
<div class="bg-white dark:bg-gray-800 rounded-tl-xl sm:rounded-t-xl p-4 pb-6 sm:p-8 lg:p-10 lg:pb-6 xl:p-8 space-y-6 sm:space-y-8 lg:space-y-6 xl:space-y-8">
    <table class="border-separate border">
        <thead>
            <tr>
            <th class="border border-green-600 ...">Message</th>
            <th class="border border-green-600 ...">From</th>
            <th class="border border-green-600 ...">Status</th> 
            </tr>
        </head> 
        <tbody>
            @foreach ($smss as $sms)
            <tr>
                <td class="border border-green-600 ...">{{$sms->details}}</td>
                <td class="border border-green-600 ...">{{$sms->phone_number}}</td>
                <td class="border border-green-600 ...">{{$sms->status}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $smss->links() }}
</div>
<section>