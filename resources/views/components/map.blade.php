<div class="mt-12 max-w-5xl mx-auto px-2">
    <div class="">
        <h1 class="text-2xl font-bold">오시는 길</h1>
        <p>서울특별시 양천구 목동로 213</p>
    </div>
    <div id="map" class="my-4 rounded-lg aspect-video w-full flex items-center justify-center border shadow-lg"></div>
    <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=fe9dd7241ae66dbc0aa163efbca15817"></script>
    <script>
        var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
    mapOption = { 
        center: new kakao.maps.LatLng(37.52759681049792, 126.86368533824552), // 지도의 중심좌표
        level: 3 // 지도의 확대 레벨
    };

var map = new kakao.maps.Map(mapContainer, mapOption); // 지도를 생성합니다

// 지도를 클릭한 위치에 표출할 마커입니다
var marker = new kakao.maps.Marker({ 
    // 지도 중심좌표에 마커를 생성합니다 
    position: map.getCenter() 
}); 
// 지도에 마커를 표시합니다
marker.setMap(map);
    </script>
</div>