
<div class="">
    <x-youtube-banner source="{{ asset('storage/video/e0adab8560fbe2f0111a5763ca9182f0.mp4') }}"></x-youtube-banner>
    <x-courses />
    <x-facilities />
    <x-instagram />
    <div class="mt-12 max-w-xl mx-auto grid gap-12">
        <div id="map" class="aspect-video w-full flex items-center justify-center"></div>
        <script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=fe9dd7241ae66dbc0aa163efbca15817"></script>
        <script>
            var container = document.getElementById('map');
            var options = {
                center: new kakao.maps.LatLng(33.450701, 126.570667),
                level: 3
            };

            var map = new kakao.maps.Map(container, options);
        </script>
    </div>
</div>