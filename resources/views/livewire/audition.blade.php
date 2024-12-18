<div class="">
    <div class="max-w-5xl mx-auto">
        @auth
            @if(auth()->user()->admin)
                
                <x-dialog-modal wire:model="addAuditionModal" maxWidth="3xl">
                    <x-slot name="title">오디션 등록</x-slot>
                    <x-slot name="content">
                        @if($selected_agency)
                            
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
