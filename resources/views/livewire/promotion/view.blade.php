<div class="bg-slate-900">
    <div class="py-20">
        <div class="max-w-7xl mx-auto ">
            <div class="relative h-full w-full md:rounded-lg aspect-video lg:aspect-[3/1] bg-no-repeat bg-center bg-cover" style="background-image:url( {{ asset('storage/'.$promotion->img_path) }} )"></div>
            <div class="flex items-center justify-center px-2 sm:px-0">
                <div class="mt-12">
                    <h1 class="text-white text-3xl md:text-5xl font-bold">{{ $promotion->title }}</h1>
                    <div class="mt-12 p-4 bg-white rounded-lg">
                        {!! $promotion->content !!}
                    </div>
                    <div class="mt-12 flex items-center justify-center">
                        <a href="{{ route('promotion.lists') }}" class=""><span class="text-white font-bold text-xl">오디션 더보기</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-footer.web />
</div>