<div class="pt-12 pb-4 px-2 max-w-7xl mx-auto"
    x-data="{swiper:null}"
    x-init="
        swiper = new Swiper($refs.container, {
            slidesPerView: 1.3,
            spaceBetween: 30,
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
    <div x-ref="container" class="w-full overflow-hidden">
        <div class="swiper-wrapper">
            {{--
                <div class="swiper-slide">
                    <div class="w-full rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">무제한 수업수강</h2>
                        <div class="mt-4 divide-y divide-gray-100 h-80">
                            <p class="text-white py-2 text-xl">#BASIC부터 #JAZZ #GIRLISH #HIPHOP 까지</p>
                            <p class="text-white py-2">다양한 수업체험을 통해</p>
                            <p class="text-white py-2">본인만의 스타일 완성</p>
                            <p class="text-white py-2 text-xl">강사선택권</p>
                            <p class="text-white py-2">시창 청음&이론수업</p>
                            <p class="text-white py-2">반주 악기 (피아노, 기타)</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="w-full rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-purple-500 via-30% to-pink-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">심화반</h2>
                        <div class="mt-4 divide-y divide-gray-100 h-80">
                            <p class="text-white py-2 text-xl">필수 전공수업 [주3회]</p>
                            <p class="text-white py-2">발성 1:1개인레슨 60분</p>
                            <p class="text-white py-2">입시곡 1:1개인레슨 60분</p>
                            <p class="text-white py-2">단체 발성 수업 60분</p>
                            <p class="text-white py-2 text-xl">선택수업</p>
                            <p class="text-white py-2">시창 청음 & 이론수업</p>
                            <p class="text-white py-2">반주 악기 (피아노, 기타)</p>
                        </div>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="w-full rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">특별반</h2>
                        <div class="mt-4 divide-y divide-gray-100 h-80">
                            <p class="text-white py-2 text-xl">필수 전공 수업[주3회]</p>
                            <p class="text-white py-2">원장님 1:1개인렛슨 60분</p>
                            <p class="text-white py-2">입시 특별반(소수 정예 레슨) 60분</p>
                            <p class="text-white py-2">단체 발성 수업 60분</p>
                            <p class="text-white py-2 text-xl">선택수업</p>
                            <p class="text-white py-2">시창 청음&이론수업</p>
                            <p class="text-white py-2">반주 악기 (피아노, 기타)</p>
                        </div>
                    </div>
                </div>
            --}}
            <div class="swiper-slide">
                <div class="w-full rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                    <div class="mt-4 divide-y divide-gray-100 h-80">
                        <p class="text-white py-2 text-xl">0-4</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="w-full rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-purple-500 via-30% to-pink-500 to-90%">
                    <div class="mt-4 divide-y divide-gray-100 h-80">
                        <p class="text-white py-2 text-xl">0-5</p>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="w-full rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-purple-500 via-30% to-pink-500 to-90%">
                    <div class="mt-4 divide-y divide-gray-100 h-80">
                        <p class="text-white py-2 text-xl">0-6</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>