<div 
    class="max-w-5xl mx-auto mt-12 px-4 lg:px-0"
    x-data="{
        programs:$wire.entangle('programs'),
        purposes:[],
        groups:[],
        parts:[],
        selected_lesson:'',
        selected_purpose:'',
        selected_group:'',
        selected_part:'',
        show:false,
    }"
    x-init="
        $watch('selected_lesson', value => {
            find_array = programs.find(obj => obj.id === parseInt(value));
            if(find_array)
            {
                purposes = find_array.purposes;    
            }
            selected_purpose = '';
        });
        $watch('selected_purpose', value => {
            find_array = purposes.find(obj => obj.id === parseInt(value));
            if(find_array)
            {
                groups = find_array.groups;
            }
            selected_group = '';
        });
        $watch('selected_group', value => {
            find_array = groups.find(obj => obj.id === parseInt(value));
            if(find_array)
            {
                parts = find_array.parts;
            }
            selected_part = '';
        });
    "
>
    <h1 class="text-2xl font-bold">수업문의</h1>
    <div class="mt-4 grid md:grid-cols-2 lg:grid-cols-4 gap-2">
        <div class="group relative flex items-center  before:content-[''] before:absolute border">
            <label for="selected_purpose" class="px-2 w-20 flex-none text-sm">강의</label>
            <select name="" id="" x-model="selected_lesson" class="w-full border-0 focus:ring-0 disabled:cursor-not-allowed">
                <option value="" disabled>선택하세요</option>
                <template x-for="program in programs">
                    <option :value="program.id" x-text="program.lesson_ko"></option>
                </template>
            </select>
        </div>
        <div class="group relative flex items-center  before:content-[''] before:absolute border">
            <label for="selected_purpose" class="px-2 w-20 flex-none text-sm">클래스</label>
            <select name="selected_purpose" id="selected_purpose" x-model="selected_purpose" class="w-full border-0 focus:ring-0 disabled:cursor-not-allowed" :disabled="selected_lesson == ''">
                <option value="">선택하세요</option>
                <template x-for="purpose in purposes">
                    <option :value="purpose.id" x-text="purpose.purpose_ko"></option>
                </template>
            </select>
        </div>
        <div class="group relative flex items-center  before:content-[''] before:absolute border">
            <label for="selected_group" class="px-2 w-20 flex-none text-sm">등급</label>
            <select name="selected_group" id="selected_group" x-model="selected_group" class="w-full border-0 focus:ring-0 disabled:cursor-not-allowed" :disabled="selected_purpose == ''">
                <option value="">선택하세요</option>
                <template x-for="group in groups">
                    <option :value="group.id" x-text="group.group_ko"></option>
                </template>
            </select>
        </div>
        <div class="group relative flex items-center  before:content-[''] before:absolute border">
            <label for="selected_part" class="px-2 w-20 flex-none text-sm">수업내용</label>
            <select name="selected_part" id="selected_part" x-model="selected_part" class="w-full border-0 focus:ring-0 disabled:cursor-not-allowed" :disabled="selected_group == ''">
                <option value="">선택하세요</option>
                <template x-for="part in parts">
                    <option :value="part.id" x-text="part.part_ko"></option>
                </template>
            </select>
        </div>
    </div>
    @auth
        <button class="mt-2 text-white w-full py-2 bg-gray-800 hover:bg-black disabled:bg-gray-400 disabled:cursor-not-allowed" :disabled="selected_part == ''">문의하기</button>
    @else
        <button class="mt-2 text-white w-full py-2 bg-gray-800 hover:bg-black disabled:bg-gray-400 disabled:cursor-not-allowed" :disabled="selected_part == ''" @click="show = true">문의하기</button>
    @endauth
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
                    <button class="bg-yellow-300 rounded-lg p-3 font-bold" @click="$wire.login(selected_part)">카카오 로그인</button>
                </div>
            </div>
        </div>
    </div>
</div>
