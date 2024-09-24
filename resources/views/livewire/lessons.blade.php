<div class="">
    <x-youtube-banner source="{{ asset('storage/video/7cf4958d5002916a5141c3b18de475d8.mp4') }}"></x-youtube-banner>
    <div class="py-8 grid sm:grid-cols-3 max-w-5xl mx-auto p-2 gap-2">
        @foreach($lesson->purposes as $purpose)
            <a href="{{ route('purposes', ['lesson' => $lesson->lesson, 'purpose' => $purpose->purpose]) }}">
                <div class="relative overflow-hidden rounded-2xl border w-full aspect-square bg-cover bg-no-repeat bg-center p-8 text-white" style="background-image:url({{asset('storage/company/7cf4958d5002916a5141c3b18de475d8.png')}})">
                    <h2 class="text-3xl font-semibold text-white">{{$purpose->purpose_ko}}</h2>
                    @auth
                        @if(auth()->user()->admin)
                            <button class="">수정</button>
                        @endif
                    @endauth
                </div>
            </a>
        @endforeach
    </div>
    <x-footer.web />
</div>
