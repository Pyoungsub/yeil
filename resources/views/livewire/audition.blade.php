<div class="mt-8 bg-black">
    @if(count($auditions) > 0)
        <div class="py-12 px-2 max-w-5xl mx-auto"
            x-data="{swiper:null}"
            x-init="
                swiper = new Swiper($refs.container, {
                    slidesPerView: 1.3,
                    spaceBetween: 50,
                    pagination: {
                        el: '.swiper-pagination',
                        dynamicBullets: true,
                        clickable: true
                    },
                    breakpoints: {
                        640: { // sm breakpoint
                            slidesPerView: 1.5,
                            spaceBetween: 30,
                        },
                        768: { // md breakpoint
                            slidesPerView: 2.3,
                            spaceBetween: 40,
                        },
                        1024: { // lg breakpoint
                            slidesPerView: 2.5,
                            spaceBetween: 50,
                        },
                        1280: { // xl breakpoint
                            slidesPerView: 3.3,
                            spaceBetween: 60,
                        },
                        1536: { // 2xl breakpoint
                            slidesPerView: 3.5,
                            spaceBetween: 70,
                        }
                    },
                });
            "
        >
            <h1 class="font-bold py-2 text-2xl text-white">기획사 오디션</h1>
            <div x-ref="container" class="swiper w-full overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach($auditions as $audition)
                        <div class="swiper-slide">
                            <div class="">
                                <div class="relative w-full aspect-square rounded-xl">
                                    <h2 class="absolute top-4 left-0 text-2xl font-bold bg-black/30 text-white rounded-sm px-1"></h2>
                                    <div class="rounded-lg mt-4 divide-y divide-gray-100 w-full h-full bg-cover bg-no-repeat bg-center p-8bg-cover bg-no-repeat bg-center p-8" style="background-image:url({{asset('storage/'.$audition->audition->thumbnail_path)}})"></div>
                                </div>
                                <a href="{{route('audition', ['id' => $audition->audition->id])}}" class="">
                                    <button class="mt-4 bg-indigo-600 text-white text-sm leading-6 font-medium py-2 px-3 rounded-lg">더 알아보기</button>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    @endif
</div>