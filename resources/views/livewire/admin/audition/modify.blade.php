<div class="flex">
    <x-admin.sidebar />
    <div class="pt-12 max-w-7xl mx-auto">
        <div class="pt-8 grid gap-16 divide-y">
            <div 
                x-data='{
                    agencies:@JSON($agencies),
                    selected_id:$wire.entangle("selected_id"),
                    description: $wire.entangle("description"),
                    date: $wire.entangle("date"),
                    modified_date: "",
                    formatDate(date) {
                        if(date)
                        {
                            const parsedDate = new Date(date); // Parse the input date
                            if (!isNaN(parsedDate.getTime())) {
                                const year = parsedDate.getFullYear();
                                const month = String(parsedDate.getMonth() + 1).padStart(2, "0");
                                const day = String(parsedDate.getDate()).padStart(2, "0");
                                const hours = String(parsedDate.getHours()).padStart(2, "0");
                                const minutes = String(parsedDate.getMinutes()).padStart(2, "0");
                                this.modified_date = `${year}/${month}/${day} ${hours}:${minutes}`;
                            } 
                        }
                        else 
                        {
                            this.modified_date = "";
                        }
                    }
                }'
                x-init="$watch('date', value => formatDate(value));"
            >
                <div class="mt-4">
                    <h1>기획사 목록</h1>
                    <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-8 gap-8">
                        <template x-for="(agency, index) in agencies">
                            <button type="button" @click="selected_id = agency.id;$wire.selected_id = selected_id;">
                                <div class="relative p-4 rounded-lg aspect-video rounded border-2" :style="{color:agency.text_color, backgroundColor: agency.bg_color}" :class="selected_id == agency.id ? 'border-blue-700': 'border-gray-300'">
                                    <img :src="'{{asset('storage')}}/'+agency.logo_path" :alt="agency.name" class="mx-auto w-1/3">
                                </div>
                                <p class="" x-text="agency.name"></p>
                            </button>
                        </template>
                    </div>
                    <x-label for="description" value="오디션 내용" />
                    <textarea id="description" x-model="description" class="w-full resize-none" wire:model="description"></textarea>
                    <x-label for="date" value="오디션 날짜" />
                    <x-input id="date" x-model="date" class="w-full" type="datetime-local" wire:model="date" />
                    <div class="mt-4">
                        <x-froala-editor class="mt-4" id="content" model="content" maxWidth="7xl" path="{{route('audition-image')}}" />
                    </div>
                    <div class="mt-4 flex items-center justify-end">
                        <x-button class="" wire:click="saveAudition">{{__('저장')}}</x-button>
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