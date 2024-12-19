<div class="">
    @if(count($auditions) > 0)
        <div class="max-w-5xl mx-auto px-2 lg:px-0">
            <h1 class="font-bold py-2 text-2xl">이달의 오디션</h1>
            <div class="grid sm:grid-cols-2 md:grid-cols-3 gap-4">
                @foreach($auditions as $audition)
                    <a href="{{ route('audition', ['id' => $audition->id]) }}">
                        <div class="mx-auto w-full aspect-square rounded-lg flex items-center justify-center" style="color:{{$audition->agency->text_color}};background-color:{{$audition->agency->bg_color}};">
                            <div class="">
                                <div class="h-28 flex justify-center items-center">
                                    <img class="w-24" src="{{ asset('storage/'.$audition->agency->logo_path) }}" alt="">
                                </div>
                                <h1 class="mt-4 font-bold text-3xl text-center whitespace-pre-wrap">{{$audition->description}}</h1>
                                <p class="mt-4 text-center">{{$audition->date}}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    @endif
</div>
