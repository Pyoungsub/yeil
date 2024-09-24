<div class="mt-12 max-w-5xl mx-auto">
    <div class="grid gap-8">
        @foreach ($lessons as $lesson)
            <div class="py-6 px-4 sm:p-6 md:py-10 md:px-8 bg-white border rounded-lg shadow-lg">
                <div class="max-w-4xl mx-auto grid grid-cols-1 lg:max-w-5xl lg:gap-x-20 lg:grid-cols-2">
                    <div class="relative p-3 col-start-1 row-start-1 flex flex-col-reverse rounded-lg bg-gradient-to-t from-black/75 via-black/0 sm:bg-none sm:row-start-2 sm:p-0 lg:row-start-1">
                        <h1 class="mt-1 text-lg font-semibold text-white sm:text-slate-900 md:text-2xl dark:sm:text-white">{{ $lesson->lesson_ko }}</h1>
                        <p class="text-sm leading-4 font-medium text-white sm:text-slate-500 dark:sm:text-slate-400">2층 연습실</p>
                    </div>
                    <div class="grid gap-4 col-start-1 col-end-3 row-start-1 sm:mb-6 sm:grid-cols-4 lg:gap-6 lg:col-start-2 lg:row-end-6 lg:row-span-6 lg:mb-0">
                        <div class="relative w-full h-60 bg-cover bg-center bg-no-repeat rounded-lg sm:h-52 sm:col-span-2 lg:col-span-full" style="background-image:url({{ $lesson->mainpage_lesson_photos->first() ? asset('storage/'.$lesson->mainpage_lesson_photos->first()->img_path ) :  asset('storage/vocal/mNvXDdVAhpyDQWQSRBm3Ekt6xKBopMye5NqqKiut.png') }}" loading="lazy">
                            @if($admin)
                                <button class="absolute right-0 p-2 bg-white rounded border" wire:click="modify({{$lesson->id}}, 1)">{{ __('수정') }}</button>
                            @endif
                        </div>
                        <div class="relative hidden w-full h-52 bg-cover bg-center bg-no-repeat rounded-lg sm:block sm:col-span-2 md:col-span-1 lg:row-start-2 lg:col-span-2 lg:h-32" style="background-image:url({{ $lesson->mainpage_lesson_photos->skip(1)->first() ? asset('storage/'.$lesson->mainpage_lesson_photos->skip(1)->first()->img_path ) :  asset('storage/vocal/mNvXDdVAhpyDQWQSRBm3Ekt6xKBopMye5NqqKiut.png') }}" loading="lazy">
                            @if($admin)
                                <button class="absolute right-0 p-2 bg-white rounded border" wire:click="modify({{$lesson->id}}, 2)">{{ __('수정') }}</button>
                            @endif
                        </div>
                        <div class="relative hidden w-full h-52 bg-cover bg-center bg-no-repeat rounded-lg md:block lg:row-start-2 lg:col-span-2 lg:h-32" style="background-image:url({{ $lesson->mainpage_lesson_photos->skip(2)->first() ? asset('storage/'.$lesson->mainpage_lesson_photos->skip(2)->first()->img_path ) :  asset('storage/vocal/mNvXDdVAhpyDQWQSRBm3Ekt6xKBopMye5NqqKiut.png') }}" loading="lazy">
                            @if($admin)
                                <button class="absolute right-0 p-2 bg-white rounded border" wire:click="modify({{$lesson->id}}, 3)">{{ __('수정') }}</button>
                            @endif
                        </div>
                    </div>
                    <dl class="mt-4 text-xs font-medium flex items-center row-start-2 sm:mt-1 sm:row-start-3 md:mt-2.5 lg:row-start-2">
                        <dt class="sr-only">Reviews</dt>
                        <dd class="text-indigo-600 flex items-center dark:text-indigo-400">
                            <svg width="24" height="24" fill="none" aria-hidden="true" class="mr-1 stroke-current dark:stroke-indigo-500">
                            <path d="m12 5 2 5h5l-4 4 2.103 5L12 16l-5.103 3L9 14l-4-4h5l2-5Z"  stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                            <span>4.89 <span class="text-slate-400 font-normal">(128)</span></span>
                        </dd>
                        <dt class="sr-only">Location</dt>
                        <dd class="flex items-center">
                            <svg width="2" height="2" aria-hidden="true" fill="currentColor" class="mx-3 text-slate-300">
                            <circle cx="1" cy="1" r="1" />
                            </svg>
                            <svg width="24" height="24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mr-1 text-slate-400 dark:text-slate-500" aria-hidden="true">
                            <path d="M18 11.034C18 14.897 12 19 12 19s-6-4.103-6-7.966C6 7.655 8.819 5 12 5s6 2.655 6 6.034Z" />
                            <path d="M14 11a2 2 0 1 1-4 0 2 2 0 0 1 4 0Z" />
                            </svg>
                            목동점
                        </dd>
                    </dl>
                    <div class="mt-4 col-start-1 row-start-3 self-center sm:mt-0 sm:col-start-2 sm:row-start-2 sm:row-span-2 lg:mt-6 lg:col-start-1 lg:row-start-3 lg:row-end-4">
                        <a href="{{ route('lessons', ['lesson' => $lesson->lesson]) }}" class="bg-indigo-600 text-white text-sm leading-6 font-medium py-2 px-3 rounded-lg">더 알아보기</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <!-- Token Value Modal -->
    <x-dialog-modal wire:model="photoModal">
        <x-slot name="title">
           메인페이지 이미지 관리
        </x-slot>

        <x-slot name="content">
            <div class="grid sm:grid-cols-2 gap-8"
                x-data="{
                    photoPreview: $wire.entangle('photoPreview')
                }"
            >
                <div class="">
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
                </div>
                <div class="">
                    <div class="rounded-lg bg-gray-50 p-4">
                        <!-- Current Profile Photo -->
                        <div class="" x-show="!photoPreview">
                            @if($img_path)
                                <img src="{{ asset('storage/'.$img_path) }}" alt="{{ $img_path }}" class="rounded w-full max-w-sm aspect-video object-cover">
                            @endif
                        </div>
                        <!-- New Profile Photo Preview -->
                        <div class="" x-show="photoPreview" style="display: none;">
                            <span class="block rounded w-full max-w-sm aspect-video bg-cover bg-no-repeat bg-center"
                                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>
                        <x-input-error for="photo" class="mt-2" />
                    </div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('photoModal', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>
            <x-button class="ms-3" wire:click="save" wire:loading.attr="disabled">
                {{ __('저장') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
