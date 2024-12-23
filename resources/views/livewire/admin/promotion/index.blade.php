<div class="">
    <x-admin.sidebar />
    <div class="pt-12 max-w-7xl mx-auto">
        <div class="pt-8 w-lg">
            <div class="mt-4">
                <h1>프로모션 리스트</h1>
            </div>
            @if(count($promotions)>0)
                <div class="w-5xl">
                    @foreach($promotions as $promotion)
                        <div class="w-full flex items-center gap-4">
                            <a href="{{route('promotion', ['id' => $promotion->id])}}" class="flex-none w-32 aspect-square bg-cover bg-center bg-no-repeat" style="background-image:url({{asset('storage/'.$promotion->img_path)}})"></a>
                            <p class="">{{$promotion->title}}</p>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</div>