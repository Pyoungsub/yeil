<div class="pt-12 max-w-7xl mx-auto">
    @if(count($lessons) > 0)
        <div class="pt-8 grid gap-8 divide-y">
            @foreach($lessons as $lesson)
                <div class="grid gap-8">
                    <h1 class="font-bold text-2xl">{{ $lesson->lesson_ko }}</h1>
                    @foreach($lesson->purposes as $purpose)
                        <div class="">
                            <div class="flex items-center">
                                <h2 class="font-bold text-xl">{{ $purpose->purpose_ko }}</h2>
                                <button class="flex items-center" wire:click="openScheduleModal({{$purpose->id}})">
                                    <span>스케줄</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><path d="M3 3h18v18H3zM12 8v8m-4-4h8"/></svg>
                                </button>
                            </div>
                            <div class="flex gap-2">
                                @foreach($purpose->schedules->groupBy('day_id') as $day_id => $schedules)
                                    <div class="">
                                        {{ $schedules->first()->day->ko }}
                                        @foreach($schedules->sortBy('from') as $schedule)
                                            <div class="flex items-center gap-2">
                                                <button wire:click="modifySchedule({{ $schedule->id }})" class="">
                                                    {{ $schedule->from }} - {{ $schedule->to }} {{ $schedule->subject->subject }}
                                                </button>
                                                <button wire:click="deleteSchedule({{ $schedule->id }})">x</button>
                                            </div>
                                        @endforeach
                                    </div>
                                @endforeach
                            </div>
                            <div class="mt-8 grid gap-8">
                                @foreach($purpose->groups as $group)
                                    <div class="">
                                        <h3 class="font-bold text-lg">{{ $group->group_ko }}</h3>
                                        <div class="grid gap-2">
                                            @foreach($group->parts as $part)
                                                <div class="border p-2">
                                                    <div class="flex items-center gap-2">
                                                        <span>{{ $part->part_ko }}</span>
                                                        <span>{{ $part->description }}</span>
                                                        <span>{{ number_format($part->price) }}원</span>
                                                        <button>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach  
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    @endif
    <!-- API Token Permissions Modal -->
    <x-dialog-modal wire:model.live="scheduleModal">
        <x-slot name="title">
            {{ __('시간표 관리') }}
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4"
                x-data='{
                    days:@Json($days),
                }'
            >
                <label>
                    <span class="block">요일</span>
                    <select name="" id="" wire:model="day_id">
                        <option value="">--선택--</option>
                        <template x-for="day in days" :key="day.id">
                            <option :value="day.id" x-text="day.ko"></option>
                        </template>
                    </select>
                </label>
                <label>
                    <span class="block">수업이름</span>
                    <select name="" id="" wire:model="subject_id">
                        <option value="">--선택--</option>
                        @if(count($subjects) > 0)
                            @foreach($subjects as $subject)
                                <option value="{{$subject->id}}">{{ $subject->subject }}</option>
                            @endforeach
                        @endif
                    </select>
                </label>
                <label>
                    <span class="block">시작시간</span>
                    <input type="time" wire:model="from">
                </label>
                <label>
                    <span class="block">종료시간</span>
                    <input type="time" wire:model="to">
                </label>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-secondary-button wire:click="$set('scheduleModal', false)" wire:loading.attr="disabled">
                {{ __('취소') }}
            </x-secondary-button>

            <x-button class="ms-3" wire:click="addSchedule" wire:loading.attr="disabled">
                {{ __('저장') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>
</div>
