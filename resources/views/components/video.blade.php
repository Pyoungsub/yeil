@props(['source' => 'storage/video/7cf4958d5002916a5141c3b18de475d8.mp4'])
<div 
    x-data="{playing:false, muted:false}" 
    class="relative h-full w-full aspect-video"
    @click.outside="$refs.player.pause()"
    x-intersect:leave="$refs.player.pause()"
>
    <video x-ref="player" @play="playing = true" @pause="playing = false" class="absolute top-0 left-0 w-full h-full object-cover">
        <source src="{{ $source }}" type="video/mp4">
    </video>
    <div x-cloak x-show="!playing" @click="$refs.player.play()" class="absolute z-10 inset-0 flex items-center justify-center w-full h-full cursor-pointer">
         <svg class="w-16 h-16 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><polygon points="5 3 19 12 5 21 5 3"></polygon></svg>
    </div>
    <div x-show="playing" @click="$refs.player.pause()" class="absolute z-10 inset-0 flex items-center justify-center w-full h-full cursor-pointer">
        <svg class="w-16 h-16 text-white invisible" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="#FFFFFF" stroke-width="2" stroke-linecap="round" stroke-linejoin="arcs"><rect x="6" y="4" width="4" height="16"></rect><rect x="14" y="4" width="4" height="16"></rect></svg>
    </div>
    <div class="absolute bottom-2 right-2 m-4 bg-gray-900 text-white rounded-lg p-1 cursor-pointer z-20">
        {{-- mute --}}
        <svg x-show="!muted" @click="$refs.player.muted = true; muted = true" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="arcs"><polygon points="11 5 6 9 2 9 2 15 6 15 11 19 11 5"></polygon><path d="M19.07 4.93a10 10 0 0 1 0 14.14M15.54 8.46a5 5 0 0 1 0 7.07"></path></svg>
        {{-- unmute --}}
        <svg x-cloak x-show="muted" @click="$refs.player.muted=false;muted=false;" class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" stroke="#FFFFFF" stroke-width="3" stroke-linecap="round" stroke-linejoin="arcs"><path d="M11 5L6 9H2v6h4l5 4zM22 9l-6 6M16 9l6 6"/></svg>
    </div>
</div>
