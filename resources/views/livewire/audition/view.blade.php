<div class="max-w-7xl mx-auto">
    <div class="relative h-full w-full aspect-[9/16] md:rounded-lg md:aspect-video lg:aspect-[3/1] bg-no-repeat bg-center bg-cover" style="background-image:url( {{ asset('storage/'.$audition->img_path) }} )"></div>
    <div class="max-w-5xl mx-auto">
        <h1 class="mt-12 text-5xl font-bold">{{ $audition->description }}</h1>
        <h2>{{ $audition->date }}</h2>
    </div>
    
    <div class="flex items-center justify-center">{!! $audition->content !!}</div>
    
    
    {!! $audition->thumbnail_path !!}
</div>