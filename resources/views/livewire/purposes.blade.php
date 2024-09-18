<div>
    <div class="">
        <div class="relative h-full w-full aspect-[9/16] md:aspect-video">
            <div class="absolute top-0 left-0 w-full h-full flex items-center justify-center bg-black">
                <p class="font-bold text-3xl text-white">{{$lesson->id}}-{{$purpose->id}}-0</p>
            </div>
        </div>
    </div>
    <div class="pt-12">
        <div 
            x-data="{ show: false }"
            x-intersect.half="show = true"
            x-intersect:leave="show = false"
            class="py-4 px-2 max-w-fit mx-auto"
        >
            <h1 
                x-show="show"
                x-transition:enter="transform transition ease-out duration-500"
                x-transition:enter-start="-translate-x-full opacity-0"
                x-transition:enter-end="translate-x-0 opacity-100"
                x-transition:leave="transform transition ease-in duration-300"
                x-transition:leave-start="translate-x-0 opacity-100"
                x-transition:leave-end="-translate-x-full opacity-0"
                class="text-2xl font-semibold relative overflow-hidden after:top-4 after:absolute after:content-[''] after:w-full after:h-0.5 after:bg-black"
            >{{$purpose->purpose_ko}}</h1>
            <div class="mt-4 grid sm:grid-cols-2 lg:flex gap-2">
                @foreach($purpose->schedules->groupBy('day_id') as $day_id => $schedules)
                    <div class="flex sm:grid gap-4">
                        <h3 class="p-4 bg-black rounded-lg text-white text-2xl font-semibold">{{ $schedules->first()->day->ko }}</h3>
                        <div class="p-2">
                            @foreach($schedules->sortBy('from') as $schedule)
                                <p class="">
                                    <span class="text-gray-500">{{ $schedule->from }} ~ {{ $schedule->to }}</span> <span class="font-semibold">{{ $schedule->subject->subject }}</span>
                                </p>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="mt-8">
                @auth
                    <div class="w-full"
                        x-data="{ 
                            show: false, 
                        }"
                    >
                        <button class="w-full bg-black text-white py-2 rounded" @click="show = true">수강료 알아보기</button>
                        <div
                            
                            x-on:close.stop="show = false"
                            x-on:keydown.escape.window="show = false"
                            x-show="show"
                            id="schedule"
                            class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
                            style="display: none;"
                        >
                            <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0"
                                            x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            <div x-show="show" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:w-full sm:max-w-sm sm:mx-auto"
                                x-trap.inert.noscroll="show"
                                x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                                <div class="px-6 py-4">
                                    <div class="text-2xl font-bold text-gray-900">
                                        예일아카데미
                                    </div>
                                    <div class="mt-4 text-sm text-gray-600">
                                        @foreach($purpose->groups as $group)
                                            <div class="">
                                                <h3 class="font-bold text-lg">{{ $group->group_ko }}</h3>
                                                <div class="grid gap-2">
                                                    @foreach($group->parts as $part)
                                                        <div class="border p-2">
                                                            <div class="flex items-center gap-2">
                                                                <span>{{ $part->part_ko }}</span>
                                                                <span>{{ $part->description }}</span>
                                                                <span>{{ number_format($part->price) }}원</span>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach  
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="w-full"
                        x-data="{
                            show:false,
                        }"
                    >
                        <button class="w-full bg-black text-white py-2 rounded" @click="show = true">수강료 알아보기</button>
                        <div
                            x-on:close.stop="show = false"
                            x-on:keydown.escape.window="show = false"
                            x-show="show"
                            id=""
                            class="jetstream-modal fixed inset-0 overflow-y-auto px-4 py-6 sm:px-0 z-50"
                            style="display: none;"
                        >
                            <div x-show="show" class="fixed inset-0 transform transition-all" x-on:click="show = false" x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0"
                                            x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100"
                                            x-transition:leave-end="opacity-0">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                            </div>
                            <div x-show="show" class="mb-6 bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-sm sm:w-full sm:mx-auto"
                                x-trap.inert.noscroll="show"
                                x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                            >
                                <div class="px-6 py-4">
                                    <div class="text-lg font-medium text-gray-900">
                                        
                                    </div>
                                    <div class="mt-4 text-sm text-gray-600">
                                        <a class="" href="{{route('kakao.login')}}">
                                            <button class="bg-yellow-300 rounded-lg p-3 font-bold">카카오 로그인</button>
                                        </a>        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endauth
            </div>
        </div>
    </div>
    <div class="mt-12 bg-black  py-12">
        <div class="hidden sm:block max-w-4xl mx-auto">
            <h1 class="text-2xl font-semibold text-white">예일배출 아이돌</h1>
            <div class="mt-4 grid grid-cols-3 gap-4">
                <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/wwY0AwqjQG4?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist=wwY0AwqjQG4" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/3JqHLZylfvU?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist=3JqHLZylfvU" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/fXCJW2J8ttY?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist=fXCJW2J8ttY" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="sm:hidden px-2 max-w-7xl mx-auto"
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
            <h1 class="text-2xl font-semibold text-white">예일배출 아이돌</h1>
            <div x-ref="container" class="mt-4 w-full overflow-hidden">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/wwY0AwqjQG4?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist=wwY0AwqjQG4" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="swiper-slide">
                        <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/3JqHLZylfvU?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist=3JqHLZylfvU" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                    <div class="swiper-slide">
                        <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/fXCJW2J8ttY?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist=fXCJW2J8ttY" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12 px-2 max-w-7xl mx-auto">        
        <div class="grid sm:grid-cols-3 gap-8">
            @foreach($purpose->curricula as $curriculum)
                <div class="relative rounded-lg p-4 bg-gray-50">
                    @auth
                        @if(auth()->user()->admin)
                            <button wire:click="modify({{$curriculum->id}})" class="absolute px-2 py-1 top-0 right-0 rounded-lg bg-white border"> {{__('수정')}} </button>
                        @endif
                    @endauth
                    <img src="{{ asset('storage/'.$curriculum->img_path) }}" alt="{{ $curriculum->title }}" class="mt-4 rounded-lg w-full aspect-square object-cover">
                    <h2 class="mt-4 text-slate-700 font-base text-3xl text-center">{{ $curriculum->title }}</h2>
                    <h3 class="mt-4 text-slate-700 font-light text-lg text-center">{{ $curriculum->sub_title }}</h3>
                </div>
            @endforeach
        </div>
        @auth
            @if(auth()->user()->admin)
                @if(count($purpose->curricula) < 3)
                    <button wire:click="addCurriculum" class="mt-4 px-2 py-1 font-semibold rounded border">커리큘럼 추가</button>
                @endif
                <div class=""
                    x-data="{
                        title:$wire.entangle('title'),
                        sub_title:$wire.entangle('sub_title'),
                        photoName: null, 
                        photoPreview: $wire.entangle('photoPreview')
                    }"
                >
                    <x-dialog-modal wire:model.live="curriculumModal">
                        <x-slot name="title">
                            <h1 class="font-bold">{{ __('커리큘럼 관리') }}</h1>
                        </x-slot>
                        <x-slot name="content">
                            <div class="grid sm:grid-cols-2 gap-8">
                                <div class="">
                                    <x-label for="title" value="제목" />
                                    <x-input id="title" type="text" x-model="title" class="w-full" />
                                    <x-label class="mt-2" for="sub_title" value="부제목" />
                                    <x-input id="sub_title" type="text" x-model="sub_title" class="w-full" />
                                    <!-- Profile Photo File Input -->
                                    <input type="file" id="photo" class="hidden"
                                        wire:model.live="photo"
                                        x-ref="photo"
                                        x-on:change="
                                            photoName = $refs.photo.files[0].name;
                                            const reader = new FileReader();
                                            reader.onload = (e) => {
                                                photoPreview = e.target.result;
                                            };
                                            reader.readAsDataURL($refs.photo.files[0]);
                                        "
                                    />
                                    <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                        {{ __('새 사진 선택') }}
                                    </x-secondary-button>
                                    @if ($img_path)
                                        <x-secondary-button type="button" class="mt-2" wire:click="deletePhoto">
                                            {{ __('사진삭제') }}
                                        </x-secondary-button>
                                    @endif
                                </div>
                                <div class="">
                                    <div class="rounded-lg bg-gray-50 p-4">
                                        <!-- Current Profile Photo -->
                                        <div class="" x-show="!photoPreview">
                                            @if($img_path)
                                                <img src="{{ asset('storage/'.$img_path) }}" alt="{{ $purpose->purpose }}" class="rounded w-full max-w-sm aspect-square object-cover">
                                            @endif
                                        </div>
                                        <!-- New Profile Photo Preview -->
                                        <div class="" x-show="photoPreview" style="display: none;">
                                            <span class="block rounded w-full max-w-sm aspect-square bg-cover bg-no-repeat bg-center"
                                                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                            </span>
                                        </div>
                                        <x-input-error for="photo" class="mt-2" />
                                        <h2 class="mt-4 font-base text-3xl text-center" x-text="title"></h2>
                                        <h2 class="mt-4 font-light text-lg text-center" x-text="sub_title"></h2>
                                    </div>
                                </div>
                            </div>
                        </x-slot>
                        <x-slot name="footer">
                            <x-secondary-button wire:click="$set('curriculumModal', false)" wire:loading.attr="disabled">
                                {{ __('취소') }}
                            </x-secondary-button>

                            <x-button class="ms-3" wire:click="save" wire:loading.attr="disabled">
                                {{ __('저장') }}
                            </x-button>
                        </x-slot>
                    </x-dialog-modal>
                </div>
            @endif
        @endauth
    </div>
    <div class="mt-4 pb-12 bg-black">
        <div class="pt-12 pb-4 px-2 max-w-7xl mx-auto"
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
                    },
                });
            "
        >
            <div class="flex items-center gap-2">
                <h1 class="text-2xl font-semibold text-white">{{ $purpose->purpose_ko }} 영상보기</h1>
                @auth
                    @if(auth()->user()->admin)
                        <button wire:click="addYoutube" class="py-1 px-2 text-white border border-white rounded">{{ __('영상추가') }}</button>
                        <x-dialog-modal wire:model.live="youtubeModal" maxWidth="sm">
                            <x-slot name="title">
                                <h1 class="font-bold">{{ __('유투브 영상 관리') }}</h1>
                            </x-slot>
                            <x-slot name="content">
                                <div class="">
                                    <x-label for="link" value="링크" />
                                    <x-input id="link" type="text" class="w-full" wire:model="link" placeholder="예시) X7saeqDgq9g"/>
                                    @if ($link)
                                        <iframe class="mt-4 rounded-lg w-full aspect-video pointer-events-none" src="https://www.youtube-nocookie.com/embed/{{$link}}?autoplay=1&mute=1&loop=1&playlist={{$link}}&controls=0&modestbranding=1&fs=0&rel=0&autohide=1&iv_load_policy=3" frameborder="0"></iframe>
                                    @else
                                        <div class="mt-4 rounded-lg w-full aspect-video bg-gray-200"></div>
                                    @endif
                                </div>
                            </x-slot>
                            <x-slot name="footer">
                                <x-secondary-button wire:click="$set('youtubeModal', false)" wire:loading.attr="disabled">
                                    {{ __('취소') }}
                                </x-secondary-button>
                                <x-button class="ms-3" wire:click="saveLink" wire:loading.attr="disabled">
                                    {{ __('저장') }}
                                </x-button>
                            </x-slot>
                        </x-dialog-modal>
                    @endif
                @endauth
            </div>
            @if(count($purpose_youtubes) > 0)
                <div x-ref="container" class="mt-4 w-full overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach($purpose_youtubes as $purpose_youtube)
                            <div class="swiper-slide relative">
                                @auth
                                    @if(auth()->user()->admin)
                                        <div class="flex items-cetner gap-2 absolute top-0 right-0">
                                            <button class="bg-white rounded" wire:click="modifyYoutube({{$purpose_youtube->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg>
                                            </button>
                                            <button class="bg-white rounded" wire:click="deleteYoutube({{$purpose_youtube->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>
                                    @endif
                                @endauth
                                <iframe class="rounded-lg w-full aspect-video pointer-events-none" src="https://www.youtube-nocookie.com/embed/{{$purpose_youtube->link}}?autoplay=1&mute=1&loop=1&playlist={{$purpose_youtube->link}}&controls=0&modestbranding=1&fs=0&rel=0&autohide=1&iv_load_policy=3" frameborder="0"></iframe>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    <x-footer.mobile-contact />
</div>
