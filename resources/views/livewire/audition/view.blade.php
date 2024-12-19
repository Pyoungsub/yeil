<div class="bg-slate-900">
    <div class="py-20">
        <div class="max-w-7xl mx-auto ">
            <div class="relative h-full w-full md:rounded-lg aspect-video lg:aspect-[3/1] bg-no-repeat bg-center bg-cover" style="background-image:url( {{ asset('storage/'.$audition->img_path) }} )"></div>
            <div class="flex items-center justify-center px-2 sm:px-0">
                <div class="mt-12">
                    <h1 class="text-white text-5xl font-bold">{{ $audition->description }}</h1>
                    <h2 class="text-white mt-4 text-2xl font-bold">오디션 날짜: {{ \Carbon\Carbon::parse($audition->date)->format('Y-m-d H:i') }}</h2>
                    <div class="mt-12 p-4 bg-white rounded-lg">
                        {!! $audition->content !!}
                    </div>
                    <div class="mt-12 flex items-center justify-center">
                        <a href="{{ route('audition.lists', ['id' => $currentPage]) }}" class=""><span class="text-white font-bold text-xl">오디션 더보기</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <x-footer.web />
</div>