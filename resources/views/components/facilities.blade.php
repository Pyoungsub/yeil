<div class="pt-12 pb-4 px-2 max-w-7xl mx-auto"
    x-data="{swiper:null}"
    x-init="
        swiper = new Swiper($refs.container, {
            slidesPerView: 1.3,
            spaceBetween: 30,
        });
    "
>
    <div x-ref="container" class="w-full overflow-hidden">
        <div class="swiper-wrapper">
            @foreach($facilities as $facility)
                <div class="swiper-slide">
                    <div class="w-full aspect-square sm:aspect-video rounded-xl">
                        <div class="mt-4 divide-y divide-gray-100 w-full h-full bg-cover bg-no-repeat bg-center p-8bg-cover bg-no-repeat bg-center p-8" style="background-image:url({{asset('storage/'.$facility->img_path)}})"></div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>