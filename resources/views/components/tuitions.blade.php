<div class="pt-12 pb-4 px-2 bg-black max-w-7xl mx-auto"
    x-data="{swiper:null}"
    x-init="
        swiper = new Swiper($refs.tuitions, {
            slidesPerView: 1.3,
            spaceBetween: 60,
            breakpoints: {
                550:{
                    spaceBetween: 30,
                    slidesPerView: 1.5,
                },
                785: {
                    slidesPerView: 2.5,
                },
                1024: {
                    slidesPerView: 3.2,
                },
                1200: {
                    slidesPerView: 3.5,
                },
            },
        });
    "
>
    <h1 class="text-white text-2xl font-semibold">최고의 강사진</h1>
    <div x-ref="tuitions" class="mt-4 w-full overflow-hidden">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="w-80 rounded-xl aspect-square p-4 bg-cover bg-center bg-no-repeat" style="background-image:url({{asset('storage/tuitions/yeilima-b-001.jpg')}})"></div>
            </div>
            <div class="swiper-slide">
                <div class="w-80 rounded-xl aspect-square p-4 bg-cover bg-center bg-no-repeat" style="background-image:url({{asset('storage/tuitions/yeilima-b-002.jpg')}})"></div>
            </div>
            <div class="swiper-slide">
                <div class="w-80 rounded-xl aspect-square p-4 bg-cover bg-center bg-no-repeat" style="background-image:url({{asset('storage/tuitions/yeilima-b-003.jpg')}})"></div>
            </div>
            <div class="swiper-slide">
                <div class="w-80 rounded-xl aspect-square p-4 bg-cover bg-center bg-no-repeat" style="background-image:url({{asset('storage/tuitions/yeilima-b-004.jpg')}})"></div>
            </div>
            <div class="swiper-slide">
                <div class="w-80 rounded-xl aspect-square p-4 bg-cover bg-center bg-no-repeat" style="background-image:url({{asset('storage/tuitions/yeilima-b-005.jpg')}})"></div>
            </div>
            <div class="swiper-slide">
                <div class="w-80 rounded-xl aspect-square p-4 bg-cover bg-center bg-no-repeat" style="background-image:url({{asset('storage/tuitions/yeilima-b-006.jpg')}})"></div>
            </div>
        </div>
    </div>
</div>