Hallo {{$user->nama}}
<br>
Silahkan transfer biaya admin sebesar Rp. {{number_format($nilai)}}
<br>
Ke rekening BCA (1234567890) atas nama (CV.ESponsorship Kita)
<br>
<a href="{{$url}}" style="
    text-decoration: none;
    line-height: 6;
    padding:6px 12px;
    margin:5px;
    width:100px;
    background-color: #00c292;
    border: none;
    color: white;
    box-shadow: 0 2px 5px rgba(0,0,0,.16), 0 2px 10px rgba(0,0,0,.12);
    border-radius: 5px;">
    Uploud Bukti Pembayaran
</a>