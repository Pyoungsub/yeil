<div class="bg-slate-900">
    <div class="py-20">
        <div class="max-w-7xl mx-auto">
            <div class="relative h-full w-full md:rounded-lg aspect-video lg:aspect-[3/1] bg-no-repeat bg-center bg-cover" style="background-image:url( {{ asset('storage/'.$auditions->first()->img_path) }} )">
                <div class="absolute inset-0 bg-black bg-opacity-50"></div>
                <div class="absolute inset-0 z-20 flex items-center justify-center">
                    <h1 class="text-6xl font-bold text-white">Auditions in Yeil</h1>
                </div>
            </div>
            @if(count($auditions)>0)
                <div class="mt-12 grid sm:grid-cols-2 md:grid-cols-3 gap-12 px-2 sm:px-0">
                    @foreach($auditions as $audition)
                        <a href="{{route('audition', ['id' => $audition->id, 'page' => $auditions->currentPage()])}}">
                            <div class="">
                                <div class="aspect-square bg-no-repeat bg-cover bg-center rounded-lg" style="background-image:url({{ asset('storage/'.$audition->thumbnail_path) }})"></div>
                                <div class="text-white mt-4 grid gap-2">
                                    <h1 class="text-3xl">{{$audition->agency->name}}</h1>
                                    <h1 class="text-2xl md:text-3xl font-bold">{{ $audition->description }}</h1>
                                    <h2 class="text-xl font-bold">오디션 날짜: {{ \Carbon\Carbon::parse($audition->date)->format('Y-m-d H:i') }}</h2>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            @endif
            <div class="mt-4">{{$auditions->links()}}</div>
            
        </div>
    </div>
    <x-footer.web />
</div>