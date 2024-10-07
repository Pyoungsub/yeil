<div class="">
    <div class="relative">
        @auth
            @if(auth()->user()->admin)
                <div class="absolute inset-0 z-20 flex items-center justify-center">
                    <button class="rounded border-2 border-black px-4 py-1 bg-white font-bold" wire:click="modifyYoutube">수정</button>
                </div>
            @endif
        @endauth
        <x-youtube-banner link="{{ $lesson->lesson_youtube ? $lesson->lesson_youtube->link  :  asset('storage/video/7cf4958d5002916a5141c3b18de475d8.png') }}"></x-youtube-banner>
    </div>
    <div class="py-8 grid sm:grid-cols-3 max-w-5xl mx-auto p-2 gap-2">
        @foreach($lesson->purposes as $purpose)
            <div class="relative overflow-hidden rounded-2xl border w-full aspect-square bg-cover bg-no-repeat bg-center p-8 text-white" style="background-image:url({{ $purpose->purpose_photo ? asset('storage/'.$purpose->purpose_photo->img_path ) :  asset('storage/company/7cf4958d5002916a5141c3b18de475d8.png') }}" loading="lazy">
                <a href="{{ route('purposes', ['lesson' => $lesson->lesson, 'purpose' => $purpose->purpose]) }}">
                    <h2 class="text-3xl font-semibold text-white">{{ $purpose->purpose_ko }}</h2>
                </a>
                @auth
                    @if(auth()->user()->admin)
                        <button wire:click="modify({{ $purpose->id }})" class="border border-white text-white rounded px-2">수정</button>
                    @endif
                @endauth
            </div>
        @endforeach
    </div>
    <x-dialog-modal wire:model.live="youtubeModal">
        <x-slot name="title">
            {{ __('메인영상 관리') }}
        </x-slot>
        <x-slot name="content">
            <x-label for="link" />
            <x-input id="link" type="text" wire:model="link" placeholder="예시) X7saeqDgq9g" />
            @if ($link)
                <iframe class="mt-4 rounded-lg w-full aspect-video pointer-events-none" src="https://www.youtube-nocookie.com/embed/{{$link}}?autoplay=1&mute=1&loop=1&playlist={{$link}}&controls=0&modestbranding=1&fs=0&rel=0&autohide=1&iv_load_policy=3" frameborder="0"></iframe>
            @else
                <div class="mt-4 rounded-lg w-full aspect-video bg-gray-200"></div>
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('youtubeModal', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>
            <x-button class="ms-3" wire:click="saveYoutube" wire:loading.attr="disabled">
                {{ __('저장') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
    <x-dialog-modal wire:model.live="purposeModal">
        <x-slot name="title">
            {{ __('메인페이지 이미지 관리') }}
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
                                <img src="{{ asset('storage/'.$img_path) }}" alt="{{ $img_path }}" class="rounded w-full max-w-sm aspect-square object-cover">
                            @endif
                        </div>
                        <!-- New Profile Photo Preview -->
                        <div class="" x-show="photoPreview" style="display: none;">
                            <span class="block rounded w-full max-w-sm aspect-square bg-cover bg-no-repeat bg-center"
                                x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                            </span>
                        </div>
                        <x-input-error for="photo" class="mt-2" />
                    </div>
                </div>
            </div>
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('purposeModal', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>
            <x-button class="ms-3" wire:click="save" wire:loading.attr="disabled">
                {{ __('저장') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
    <x-footer.web />
</div>
