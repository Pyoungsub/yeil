<div class="w-full min-w-0">
    @if($admin) <x-button wire:click="addVideo({{ $lesson->id }})"> 영상추가 </x-button> @endif
    <x-dialog-modal wire:model="videoModal"> <x-slot name="title"> {{ $editMode ? '영상 수정' : '메인페이지 동영상 관리' }} </x-slot> <x-slot name="content"> <div x-data="{ uploading: false, progress: 0 }" x-on:livewire-upload-start="uploading = true" x-on:livewire-upload-finish="uploading = false" x-on:livewire-upload-cancel="uploading = false" x-on:livewire-upload-error="uploading = false" x-on:livewire-upload-progress="progress = $event.detail.progress" class="" > <x-label for="video" value="링크" /> <x-input accept="video/*" id="video" type="file" class="w-full block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" wire:model="video" placeholder="url을 입력해주세요" /> <div wire:loading wire:target="video">Uploading...</div> <div x-show="uploading"> <progress max="100" x-bind:value="progress"></progress> </div> @if ($video) <p class="mt-4">Video Preview:</p> <video class="w-full" controls> <source src="{{ $video->temporaryUrl() }}" type="video/mp4"> Your browser does not support the video tag. </video> @endif </div> </x-slot> <x-slot name="footer"> <x-secondary-button wire:click="$set('videoModal', false)" wire:loading.attr="disabled"> {{ __('Close') }} </x-secondary-button> <x-button class="ms-3" wire:click="save" wire:loading.attr="disabled"> {{ __('저장') }} </x-button> </x-slot> </x-dialog-modal>
    <div class="w-full min-w-0">

        <div class="py-4 px-2 w-full min-w-0"
            x-data="{swiper:null}"
            x-init="
                swiper = new Swiper($refs.container, {
                    slidesPerView: 2.3,
                    spaceBetween: 15,
                    breakpoints: {
                        640: { slidesPerView: 2.3, spaceBetween: 15 },
                        768: { slidesPerView: 2.3, spaceBetween: 15 },
                        1024: { slidesPerView: 2.5, spaceBetween: 15 },
                        1280: { slidesPerView: 3.3, spaceBetween: 15 },
                        1536: { slidesPerView: 3.5, spaceBetween: 15 }
                    }
                });

                Livewire.hook('message.processed', () => {
                    swiper.update();
                });
            "
        >

            <div x-ref="container" class="swiper w-full overflow-hidden min-w-0">

                <div class="swiper-wrapper">

                    @foreach($videos as $lesson_video)

                        <div class="swiper-slide relative" 
                            wire:key="video-{{ $lesson_video->id }}-{{ $lesson_video->updated_at?->timestamp }}">

                            <x-rectangle-video 
                                source="{{ $lesson_video->video_path }}?v={{ $lesson_video->updated_at?->timestamp }}" 
                            />
                            @if($admin)
                                <div class="absolute top-2 right-2 z-20 flex gap-2">
                                    <button
                                        wire:click="modifyIdolVideo({{ $lesson_video->id }})"
                                        class="px-3 py-1 text-sm bg-white/90 rounded shadow hover:bg-white"
                                    >
                                        수정
                                    </button>

                                    <button
                                        wire:click="deleteIdolVideo({{ $lesson_video->id }})"
                                        wire:confirm="정말 삭제하시겠습니까?"
                                        class="px-3 py-1 text-sm bg-red-500 text-white rounded shadow hover:bg-red-600"
                                    >
                                        삭제
                                    </button>
                                </div>
                            @endif
                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>