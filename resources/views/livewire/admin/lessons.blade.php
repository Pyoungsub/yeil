<div class="">
    <x-admin.sidebar />
    <div class="pt-12 max-w-7xl mx-auto">
        @if(count($lessons) > 0)
            <div class="pt-8 grid gap-16 divide-y">
                @foreach($lessons as $lesson)
                    <div class="grid bg-black p-2 rounded-lg">
                        <h1 class="font-bold text-white text-2xl">{{ $lesson->lesson_ko }}</h1>
                        <div class="mt-4 grid gap-8">
                            @foreach($lesson->purposes as $purpose)
                                <div class="bg-gray-100 p-2 rounded-lg border">
                                    <div class="flex items-center gap-4">
                                        <h2 class="font-bold text-xl">{{ $purpose->purpose_ko }}</h2>
                                        <button class="flex items-center" wire:click="openGroupModal({{$purpose->id}})">
                                            <span>수업이름</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><path d="M3 3h18v18H3zM12 8v8m-4-4h8"/></svg>
                                        </button>
                                        <button class="flex items-center" wire:click="openScheduleModal({{$purpose->id}})">
                                            <span>스케줄</span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><path d="M3 3h18v18H3zM12 8v8m-4-4h8"/></svg>
                                        </button>
                                    </div>
                                    <div class="mt-4 bg-gray-50 p-2 rounded-lg border">
                                        <h2 class="font-bold text-lg">스케줄</h2>
                                        <div class="flex gap-2">
                                            @foreach($purpose->schedules->groupBy('day_id') as $day_id => $schedules)
                                                <div class="mt-2">
                                                    <h3>{{ $schedules->first()->day->ko }}</h3>
                                                    <div class="grid gap-2">
                                                        @foreach($schedules->sortBy('from') as $schedule)
                                                            <div class="flex items-center gap-2 border rounded p-2">
                                                                <button wire:click="modifySchedule({{ $schedule->id }})" class="">
                                                                    {{ $schedule->from }} - {{ $schedule->to }} {{ $schedule->subject->subject }}
                                                                </button>
                                                                <button wire:confirm="{{ $schedule->from }} - {{ $schedule->to }} {{ $schedule->subject->subject }}를 삭제 하시겠습니까?" wire:click="deleteSchedule({{ $schedule->id }})">x</button>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                    <div class="mt-8 grid gap-4">
                                        @foreach($purpose->groups as $group)
                                            <div class="p-2 rounded-lg bg-gray-50 border">
                                                <div class="flex items-center gap-4">
                                                    <div class="flex items-center gap-2">
                                                        <h3 class="font-bold text-lg">{{ $group->group_ko }}</h3>
                                                        <button wire:click="modifyGroupModal({{$group->id}})"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg></button>
                                                        <button wire:confirm="{{ $group->group_ko }}를 삭제하시겠습니까?" wire:click="deleteGroup({{$group->id}})"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><path d="M3 3h18v18H3zM15 9l-6 6m0-6l6 6"/></svg></button>
                                                    </div>
                                                    <button class="flex items-center" wire:click="openAddPartModal({{$group->id}})">
                                                        <span>반추가</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><path d="M3 3h18v18H3zM12 8v8m-4-4h8"/></svg>
                                                    </button>
                                                    <button class="flex items-center" wire:click="openAdditionalPartModal({{$purpose->id}})">
                                                        <span>선택수업</span>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><path d="M3 3h18v18H3zM12 8v8m-4-4h8"/></svg>
                                                    </button>
                                                </div>
                                                <div class="grid gap-2 sm:grid-cols-2">
                                                    @foreach($group->parts as $part)
                                                        <div class="border p-2 bg-white rounded">
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
                                                @if( count($group->additional_parts)  > 0)
                                                    <div class="mt-4">
                                                        <h2 class="font-semibold">선택수업 목록</h2>
                                                        <div class="grid gap-2 sm:grid-cols-2">
                                                            @foreach($group->additional_parts as $additional_part)
                                                                <div class="border p-2 bg-white rounded">
                                                                    <div class="flex items-center gap-2">
                                                                        <span>{{ $additional_part->title }}</span>
                                                                        <span>{{ number_format($additional_part->price) }}원</span>
                                                                        <button>
                                                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="arcs"><polygon points="14 2 18 6 7 17 3 17 3 13 14 2"></polygon><line x1="3" y1="22" x2="21" y2="22"></line></svg>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        <x-dialog-modal wire:model.live="groupModal">
            <x-slot name="title">
                {{ __('수업이름 관리') }}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-2 gap-4">
                    <div class="">
                        <x-label for="group_name" value="{{ __('영문소문자') }}" />
                        <x-input id="group_name" wire:model="group_name" type="text" placeholder="eg. audition" />
                    </div>
                    <div class="">
                        <x-label for="group_name_ko" value="{{ __('수업이름') }}" />
                        <x-input id="group_name_ko" wire:model="group_name_ko" type="text" placeholder="예) 오디션" />
                    </div>
                </div>            
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('groupModal', false)" wire:loading.attr="disabled">
                    {{ __('취소') }}
                </x-secondary-button>

                <x-button class="ms-3" wire:click="saveGroup" wire:loading.attr="disabled">
                    {{ __('저장') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
        <x-dialog-modal wire:model.live="additionalSubjectModal">
            <x-slot name="title">
                {{ __('선택수업 관리') }}
            </x-slot>
            <x-slot name="content">
                <div class="grid grid-cols-2 gap-4">
                    <div class="">
                        <x-label for="title" value="{{ __('수업이름') }}" />
                        <x-input id="title" wire:model="title" type="text" placeholder="예) 오디션" />
                    </div>
                    <div class="">
                        <x-label for="price" value="{{ __('금액') }}" />
                        <x-input id="price" wire:model="price" x-mask="999999999" type="tel" />
                    </div>
                </div>            
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('additionalSubjectModal', false)" wire:loading.attr="disabled">
                    {{ __('취소') }}
                </x-secondary-button>

                <x-button class="ms-3" wire:click="saveAdditionalSubject" wire:loading.attr="disabled">
                    {{ __('저장') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
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
        <x-dialog-modal wire:model.live="addPartModal">
            <x-slot name="title">
                {{ __('반추가') }}
            </x-slot>

            <x-slot name="content">
                <div class="">
                    <x-label for="part" value="{{ __('URL을 위한 영어로 된 반이름') }}" />
                    <x-input id="part" wire:model="part" type="text" placeholder="예) audition-a" />
                </div>
                <div class="">
                    <x-label for="part_ko" value="{{ __('반이름') }}" />
                    <x-input id="part_ko" wire:model="part_ko" type="text" placeholder="예) 오디션 정규반 A" />
                </div>
                <div class="">
                    <x-label for="description" value="{{ __('수업내용') }}" />
                    <x-input id="description" wire:model="description" type="text" placeholder="예) 보컬개인 주 1회 + 프리패스" />
                </div>
                <div class="">
                    <x-label for="price" value="{{ __('금액') }}" />
                    <x-input id="price" wire:model="price" type="tel" placeholder="예) 600000" />
                </div>
            </x-slot>
            <x-slot name="footer">
                <x-secondary-button wire:click="$set('addPartModal', false)" wire:loading.attr="disabled">
                    {{ __('취소') }}
                </x-secondary-button>

                <x-button class="ms-3" wire:click="addPart" wire:loading.attr="disabled">
                    {{ __('저장') }}
                </x-button>
            </x-slot>
        </x-dialog-modal>
    </div>
</div>
