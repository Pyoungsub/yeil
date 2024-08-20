<div class="mt-12 max-w-5xl mx-auto">
    <div class="mt-12 grid sm:grid-cols-2 gap-4 px-2 sm:px-0">
        <a href="{{ route('lessons', ['lesson' => 'vocal']) }}">
            <div class="relative overflow-hidden rounded-2xl border w-full aspect-video bg-cover bg-no-repeat bg-center p-8" style="background-image:url({{asset('storage/vocal/mNvXDdVAhpyDQWQSRBm3Ekt6xKBopMye5NqqKiut.png')}})">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 text-white">
                    <h2 class="text-3xl font-bold text-white">보컬학과</h2>
                </div>
            </div>
        </a>
        <a href="{{ route('lessons', ['lesson' => 'dance']) }}">
            <div class="relative overflow-hidden rounded-2xl border w-full aspect-video bg-cover bg-no-repeat bg-center p-8" style="background-image:url({{asset('storage/vocal/d11dcef2-f2ad-440e-938e-9f4fff81bb8b.png')}})">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 text-white">
                    <h2 class="text-3xl font-bold text-white">댄스학과</h2>
                </div>
            </div>
        </a>
    </div>
</div>