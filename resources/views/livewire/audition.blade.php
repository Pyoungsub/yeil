<div class="">
    <div class="max-w-5xl mx-auto">
        @auth
            @if(auth()->user()->admin)
                <div class="">
                    <x-button wire:click="addAgency">기획사 등록</x-button>
                </div>
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
                <x-dialog-modal wire:model="addAuditionModal" maxWidth="3xl">
                    <x-slot name="title">오디션 등록</x-slot>
                    <x-slot name="content">
                        @if($selected_agency)
                            <div x-data="{
                                    description: $wire.entangle('description'),
                                    date: $wire.entangle('date'),
                                    modified_date: '',
                                    formatDate(date) {
                                        if(date)
                                        {
                                            const parsedDate = new Date(date); // Parse the input date
                                            if (!isNaN(parsedDate.getTime())) {
                                                const year = parsedDate.getFullYear();
                                                const month = String(parsedDate.getMonth() + 1).padStart(2, '0');
                                                const day = String(parsedDate.getDate()).padStart(2, '0');
                                                const hours = String(parsedDate.getHours()).padStart(2, '0');
                                                const minutes = String(parsedDate.getMinutes()).padStart(2, '0');
                                                this.modified_date = `${year}/${month}/${day} ${hours}:${minutes}`;
                                            } 
                                        }
                                        else 
                                        {
                                            this.modified_date = '';
                                        }
                                    }
                                }" x-init="$watch('date', value => formatDate(value));"
                            >
                                <div class="max-w-80 rounded-lg py-8" style="color:{{$selected_agency->text_color}};background-color:{{$selected_agency->bg_color}};">
                                    <div class="flex justify-center">
                                        <img class="w-1/3" src="{{ asset('storage/'.$selected_agency->logo_path) }}" alt="">
                                    </div>
                                    <h1 x-html="description" class="mt-4 font-bold text-3xl text-center whitespace-pre-wrap"></h1>
                                    <p x-html="modified_date" class="mt-4 text-center"></p>
                                </div>
                                <div class="">
                                    <x-label for="description" value="오디션 내용" />
                                    <textarea id="description" x-model="description" class="w-full resize-none" wire:model="description"></textarea>
                                    <x-label for="date" value="오디션 날짜" />
                                    <x-input id="date" x-model="date" class="w-full" type="datetime-local" wire:model="date" />
                                </div>
                            </div>
                        @endif
                    </x-slot>
                    <x-slot name="footer">
                        <x-secondary-button wire:click="$set('addAuditionModal', false)" wire:loading.attr="disabled">
                            {{ __('Close') }}
                        </x-secondary-button>
                        <x-button class="ms-3" wire:click="saveAudition" wire:loading.attr="disabled">
                            {{ __('저장') }}
                        </x-button>
                    </x-slot>
                </x-dialog-modal>
                @if( count($agencies)>0 )
                    <div class="mt-4">
                        <h1>등록된 기획사 목록</h1>
                        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-8">
                            @foreach($agencies as $agency)
                                <div class="">
                                    <div class="relative p-4 rounded-lg aspect-video" style="color:{{$agency->text_color}};background-color:{{$agency->bg_color}};">
                                        <img src="{{asset('storage/'.$agency->logo_path)}}" alt="{{$agency->name}}" class="mx-auto w-1/3">
                                        <p class="absolute bottom-0">{{$agency->name}}</p>
                                    </div>
                                    <x-button wire:click="addAudition({{$agency->id}})">오디션 등록</x-button>
                                </div>
                            @endforeach    
                        </div>
                    </div>
                    {{ $agencies->links() }}
                @endif
            @endif
        @endauth
    </div>
    @if(count($auditions) > 0)
        <div class="max-w-5xl mx-auto px-2 lg:px-0">
            <h1 class="font-bold py-2 text-2xl">이달의 오디션</h1>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($auditions as $audition)
                    <div class="mx-auto w-full aspect-square rounded-lg flex items-center justify-center" style="color:{{$audition->agency->text_color}};background-color:{{$audition->agency->bg_color}};">
                        <div class="">
                            <div class="h-28 flex justify-center items-center">
                                <img class="w-24" src="{{ asset('storage/'.$audition->agency->logo_path) }}" alt="">
                            </div>
                            <h1 class="mt-4 font-bold text-3xl text-center whitespace-pre-wrap">{{$audition->description}}</h1>
                            <p class="mt-4 text-center">{{$audition->date}}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>
