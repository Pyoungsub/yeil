@push('scripts')
    <script src="//cdn.tiny.cloud/1/mn37b7osy35qr0kk1f8sptgd7rx0avbo4bo7m5pg0tzuilvw/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>
@endpush
<div class="">
    <div class="relative">
        @if($is_admin)
            <div class="absolute inset-0 z-20 flex items-center justify-center">
                <button class="rounded border-2 border-black px-4 py-1 bg-white font-bold" wire:click="modifyBannerYoutube">수정</button>
            </div>
        @endif
        @if ($banner_youtube_link)
            <x-youtube-banner link="{{ $purpose->purpose_banner_youtube ? $purpose->purpose_banner_youtube->link  :  asset('storage/video/7cf4958d5002916a5141c3b18de475d8.png') }}"></x-youtube-banner>
        @else
            <x-mp4 source="/video/7cf4958d5002916a5141c3b18de475d8.mp4" />
        @endif
    </div>
    <x-dialog-modal wire:model.live="bannerYoutubeModal">
        <x-slot name="title">
            {{ __('메인영상 관리') }}
        </x-slot>
        <x-slot name="content">
            <x-label for="banner_youtube_link" />
            <x-input id="banner_youtube_link" type="text" wire:model="banner_youtube_link" placeholder="예시) X7saeqDgq9g" />
            @if ($banner_youtube_link)
                <iframe class="mt-4 rounded-lg w-full aspect-video pointer-events-none" src="https://www.youtube-nocookie.com/embed/{{$banner_youtube_link}}?autoplay=1&mute=1&loop=1&playlist={{$banner_youtube_link}}&controls=0&modestbranding=1&fs=0&rel=0&autohide=1&iv_load_policy=3" frameborder="0"></iframe>
            @else
                <div class="mt-4 rounded-lg w-full aspect-video bg-gray-200"></div>
            @endif
        </x-slot>
        <x-slot name="footer">
            <x-secondary-button wire:click="$set('bannerYoutubeModal', false)" wire:loading.attr="disabled">
                {{ __('Close') }}
            </x-secondary-button>
            <x-button class="ms-3" wire:click="saveYoutube" wire:loading.attr="disabled">
                {{ __('저장') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
    
    <div class="bg-black pt-8">
        <div class="py-12 px-2 max-w-7xl mx-auto">
            <div class="grid gap-40">
                @if($is_admin)
                    @foreach($purpose->groups as $group)
                        <div class="relative px-2 sm:px-4 lg:px-0">
                            <div class="z-10 absolute right-2 top-2 flex gap-2">
                                <!--button class="border border-white rounded bg-black text-white">수정</button-->
                                <button wire:confirm.prompt="수업을 삭제하시겠습니까?\n\n계속하시려면 삭제를 입력해주세요.|삭제" wire:click="deleteGroup({{$group->id}})" class="border border-white rounded bg-black text-white">삭제</button>
                            </div>
                            <h1 class="relative text-3xl font-semibold text-white overflow-hidden after:top-4 after:absolute after:content-[''] after:w-full after:h-0.5 after:bg-white">{{$group->group_ko}}</h1>
                            <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-4 lg:gap-8 xl:gap-12">
                                @foreach($group->parts as $part)
                                    <div class="w-full mx-auto bg-gray-800 rounded-lg p-4">
                                        <div class="relative">
                                            <h2 class="mt-4 mx-auto text-cyan-300 text-center text-3xl font-bold whitespace-pre-line">{{$part->part_ko}}</h2>
                                            <button 
                                                class="absolute right-2 top-2 bg-white border rounded" 
                                                wire:click="deletePart({{$part->id}})"
                                                wire:confirm.prompt="반을 삭제하시겠습니까?\n\n계속하시려면 삭제를 입력해주세요.|삭제"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>
                                        <div class="relative grid mt-8 gap-2">
                                            <button wire:click="setDescription({{$part->id}})" class="absolute left-0 top-0 bg-white rounded text-sm px-2">수업종류관리</button>
                                            @foreach(explode('+', $part->description) as $index => $description)
                                                @if(!$loop->first)
                                                    <div class="flex justify-center">
                                                        <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="4" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                    </div>
                                                @endif
                                                <!--p class="w-48 mx-auto text-center bg-cyan-300 w-56 px-3 py-1 font-black text-lg rounded-full"-->
                                                <p class="w-48 mx-auto text-center bg-cyan-300 px-3 py-1 font-black text-2xl rounded-full">
                                                    {{ $description }}
                                                </p>
                                            @endforeach
                                        </div>
                                        <div class="relative mt-6 mx-auto px-8">
                                            <button class="absolute left-0 top-0 bg-white rounded text-sm px-2 z-10" wire:click="addPartPhoto({{$part->id}})">사진관리</button>
                                            @if($part->part_photo)
                                                <div class="relative">
                                                    <div class="w-full aspect-video bg-cover bg-center" style="background-image:url('{{ asset('storage/'.$part->part_photo->img_path) }}')"></div>
                                                    <button class="absolute right-0 bottom-0 bg-white rounded text-sm px-2" wire:click="deletePartPhoto({{$part->id}})">삭제</button>
                                                </div>
                                            @else
                                                <div class="w-full aspect-video bg-gray-200 flex items-center justify-center">사진이 없습니다.</div>
                                            @endif
                                        </div>
                                        <div class="relative px-2 sm:px-8 grid mt-4 mb-8 gap-2">
                                            <button wire:click="addPartDescription({{$part->id}})" class="absolute left-0 top-0 bg-white rounded text-sm px-2">안내추가</button>
                                            @foreach($part->part_descriptions as $part_description)
                                                <div class="relative flex items-start gap-2">
                                                    <div class="absolute right-0 top-0 flex items-center">
                                                        <button
                                                            class="bg-white border rounded" 
                                                            wire:click="modifyPartDescription({{$part_description->id}})"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg>
                                                        </button>
                                                        <button 
                                                            class="bg-white border rounded" 
                                                            wire:confirm.prompt="안내를 삭제하시겠습니까?\n\n계속하시려면 삭제를 입력해주세요.|삭제"    
                                                            wire:click="deletePartDescription({{$part_description->id}})"
                                                        >
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                        </button>
                                                    </div>
                                                    <svg class="stroke-red-500" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke-width="4" stroke-linecap="butt" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                    <p class="text-white text-lg font-semibold underline decoration-red-500 underline-offset-8">{{$part_description->description}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                    <x-dialog-modal wire:model.live="descriptionModal" maxWidth="md">
                        <x-slot name="title">
                            수업종류를 관리해주세요.
                        </x-slot>
                        <x-slot name="content">
                        <x-label for="description" value="수업종류" />
                        <x-input class="w-full" id="description" placeholder="소개글을 작성해주세요." wire:model="description" />
                        </x-slot>
                        <x-slot name="footer">
                            <x-secondary-button wire:click="$set('descriptionModal', false)" wire:loading.attr="disabled">
                                {{ __('취소') }}
                            </x-secondary-button>
                            <x-button class="ms-3" wire:click="saveDescription" wire:loading.attr="disabled">
                                {{ __('저장') }}
                            </x-button>
                        </x-slot>
                    </x-dialog-modal>
                    <x-dialog-modal wire:model.live="partPhotoModal" maxWidth="sm">
                        <x-slot name="title">
                            <h1 class="font-bold">{{ __('수업사진 관리') }}</h1>
                        </x-slot>
                        <x-slot name="content">
                            <div class="grid sm:grid-cols-2 gap-8"
                                x-data="{
                                    photoPreview:$wire.entangle('photoPreview'),
                                }"
                            >
                                
                                <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.part_photo.click()">
                                    {{ __('새 사진 선택') }}
                                </x-secondary-button>
                                @if ($img_path)
                                    <x-secondary-button type="button" class="mt-2" wire:click="deletePhoto">
                                        {{ __('사진삭제') }}
                                    </x-secondary-button>
                                @endif                                
                                <!-- Profile Photo File Input -->
                                <input type="file" id="part_photo" class="hidden"
                                    wire:model.live="photo"
                                    x-ref="part_photo"
                                    x-on:change="
                                        photoName = $refs.part_photo.files[0].name;
                                        const reader = new FileReader();
                                        reader.onload = (e) => {
                                            photoPreview = e.target.result;
                                        };
                                        reader.readAsDataURL($refs.part_photo.files[0]);
                                    "
                                />
                                @if($img_path)
                                    <div x-show="!photoPreview" class="w-full aspect-video bg-cover bg-center" style="background-image:url('{{ asset('storage/'.$img_path) }}')"></div>
                                @endif
                                <div class="" x-show="photoPreview" style="display: none;">
                                    <span class="block w-full aspect-video bg-cover bg-no-repeat bg-center"
                                        x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                    </span>
                                </div>
                            </div>
                        </x-slot>
                        <x-slot name="footer">
                            <x-secondary-button wire:click="$set('partPhotoModal', false)" wire:loading.attr="disabled">
                                {{ __('취소') }}
                            </x-secondary-button>
                            <x-button class="ms-3" wire:click="savePartPhoto" wire:loading.attr="disabled">
                                {{ __('저장') }}
                            </x-button>
                        </x-slot>
                    </x-dialog-modal>


                    <x-dialog-modal wire:model.live="partDescriptionModal" maxWidth="sm">
                        <x-slot name="title">
                            안내를 추가해주세요.
                        </x-slot>
                        <x-slot name="content">
                        <x-label for="part_description" value="안내" />
                        <x-input id="part_description" class="w-full" wire:model="part_description" placeholder="예) 디테일한 부분까지 케어 1:1보컬레슨" />
                        </x-slot>
                        <x-slot name="footer">
                            <x-secondary-button wire:click="$set('partDescriptionModal', false)" wire:loading.attr="disabled">
                                {{ __('취소') }}
                            </x-secondary-button>
                            <x-button class="ms-3" wire:click="savePartDescription" wire:loading.attr="disabled">
                                {{ __('저장') }}
                            </x-button>
                        </x-slot>
                    </x-dialog-modal>
                @else
                    @foreach($purpose->groups as $group)
                        <div class="px-2 sm:px-4 lg:px-0">
                            <h1 class="text-3xl font-semibold text-white relative overflow-hidden after:top-4 after:absolute after:content-[''] after:w-full after:h-0.5 after:bg-white">{{$group->group_ko}}</h1>
                            <div class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-8 sm:gap-4 lg:gap-8 xl:gap-12">
                                @foreach($group->parts as $part)
                                    <div class="w-full mx-auto bg-gray-800 rounded-lg p-4">
                                        <!--h2 class="mt-4 mx-auto text-cyan-300 text-center text-3xl font-black whitespace-pre-line">{{$part->part_ko}}</h2-->
                                        <h2 class="mt-4 mx-auto text-cyan-300 text-center text-3xl font-bold whitespace-pre-line">{{$part->part_ko}}</h2>
                                        <div class="h-44">
                                            <div class="relative grid mt-8 gap-1">
                                                @foreach(explode('+', $part->description) as $index => $description)
                                                    @if(!$loop->first)
                                                        <div class="flex justify-center">
                                                            <svg class="" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="#fff" stroke-width="4" stroke-linecap="butt" stroke-linejoin="arcs"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg>
                                                        </div>
                                                    @endif
                                                    <!--p class="w-48 mx-auto text-center bg-cyan-300 w-56 px-3 py-1 font-black text-lg rounded-full"-->
                                                    <p class="w-48 mx-auto text-center bg-cyan-300 px-3 py-1 font-black text-2xl rounded-full">
                                                        {{ $description }}
                                                    </p>
                                                @endforeach
                                            </div>
                                        </div>
                                        @if($part->part_photo)
                                            <div class="mt-6 mx-auto px-8">
                                                <div class="w-full aspect-video bg-cover bg-center" style="background-image:url('{{ asset('storage/'.$part->part_photo->img_path) }}')"></div>
                                            </div>
                                        @endif
                                        <div class="px-2 sm:px-8 relative grid mt-4 mb-8 gap-2">
                                            @foreach($part->part_descriptions as $part_description)
                                                <div class="flex items-start gap-2">
                                                    <svg class="stroke-red-500" xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke-width="4" stroke-linecap="butt" stroke-linejoin="round"><polyline points="20 6 9 17 4 12"></polyline></svg>
                                                    <p class="text-white text-lg font-semibold underline decoration-red-500 underline-offset-8">{{$part_description->description}}</p>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
    <div class="bg-black">
        @if($is_admin)
            <div class="relative py-12 px-2 max-w-6xl mx-auto">
                <!--h1 class="text-4xl text-center text-white font-bold"><span class="text-red-700">Y</span>EIL 입시 FREE PASS</h1-->
                <h1 class="text-4xl text-center text-white font-bold"><span class="text-red-700">Y</span>EIL {{$purpose->purpose_ko}} 수업안내</h1>
                <button class="absolute right-2 top-2 p-2 border border-white text-white rounded" wire:click="addCurriculum">수업설명 추가</button>
                <div class=""
                x-data="{
                    title: $wire.entangle('title'),
                    sub_title: $wire.entangle('sub_title'),
                    photoName: null,
                    photoPreview: $wire.entangle('photoPreview'),
                }"
                x-init="
                    tinymce.init({
                        selector: 'textarea#sub_title',
                        plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
                        toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                        readonly: false,
                        setup: (editor) => {
                            editor.on('change keyup', () => {
                                sub_title = editor.getContent();
                            });
                        }
                    });
                ">
                    <x-dialog-modal wire:model.live="curriculumModal" maxWidth="4xl">
                        <x-slot name="title">
                            <h1 class="font-bold">{{ __('커리큘럼 관리') }}</h1>
                        </x-slot>
                        <x-slot name="content">
                            <div class="grid sm:grid-cols-2 gap-8">
                                <div class="">
                                    <x-label for="title" value="제목" />
                                    <x-input id="title" type="text" x-model="title" class="w-full" />
                                    <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.photo.click()">
                                        {{ __('새 사진 선택') }}
                                    </x-secondary-button>
                                    @if ($img_path)
                                        <x-secondary-button type="button" class="mt-2" wire:click="deletePhoto">
                                            {{ __('사진삭제') }}
                                        </x-secondary-button>
                                    @endif
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
                                    <x-label class="mt-2" for="sub_title" value="내용" />
                                    <div class="" wire:ignore>
                                        <textarea id="sub_title" type="text" x-model="sub_title" class="w-full resize-none"></textarea>
                                    </div>
                                </div>
                                <div class="bg-black px-8">
                                    <div class="mt-8 rounded-lg bg-white py-8 gap-8">
                                        <h3 class="mx-auto text-white text-center bg-black rounded-full px-4 py-2 w-fit">1.<span x-text="title"></span></h3>
                                        <div class="mt-6 mx-auto px-8">
                                            @if($img_path)
                                                <div x-show="!photoPreview" class="w-full aspect-video bg-cover bg-center" style="background-image:url('{{ asset('storage/'.$img_path) }}')"></div>
                                            @endif
                                            <div class="" x-show="photoPreview" style="display: none;">
                                                <span class="block w-full aspect-video bg-cover bg-no-repeat bg-center"
                                                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                                                </span>
                                            </div>
                                        </div>
                                        <div class="mt-6 text-center" x-html="sub_title"></div>
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
                <div class="mt-8 grid md:grid-cols-2 lg:grid-cols-3 gap-12 px-8"
                    x-data="{ show: false }"
                    x-intersect.half="show = true"
                >
                    @foreach($purpose->curricula as $index => $curriculum)
                        <div 
                            x-show="show"
                            x-transition:enter="transform transition ease-out duration-{{($index + 4)*100}}"
                            x-transition:enter-start="-translate-x-full opacity-0"
                            x-transition:enter-end="translate-x-0 opacity-100"
                            x-transition:leave="transform transition ease-in duration-300"
                            x-transition:leave-start="translate-x-0 opacity-100"
                            x-transition:leave-end="-translate-x-full opacity-0"
                            class="relative rounded-lg bg-white py-8 gap-8"
                        >
                            <div class="absolute right-2 top-2 flex">
                                <button class="border rounded" wire:click="modify({{$curriculum->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><polygon points="16 3 21 8 8 21 3 21 3 16 16 3"></polygon></svg>
                                </button>
                                <button class="border rounded" wire:confirm.prompt="수업설명을 삭제하시겠습니까?\n\n계속하시려면 삭제를 입력해주세요.|삭제"  wire:click="delete({{$curriculum->id}})">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                </button>
                            </div>
                            <h3 class="mx-auto text-white text-center bg-black rounded-full px-4 py-2 w-fit">{{ $index+1 }}. {{$curriculum->title}}</h3>
                            <div class="mt-6 mx-auto px-8">
                                <div class="w-full aspect-video bg-cover bg-center" style="background-image:url('{{ asset('storage/'.$curriculum->img_path) }}')"></div>
                            </div>
                            <div class="mt-6 text-center">
                                <div class="px-4 leading-normal">{!! preg_replace('/<br\s*\/?>/i', '', nl2br($curriculum->sub_title)) !!}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @else
            <div class="py-12 px-2 max-w-6xl mx-auto">
                <h1 class="text-4xl text-center text-white font-bold"><span class="text-red-700">Y</span>EIL {{$purpose->purpose_ko}} 수업안내</h1>
                <!--h2 class="text-2xl text-center text-yellow-300">FREE PASS만의 6가지 특혜</h2-->
                <div 
                    class="mt-8 grid sm:grid-cols-2 lg:grid-cols-3 gap-12 px-8"
                >
                    @foreach($purpose->curricula as $index => $curriculum)
                        <div class=""
                            x-data="{ show: false }"
                            x-intersect.full="show = true"
                        >
                            <div 
                                x-show="show"
                                x-transition:enter="transform transition ease-out duration-700"
                                x-transition:enter-start="-translate-x-full opacity-0"
                                x-transition:enter-end="translate-x-0 opacity-100"
                                x-transition:leave="transform transition ease-in duration-300"
                                x-transition:leave-start="translate-x-0 opacity-100"
                                x-transition:leave-end="-translate-x-full opacity-0"
                                class="rounded-lg bg-white py-8 gap-8"
                            >
                                <h3 class="mx-auto text-white text-center bg-black rounded-full px-4 py-2 w-fit">{{ $index+1 }}. {{$curriculum->title}}</h3>
                                <div class="mt-6 mx-auto px-8">
                                    <div class="w-full aspect-video bg-cover bg-center" style="background-image:url('{{ asset('storage/'.$curriculum->img_path) }}')"></div>
                                </div>
                                <div class="mt-6 text-center">
                                    <div class="px-4 leading-normal">{!! preg_replace('/<br\s*\/?>/i', '', nl2br($curriculum->sub_title)) !!}</div>
                                </div>
                            </div>
                        </div>
                        
                    @endforeach
                </div>
            </div>
        @endif
        @if($lesson->lesson === 'dance' && $purpose->purpose === 'pastime')
            <div class="px-2 sm:px-0">
                <a href="https://m.booking.naver.com/booking/6/bizes/1183922?area=pll&lang=ko&theme=place" target="_blank" style="background-color:#2DB400;border-color:#2DB400" class="py-3 text-center border rounded text-white block max-w-5xl mx-auto flex items-center justify-center gap-4">
                    <img src="{{asset('storage/company/naver.png')}}" alt="" class="w-12">
                    무료체험 신청하기
                </a>
            </div>
        @endif
    </div>
    
    <div class="bg-black py-12">
        <div class="px-2 max-w-7xl mx-auto">
            <div class="flex items-center gap-2">
                @if(count($purpose->purpose_people_youtubes) > 0)
                    <h1 class="text-2xl font-semibold text-white">{{ $purpose->purpose_people_introduce ? $purpose->purpose_people_introduce->title : '예일 합격자 소개' }}</h1>
                @endif
                @auth
                    @if(auth()->user()->admin)
                        <button wire:click="modifyIntroduce" class="bg-white border rounded px-2 text-sm">수정</button>
                        <button wire:click="addPeopleVideo" class="py-1 px-2 text-white border border-white rounded">{{ __('영상추가') }}</button>
                        <x-dialog-modal wire:model.live="peopleVideoModal" maxWidth="sm">
                            <x-slot name="title">
                                <h1 class="font-bold">{{ __('합격자 영상 관리') }}</h1>
                            </x-slot>
                            <x-slot name="content">
                                <div x-data="{ uploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="uploading = true"
                                    x-on:livewire-upload-finish="uploading = false"
                                    x-on:livewire-upload-cancel="uploading = false"
                                    x-on:livewire-upload-error="uploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                    class=""
                                >
                                    <x-label for="people_video" value="링크" />
                                    <x-input accept="video/*" id="people_video" type="file" class="w-full block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" 
                                    wire:model="people_video" placeholder="url을 입력해주세요" />
                                    <div wire:loading wire:target="people_video">Uploading...</div>
                                    <div x-show="uploading">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                    @if ($people_video)
                                        <p class="mt-4">Video Preview:</p>
                                        <video class="w-full" controls>
                                            <source src="{{ $people_video->temporaryUrl() }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                    <x-label for="people_video_goal" value="합격한 곳" />
                                    <x-input id="people_video_goal" type="text" class="w-full" wire:model="people_video_goal" placeholder="예시) 서공예 실용무용과"/>
                                    <x-label for="people_video_name" value="이름" />
                                    <x-input id="people_video_name" type="text" class="w-full" wire:model="people_video_name" placeholder="예시) 홍길동"/>
                                </div>
                            </x-slot>
                            <x-slot name="footer">
                                <x-secondary-button wire:click="$set('peopleVideoModal', false)" wire:loading.attr="disabled">
                                    {{ __('취소') }}
                                </x-secondary-button>
                                <x-button class="ms-3" wire:click="savePeopleVideo" wire:loading.attr="disabled">
                                    {{ __('저장') }}
                                </x-button>
                            </x-slot>
                        </x-dialog-modal>
                        {{--
                            <button wire:click="addPeopleYoutube" class="py-1 px-2 text-white border border-white rounded">{{ __('영상추가') }}</button>
                            <x-dialog-modal wire:model.live="peopleYoutubeModal" maxWidth="sm">
                                <x-slot name="title">
                                    <h1 class="font-bold">{{ __('합격자 영상 관리') }}</h1>
                                </x-slot>
                                <x-slot name="content">
                                    <div class="">
                                        <x-label for="people_link" value="링크" />
                                        <x-input id="people_link" type="text" class="w-full" wire:model="people_link" placeholder="예시) X7saeqDgq9g"/>
                                        @if ($people_link)
                                            <iframe class="mt-4 rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/{{$people_link}}?autoplay=1&mute=1&loop=1&playlist={{$people_link}}&controls=0&modestbranding=1&fs=0&rel=0&autohide=1&iv_load_policy=3" frameborder="0"></iframe>
                                        @else
                                            <div class="mt-4 rounded-lg w-full aspect-[9/16] bg-gray-200"></div>
                                        @endif
                                        <x-label for="goal" value="합격한 곳" />
                                        <x-input id="goal" type="text" class="w-full" wire:model="goal" placeholder="예시) 서공예 실용무용과"/>
                                        <x-label for="people_name" value="이름" />
                                        <x-input id="people_name" type="text" class="w-full" wire:model="people_name" placeholder="예시) 홍길동"/>
                                    </div>
                                </x-slot>
                                <x-slot name="footer">
                                    <x-secondary-button wire:click="$set('peopleYoutubeModal', false)" wire:loading.attr="disabled">
                                        {{ __('취소') }}
                                    </x-secondary-button>
                                    <x-button class="ms-3" wire:click="savePeople" wire:loading.attr="disabled">
                                        {{ __('저장') }}
                                    </x-button>
                                </x-slot>
                            </x-dialog-modal>
                        --}}
                    @endif
                @endauth
            </div>
            <div class="mt-4 grid md:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($purpose->purpose_people_videos as $purpose_people_video)
                    <div class="">
                        <div class="relative">
                            @auth
                                @if(auth()->user()->admin)
                                    <div class="absolute top-2 right-2 z-20">
                                        <button wire:click="modifyPeopleVideo({{$purpose_people_video->id}})" class="border bg-white rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
                                        </button>
                                        <button wire:confirm="영상를 삭제 하시겠습니까?" wire:click="deletePeopleVideo({{$purpose_people_video->id}})" class="border bg-white rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button>
                                    </div>
                                @endif
                            @endauth
                            {{--<x-video source="{{ $purpose_people_video->video_path }}" />--}}
                            {{--<x-square-video source="{{ $purpose_people_video->video_path }}" />--}}
                            <x-rectangle-video source="{{ $purpose_people_video->video_path }}" />
                        </div>    
                        <h1 class="mt-4 text-white font-bold">{{ $purpose_people_video->goal }}</h1>
                        <p class="mt-2 text-white font-bold">{{ $purpose_people_video->name }}</p>
                    </div>
                @endforeach
            </div>
            {{--
                <div class="mt-4 grid md:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($purpose->purpose_people_youtubes as $purpose_people_youtube)
                        <div class="relative">
                            @auth
                                @if(auth()->user()->admin)
                                    <div class="absolute top-2 right-2">
                                        <button wire:click="modifyPeople({{$purpose_people_youtube->id}})" class="border bg-white rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><circle cx="6" cy="6" r="3"></circle><circle cx="6" cy="18" r="3"></circle><line x1="20" y1="4" x2="8.12" y2="15.88"></line><line x1="14.47" y1="14.48" x2="20" y2="20"></line><line x1="8.12" y1="8.12" x2="12" y2="12"></line></svg>
                                        </button>
                                        <button wire:confirm="합격자를 삭제 하시겠습니까?" wire:click="deletePeople({{$purpose_people_youtube->id}})" class="border bg-white rounded">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                        </button>
                                    </div>
                                @endif
                            @endauth
                            <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/{{ $purpose_people_youtube->link }}?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist={{ $purpose_people_youtube->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <h1 class="mt-4 text-white font-bold">{{ $purpose_people_youtube->goal }}</h1>
                            <p class="mt-2 text-white font-bold">{{ $purpose_people_youtube->name }}</p>
                        </div>
                    @endforeach
                    <!--div class="">
                        <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/mo1RUISXAmk?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist=mo1RUISXAmk" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h1 class="mt-4 text-white font-bold">서공예 실용무용과</h1>
                        <p class="mt-2 text-white font-bold">김민지</p>
                    </div>
                    <div class="">
                        <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/FXhlGS935ac?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist=FXhlGS935ac" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h1 class="mt-4 text-white font-bold">서공예 실용무용과</h1>
                        <p class="mt-2 text-white font-bold">오서연</p>
                    </div>
                    <div class="">
                        <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/Ysy0m1cTDK4?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist=Ysy0m1cTDK4" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h1 class="mt-4 text-white font-bold">한림예고 실용무용과 합격</h1>
                        <p class="mt-2 text-white font-bold">김세빈</p>
                    </div>
                    <div class="">
                        <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/Z0veg-NjD_c?autoplay=1&mute=1&loop=1&controls=0&modestbranding=1&showinfo=0&playlist=Z0veg-NjD_c" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                        <h1 class="mt-4 text-white font-bold">세종대 실용무용과</h1>
                        <p class="mt-2 text-white font-bold">추가연</p>
                    </div-->
                </div>
            --}}
            
        </div>
        <x-dialog-modal wire:model.live="introduceModal">
            <x-slot name="title">
                {{ __('소개글 수정') }}
            </x-slot>
            <x-slot name="content">
                <x-label for="introduce" />
                <x-input id="introduce" type="text" wire:model="introduce" />
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('introduceModal', false)" wire:loading.attr="disabled">
                    {{ __('Close') }}
                </x-secondary-button>
                <x-button class="ms-3" wire:click="saveIntroduce" wire:loading.attr="disabled">
                    {{ __('저장') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </div>
    <div class="pt-12">
        <div 
            x-data="{ show: false }"
            x-intersect.half="show = true"
            x-intersect:leave="show = false"
            class="py-4 px-2 max-w-fit mx-auto"
        >
            <h1 class="text-2xl font-semibold relative overflow-hidden after:top-4 after:absolute after:content-[''] after:w-full after:h-0.5 after:bg-black"
            >{{$purpose->purpose_ko}}</h1>
            <div class="mt-4 grid sm:grid-cols-2 lg:flex gap-2">
                @foreach($purpose->schedules->groupBy('day_id')->sortKeys() as $day_id => $schedules)
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
                        <!--button class="w-full bg-black text-white py-2 rounded" @click="show = true">수강료 알아보기</button-->
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
                                    <div class="mt-4 text-sm text-gray-600 grid gap-4">
                                        @foreach($purpose->groups as $group)
                                            <div class="">
                                                <h3 class="font-bold text-lg">{{ $group->group_ko }}</h3>
                                                <div class="grid gap-2">
                                                    @foreach($group->parts as $part)
                                                        <div class="border p-2">
                                                            <div class="flex items-center justify-between gap-8">
                                                                <div class="">
                                                                    <p>{{ $part->part_ko }}</p>
                                                                    <p>{{ $part->description }}</p>
                                                                </div>
                                                                <p class="flex-none">{{ number_format($part->price) }}원</p>
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
                        <!--button class="w-full bg-black text-white py-2 rounded" @click="show = true">수강료 알아보기</button-->
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
    <div class="mt-4 pb-12 bg-black">
        <div class="pt-12 pb-4 px-2 max-w-7xl mx-auto"
            x-data="{swiper:null}"
            x-init="
                swiper = new Swiper($refs.container, {
                    slidesPerView: 2.4,
                    spaceBetween: 30,
                    breakpoints: {
                        640: {
                        spaceBetween: 60,
                            slidesPerView: 2.4,
                        },
                        768: {
                            slidesPerView: 4,
                        },
                    },
                });
            "
        >
            <div class="flex items-center gap-2">
                <h1 class="text-2xl font-semibold text-white">{{ $purpose->purpose_ko }} 영상보기</h1>
                @auth
                    @if(auth()->user()->admin)
                        <button wire:click="addIdolVideo" class="py-1 px-2 text-white border border-white rounded">{{ __('영상추가') }}</button>
                        <x-dialog-modal wire:model.live="idolVideoModal" maxWidth="sm">
                            <x-slot name="title">
                                <h1 class="font-bold">{{ __('영상 관리') }}</h1>
                            </x-slot>
                            <x-slot name="content">
                                <div x-data="{ uploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="uploading = true"
                                    x-on:livewire-upload-finish="uploading = false"
                                    x-on:livewire-upload-cancel="uploading = false"
                                    x-on:livewire-upload-error="uploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                    class=""
                                >
                                    <x-label for="idol_video" value="링크" />
                                    <x-input accept="video/*" id="idol_video" type="file" class="w-full block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-violet-50 file:text-violet-700 hover:file:bg-violet-100" 
                                    wire:model="idol_video" placeholder="url을 입력해주세요" />
                                    <div wire:loading wire:target="idol_video">Uploading...</div>
                                    <div x-show="uploading">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                    @if ($idol_video)
                                        <p class="mt-4">Video Preview:</p>
                                        <video class="w-full" controls>
                                            <source src="{{ $idol_video->temporaryUrl() }}" type="video/mp4">
                                            Your browser does not support the video tag.
                                        </video>
                                    @endif
                                </div>
                            </x-slot>
                            <x-slot name="footer">
                                <x-secondary-button wire:click="$set('idolVideoModal', false)" wire:loading.attr="disabled">
                                    {{ __('취소') }}
                                </x-secondary-button>
                                <x-button class="ms-3" wire:click="saveIdolVideo" wire:loading.attr="disabled">
                                    {{ __('저장') }}
                                </x-button>
                            </x-slot>
                        </x-dialog-modal>
                    @endif
                @endauth
            </div>
            @if(count($purpose_idol_videos) > 0)
                <div x-ref="container" class="mt-4 w-full overflow-hidden">
                    <div class="swiper-wrapper">
                        @foreach($purpose_idol_videos as $purpose_idol_video)
                            <div class="swiper-slide relative">
                                @auth
                                    @if(auth()->user()->admin)
                                        <div class="flex items-cetner gap-2 absolute top-0 right-0 z-20">
                                            <button class="bg-white rounded" wire:click="modifyIdolVideo({{$purpose_idol_video->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg>
                                            </button>
                                            <button class="bg-white rounded" wire:click="deleteIdolVideo({{$purpose_idol_video->id}})">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                            </button>
                                        </div>
                                    @endif
                                @endauth
                                {{--<x-video source="{{ $purpose_idol_video->video_path }}" />--}}
                                <x-rectangle-video source="{{ $purpose_idol_video->video_path }}" />
                                {{--<x-square-video source="{{ $purpose_idol_video->video_path }}" />--}}
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
    {{--
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
                                slidesPerView: 4,
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
                                            <iframe class="mt-4 rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/{{$link}}?autoplay=1&mute=1&loop=1&playlist={{$link}}&controls=0&modestbranding=1&fs=0&rel=0&autohide=1&iv_load_policy=3" frameborder="0"></iframe>
                                        @else
                                            <div class="mt-4 rounded-lg w-full aspect-[9/16] bg-gray-200"></div>
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
                                    <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/{{$purpose_youtube->link}}?autoplay=1&mute=1&loop=1&playlist={{$purpose_youtube->link}}&controls=0&modestbranding=1&fs=0&rel=0&autohide=1&iv_load_policy=3" frameborder="0"></iframe>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    --}}
    {{--
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
                                slidesPerView: 4,
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
                                            <iframe class="mt-4 rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/{{$link}}?autoplay=1&mute=1&loop=1&playlist={{$link}}&controls=0&modestbranding=1&fs=0&rel=0&autohide=1&iv_load_policy=3" frameborder="0"></iframe>
                                        @else
                                            <div class="mt-4 rounded-lg w-full aspect-[9/16] bg-gray-200"></div>
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
                                    <iframe class="rounded-lg w-full aspect-[9/16] pointer-events-none" src="https://www.youtube-nocookie.com/embed/{{$purpose_youtube->link}}?autoplay=1&mute=1&loop=1&playlist={{$purpose_youtube->link}}&controls=0&modestbranding=1&fs=0&rel=0&autohide=1&iv_load_policy=3" frameborder="0"></iframe>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    --}}
    
    <x-footer.mobile-contact />
    <x-footer.web />
</div>