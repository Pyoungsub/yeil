<div class="flex">
    <x-admin.sidebar />
    <div class="pt-12 max-w-7xl mx-auto">
        <div class="">
            <x-button wire:click="addAgency">기획사 등록</x-button>
            <x-dialog-modal wire:model="addAgencyModal" maxWidth="sm">
                <x-slot name="title">기획사 등록</x-slot>
                <x-slot name="content">
                    <div class=""
                        x-data="{
                            logoPreview: $wire.entangle('logoPreview')
                        }"
                    >
                        <x-label for="" value="로고" />
                        <div class="rounded-lg bg-gray-50 p-4">
                            <!-- Current Profile Photo -->
                            <div class="" x-show="!logoPreview">
                                @if($logo_path)
                                    <img src="{{ asset('storage/'.$logo_path) }}" alt="{{ $logo_path }}" class="rounded w-full max-w-sm aspect-video object-cover">
                                @endif
                            </div>
                            <!-- New Profile Photo Preview -->
                            <div class="" x-show="logoPreview" style="display: none;">
                                <span class="mx-auto block rounded w-40 aspect-square bg-cover bg-no-repeat bg-center"
                                    x-bind:style="'background-image: url(\'' + logoPreview + '\');'">
                                </span>
                            </div>
                            <x-input-error for="logo" class="mt-2" />
                        </div>
                        <!-- Profile logo File Input -->
                        <input type="file" id="logo" class="hidden"
                            wire:model.live="logo"
                            accept="image/png"
                            x-ref="logo"
                            x-on:change="
                                photoName = $refs.logo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    logoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.logo.files[0]);
                            "
                        />
                        <x-secondary-button class="mt-2 me-2" type="button" x-on:click.prevent="$refs.logo.click()">
                            {{ __('새 사진 선택') }}
                        </x-secondary-button>
                        <div class="mt-4 w-full">
                            <x-label for="name" value="기획사 이름" />
                            <x-input id="name" wire:model="name" type="text" placeholder="SM Entertainment" />
                        </div>
                        <div class="grid grid-cols-2">
                            <div class="">
                                <x-label for="text_color" value="글씨 색" />
                                <input id="text_color" wire:model="text_color" type="color">
                            </div>
                            <div class="">
                                <x-label for="bg_color" value="배경 색" />
                                <input id="bg_color" wire:model="bg_color" type="color">
                            </div>
                        </div>
                    </div>
                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button wire:click="$set('addAgencyModal', false)" wire:loading.attr="disabled">
                        {{ __('Close') }}
                    </x-secondary-button>
                    <x-button class="ms-3" wire:click="saveAgency" wire:loading.attr="disabled">
                        {{ __('저장') }}
                    </x-button>
                </x-slot>
            </x-dialog-modal>
        </div>
        
        <div class="pt-8 grid gap-16 divide-y">
            <div class="">
                <a href="{{route('admin.audition.add')}}">오디션 추가</a>
            </div>
        </div>
    </div>
</div>