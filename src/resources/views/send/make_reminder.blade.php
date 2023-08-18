<p>{{$reserveData->user->name}}様</p>

<p>ご予約いただいておりました、飲食店のご予約が近づいてきましたのでご連絡いたします。</p>
<table>
    <tr>
        <th>店舗名</th> 
        <th>時間</th>
        <th>人数</th>
    </tr>
    <tr>
        <td>{{$reserveData->shop->name}}</td> 
        <td>{{$reserveData->time}}～</td>
        <td>{{$reserveData->num_of_guest}}名様</td>
    </tr>
</table>
<p>よろしくお願いいたします。</p>