<div class="w-full min-w-0">

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

                    @foreach($lesson->lesson_videos as $lesson_video)

                        <div class="swiper-slide relative">

                            <x-rectangle-video source="{{ $lesson_video->video_path }}" />

                        </div>

                    @endforeach

                </div>

            </div>

        </div>

    </div>

</div>