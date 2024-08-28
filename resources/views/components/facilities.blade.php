<div class="pt-12 pb-4 px-2 max-w-5xl mx-auto"
    x-data="{swiper:null}"
    x-init="
        swiper = new Swiper($refs.container, {
            pagination: {
                el: '.swiper-pagination',
                dynamicBullets: true,
                clickable: true
            },
        });
    "
>
    <h1 class="text-2xl font-bold">시설소개</h1>
    <div x-ref="container" class="swiper w-full overflow-hidden">
        <div class="swiper-wrapper">
            @foreach($facilities as $facility)
                <div class="swiper-slide">
                    <div class="relative w-full aspect-square sm:aspect-video rounded-xl">
                        <h2 class="absolute bottom-0 right-0 p-4 text-2xl font-bold text-white">{{ $facility->description }}</h2>
                        <div class="rounded-lg mt-4 divide-y divide-gray-100 w-full h-full bg-cover bg-no-repeat bg-center p-8bg-cover bg-no-repeat bg-center p-8" style="background-image:url({{asset('storage/'.$facility->img_path)}})"></div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="swiper-pagination"></div>
    </div>
</div>
<style>

    /* Change the color of the active pagination dot */
    .swiper-pagination-bullet-active {
        background-color: #fff !important;
    }

    /* Example to adjust the size of the pagination dots */
    .swiper-pagination-bullet {
        width: 12px;
        height: 12px;
        margin: 0 12px; /* Custom margin for spacing */
    }
</style>