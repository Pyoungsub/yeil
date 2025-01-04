<div class="flex">
    <x-admin.sidebar />
    <div class="pt-12 max-w-7xl mx-auto">
        <div class="pt-8 grid gap-16 divide-y">
            <div 
                x-data='{
                    title: $wire.entangle("title"),
                }'
            >
                <div class="mt-4">
                    <x-label for="title" value="이벤트 제목" />
                    <textarea id="title" x-model="title" class="w-full resize-none" wire:model="title"></textarea>
                    <div class="mt-4">
                        <x-froala-editor class="mt-4" id="content" model="content" maxWidth="7xl" path="{{route('audition-image')}}" />
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        <x-button class="" wire:click="savePromotion">{{__('저장')}}</x-button>
                    </div>
                    @if ($errors->any())
                        <ul class="text-red-500 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>