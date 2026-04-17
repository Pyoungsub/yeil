<div class="bg-black pt-8">
    <div class="py-8 max-w-5xl mx-auto p-2">
        <div class="flex items-center justify-center gap-2">
            <h2 class="text-4xl text-white font-bold"><span class="text-red-700">Y</span>EIL {{$group->group_ko}}</h2>
            @auth
                @if(auth()->user()->admin)
                    <button wire:click="openGroupPhotoModal" class="py-1 px-2 text-white border border-white rounded">수업안내 추가</button>
                @endif
            @endauth
        </div>
        <div class="mt-8 grid sm:grid-cols-3 gap-8">
            @foreach($group_photos as $group_photo)
                <div class="relative overflow-hidden rounded-2xl border w-full aspect-square bg-cover bg-no-repeat bg-center p-8 text-white"
                    style="background-image:url({{ $group_photo->img_path ? asset('storage/'.$group_photo->img_path ) : asset('storage/company/7cf4958d5002916a5141c3b18de475d8.png') }}" loading="lazy">
                    @auth
                        @if(auth()->user()->admin)
                            <div class="flex justify-between w-full z-10">
                                <div>
                                    <button wire:click.stop="openImageModal({{ $group_photo->id }})" class="relative border border-white text-white rounded px-2 z-10">수정</button>
                                    <button wire:click.stop="delete({{ $group_photo->id }})" class="relative border border-white text-white rounded px-2 z-10">삭제</button>
                                </div>
                            </div>
                        @endif
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
    
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