<div class="bg-black pt-8">
    <div class="py-12 px-2 max-w-7xl mx-auto">
        <div class="flex items-center justify-center gap-2">
            <h2 class="text-4xl text-white font-bold"><span class="text-red-700">Y</span>EIL {{$purpose->purpose_ko}} 수업안내</h2>
            @auth
                @if(auth()->user()->admin)
                    <button wire:click="openCurriculumModal" class="px-4 py-2 bg-blue-500 text-white rounded">수업안내 추가</button>
                @endif
            @endauth
        </div>
    </div>
    
    @foreach($curricula as $curriculum)
        <div class="flex flex-col items-center gap-4 mt-8">
            <div class="flex gap-2">
                <button wire:click="openImageModal({{ $curriculum->id }})">
                    {{ $curriculum->img_path ? 'Change Image' : 'Add Image' }}
                </button>
                @if($curriculum->img_path)
                    <button wire:click="deleteImage({{ $curriculum->id }})">
                        Delete Image
                    </button>
                @endif
            </div>
        </div>
    @endforeach
    <x-dialog-modal wire:model.live="isImageModalOpen" maxWidth="sm">
        <x-slot name="title">
            <h1 class="font-bold">수업사진 관리</h1>
        </x-slot>

        <x-slot name="content">
            <div
                class="space-y-4"
                x-data="{
                    photoPreview: $wire.entangle('photoPreview')
                }"
            >
                <div class="flex gap-2">
                    <x-secondary-button
                        type="button"
                        x-on:click.prevent="$refs.part_photo.click()"
                    >
                        새 사진 선택
                    </x-secondary-button>

                    @if ($img_path)
                        <x-secondary-button
                            type="button"
                            wire:click="deletePhoto"
                        >
                            사진삭제
                        </x-secondary-button>
                    @endif
                </div>

                <input
                    type="file"
                    class="hidden"
                    x-ref="part_photo"
                    wire:model.live="photo"
                    accept="image/*"
                    x-on:change="
                        const file = $refs.part_photo.files[0];
                        if (!file) return;

                        const reader = new FileReader();
                        reader.onload = (e) => {
                            photoPreview = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    "
                >

                @if($img_path)
                    <div
                        x-show="!photoPreview"
                        class="w-full aspect-video rounded-lg bg-cover bg-center border"
                        style="background-image:url('{{ asset('storage/'.$img_path) }}')"
                    ></div>
                @endif

                <div x-show="photoPreview" style="display:none;">
                    <div
                        class="w-full aspect-video rounded-lg bg-cover bg-center border"
                        x-bind:style="'background-image: url(' + photoPreview + ')'"
                    ></div>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('isImageModalOpen', false)">
                취소
            </x-secondary-button>

            <x-button class="ms-3" wire:click="saveImage">
                저장
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>