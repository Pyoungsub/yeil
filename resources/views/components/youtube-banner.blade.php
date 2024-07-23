@props(['source' => 'https://cdn.devdojo.com/pines/videos/coast.mp4'])
<div class="">
    <div class="relative h-full w-full aspect-video">
        <video class="absolute top-0 left-0 w-full h-full object-cover" autoplay muted loop>
            <source src="{{ $source }}" type="video/mp4" >
        </video>
    </div>
    <!--iframe class="w-full aspect-video" src="https://www.youtube.com/embed/nBj7cuTq814?rel=0&amp;autoplay=1&mute=1" frameborder="0" allowfullscreen></iframe-->
</div>
