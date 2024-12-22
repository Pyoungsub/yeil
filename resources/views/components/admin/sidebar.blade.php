<div class="fixed mt-20 bg-gray-50 p-2">
    <ul class="p-2 rounded border">
        <li>예약문의</li>
        <li>
            <a href="{{route('admin.lessons')}}">사이트관리</a>
        </li>
        <li>
            <a href="{{route('admin.audition')}}">오디션관리</a>
            <ul>
                <li><a href="{{route('admin.audition.add')}}">-오디션등록</a></li>
            </ul>
        </li>
    </ul>
</div>