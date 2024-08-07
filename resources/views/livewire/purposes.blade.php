<div>
    {{--
        <x-youtube-banner source="{{ asset('storage/video/7cf4958d5002916a5141c3b18de475d8.mp4') }}"></x-youtube-banner>
            <div class="pt-12 pb-4 px-2 bg-black max-w-7xl mx-auto"
                x-data="{swiper:null}"
                x-init="
                    swiper = new Swiper($refs.container, {
                        slidesPerView: 1.3,
                        spaceBetween: 30,
                        breakpoints: {
                            640: {
                            spaceBetween: 60,
                                slidesPerView: 2.3,
                            },
                            768: {
                                slidesPerView: 2.3,
                            },
                            1024: {
                                slidesPerView: 3.3,
                            },
                            1450: {
                                slidesPerView: 4,
                            }
                        },
                    });
                "
            >
                <div x-ref="container" class="w-full overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="w-sm rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                                <h2 class="mt-4 text-white font-semibold text-2xl">기초반</h2>
                                <div class="mt-4 divide-y divide-gray-100 h-80">
                                    <p class="text-white py-2 text-xl">필수 전공수업 [주2회]</p>
                                    <p class="text-white py-2">단체 발성 수업 60분</p>
                                    <p class="text-white py-2 text-xl">선택수업</p>
                                    <p class="text-white py-2">시창 청음&이론수업</p>
                                    <p class="text-white py-2">반주 악기 (피아노, 기타)</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="w-sm rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-purple-500 via-30% to-pink-500 to-90%">
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
                            <div class="w-sm rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
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
                    </div>
                </div>
            </div>
            <div class="pt-12 pb-4 px-2 bg-black max-w-7xl mx-auto"
                x-data="{swiper:null}"
                x-init="
                    swiper = new Swiper($refs.instructors, {
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
                <h1 class="text-white text-2xl font-semibold">예일만의 커리큘럼</h1>
                <div x-ref="instructors" class="mt-4 w-full overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="w-full rounded-xl aspect-square p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                                <h2 class="mt-4 text-white font-semibold text-2xl">합격자 장학금 수여</h2>
                                <div class="mt-4 h-64">
                                    <p class="text-white py-2 text-xl">합격에 장학금까지</p>
                                    <p class="text-white py-2">예고, 예대 합격자 장학금 지원</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="w-full rounded-xl aspect-square p-4 bg-gradient-to-b from-indigo-500 from-10% via-purple-500 via-30% to-pink-500 to-90%">
                                <h2 class="mt-4 text-white font-semibold text-2xl">개별 방음 연습실</h2>
                                <div class="mt-4 h-64">
                                    <p class="text-white py-2 text-xl">최고의 연습환경</p>
                                    <p class="text-white py-2">방음 개인연습실 제공</p>
                                    <p class="text-white py-2">주말 일요일 이용가능</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="w-full rounded-xl aspect-square p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                                <h2 class="mt-4 text-white font-semibold text-2xl">1:1 담임배정</h2>
                                <div class="mt-4 h-64">
                                    <p class="text-white py-2 text-xl">입시까지 함께뛰자!!</p>
                                    <p class="text-white py-2">단순한 보컬레슨을 넘어선 섬세한 개인 서포트</p>
                                    <p class="text-white py-2">#연습일정 관리 입시 #학사 일정 체크</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="w-full rounded-xl aspect-square p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                                <h2 class="mt-4 text-white font-semibold text-2xl">입시생 문제점 체크</h2>
                                <div class="mt-4 h-64">
                                    <p class="text-white py-2 text-xl">노래가 안되는 나만의 이유!</p>
                                    <p class="text-white py-2">발성, 호흡, 발음, 자세, 입시생만의 개별 문제점 분석</p>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="w-full rounded-xl aspect-square p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                                <h2 class="mt-4 text-white font-semibold text-2xl">분기별 모의평가</h2>
                                <div class="mt-4 h-64">
                                    <p class="text-white py-2 text-xl">모의 입시현장 체험</p>
                                    <p class="text-white py-2">실제 입시장과 같은 입시현장 체험수업</p>
                                    <p class="text-white py-2">#자신감 향상</p>
                                    <p class="text-white py-2">#현역 서공예&#183;한림 선생님 모니터링</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <x-tuitions />
            <x-passed />
            <p>신입생모집</p>
            <x-swiper></x-swiper>
            <x-footer.mobile-contact />
    --}}
    <div class="">
        <div class="relative h-full w-full aspect-[9/16] md:aspect-video">
            <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-black">
                <p class="font-bold text-3xl text-white">{{$lesson->id}}-{{$purpose->id}}-0</p>
            </div>
        </div>
    </div>
    <div class="pt-12 pb-4 px-2 bg-black max-w-7xl mx-auto"
        x-data="{swiper:null}"
        x-init="
            swiper = new Swiper($refs.container, {
                slidesPerView: 1.3,
                spaceBetween: 30,
                breakpoints: {
                    640: {
                    spaceBetween: 60,
                        slidesPerView: 2.3,
                    },
                    768: {
                        slidesPerView: 2.3,
                    },
                    1024: {
                        slidesPerView: 3.3,
                    },
                    1450: {
                        slidesPerView: 4,
                    }
                },
            });
        "
    >
        <div x-ref="container" class="w-full overflow-hidden">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="w-sm rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">{{$lesson->id}}-{{$purpose->id}}-1-1</h2>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="w-sm rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-purple-500 via-30% to-pink-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">{{$lesson->id}}-{{$purpose->id}}-1-2</h2>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="w-sm rounded-xl p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">{{$lesson->id}}-{{$purpose->id}}-1-3</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="pt-12 pb-4 px-2 bg-black max-w-7xl mx-auto"
        x-data="{swiper:null}"
        x-init="
            swiper = new Swiper($refs.instructors, {
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
        <h1 class="text-white text-2xl font-semibold">예일만의 커리큘럼</h1>
        <div x-ref="instructors" class="mt-4 w-full overflow-hidden">
            <div class="swiper-wrapper">
                <div class="swiper-slide">
                    <div class="w-full rounded-xl aspect-square p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">{{$lesson->id}}-{{$purpose->id}}-2-1</h2>
                        
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="w-full rounded-xl aspect-square p-4 bg-gradient-to-b from-indigo-500 from-10% via-purple-500 via-30% to-pink-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">{{$lesson->id}}-{{$purpose->id}}-2-2</h2>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="w-full rounded-xl aspect-square p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">{{$lesson->id}}-{{$purpose->id}}-2-3</h2>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="w-full rounded-xl aspect-square p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">{{$lesson->id}}-{{$purpose->id}}-2-4</h2>
                    </div>
                </div>
                <div class="swiper-slide">
                    <div class="w-full rounded-xl aspect-square p-4 bg-gradient-to-b from-indigo-500 from-10% via-sky-500 via-30% to-emerald-500 to-90%">
                        <h2 class="mt-4 text-white font-semibold text-2xl">{{$lesson->id}}-{{$purpose->id}}-2-5</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-tuitions lesson="{{$lesson->id}}" purpose="{{$purpose->id}}" />
    <x-passed lesson="{{$lesson->id}}" purpose="{{$purpose->id}}" />
    <p>신입생모집</p>
    <x-swiper></x-swiper>
    <x-footer.mobile-contact />
</div>
