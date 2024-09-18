<div class="">
    {{--
        <x-youtube-banner source="{{ asset('storage/video/7cf4958d5002916a5141c3b18de475d8.mp4') }}"></x-youtube-banner>
        <p>{{$lesson->lesson_ko}}</p>
        <div class="grid sm:grid-cols-3 max-w-5xl mx-auto p-2 gap-2">
            @foreach($lesson->purposes as $purpose)
                
            @endforeach
            <a href="{{ route('purposes', ['lesson' => 'vocal', 'purpose' => 'exam']) }}">
                <div class="relative overflow-hidden rounded-2xl border w-full aspect-square bg-cover bg-no-repeat bg-center p-8" style="background-image:url({{asset('storage/company/7cf4958d5002916a5141c3b18de475d8.png')}})">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative z-10 text-white">
                        <h2 class="text-3xl font-bold text-white">입시</h2>
                    </div>
                </div>
            </a>
            <a href="{{ route('purposes', ['lesson' => 'vocal', 'purpose' => 'audition']) }}">
                <div class="relative overflow-hidden rounded-2xl border w-full aspect-square bg-cover bg-no-repeat bg-center p-8" style="background-image:url({{asset('storage/company/b5ddcf24994ec180759dcc6e85f2a5d9.png')}})">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative z-10 text-white">
                        <h2 class="text-3xl font-bold text-white">오디션</h2>
                    </div>
                </div>
            </a>
            <a href="{{ route('purposes', ['lesson' => 'vocal', 'purpose' => 'pastime']) }}">
                <div class="relative overflow-hidden rounded-2xl border w-full aspect-square bg-cover bg-no-repeat bg-center p-8" style="background-image:url({{asset('storage/company/4706a49ad4ef16afa68cdf18ea718422.jpg')}})">
                    <div class="absolute inset-0 bg-black opacity-50"></div>
                    <div class="relative z-10 text-white">
                        <h2 class="text-3xl font-bold text-white">취미</h2>
                    </div>
                </div>
            </a>
        </div>
        <livewire:components.apply />
    --}}
    <div class="">
        <div class="relative h-full w-full aspect-[9/16] md:aspect-video">
            <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-black">
                <p class="font-bold text-3xl text-white">{{$lesson->lesson_ko}}-0</p>
            </div>
        </div>
    </div>
    <div class="grid sm:grid-cols-3 max-w-5xl mx-auto p-2 gap-2">
        @foreach($lesson->purposes as $purpose)
            <a href="{{ route('purposes', ['lesson' => $lesson->lesson, 'purpose' => $purpose->purpose]) }}">
                <div class="relative overflow-hidden rounded-2xl border w-full aspect-square bg-cover bg-no-repeat bg-center p-8 text-white" style="background-image:url({{asset('storage/company/7cf4958d5002916a5141c3b18de475d8.png')}})">
                    <h2 class="text-3xl font-semibold text-white">{{$purpose->purpose_ko}}</h2>
                </div>
            </a>
        @endforeach
    </div>
</div>
