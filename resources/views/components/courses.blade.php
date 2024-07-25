<div class="mt-12 max-w-5xl mx-auto">
    <div class="text-center">
        <p class="px-2 border rounded-full max-w-fit mx-auto">맞춤 클래스 수강생을 위한 <span class="font-black">아주 특별한 혜택</span></p>
        <h2 class="mt-6 text-3xl md:text-4xl lg:text-5xl font-extrabold">예일아카데미 데뷔 프로젝트<br>ALL-CARE-SERVICE</h2>
        <p>티타늄. 초강력. 초경량. 초프로.</p>
    </div>
    <div class="mt-12 grid sm:grid-cols-2 gap-4 px-2 sm:px-0">
        <a href="{{ route('lessons', ['lesson' => 'vocal']) }}">
            <div class="relative overflow-hidden rounded-2xl border w-full aspect-square bg-cover bg-no-repeat bg-center p-8" style="background-image:url({{asset('storage/vocal/d11dcef2-f2ad-440e-938e-9f4fff81bb8b.png')}})">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 text-white">
                    <h2 class="text-3xl font-bold text-white">보컬</h2>
                </div>
            </div>
        </a>
        <a href="{{ route('lessons', ['lesson' => 'dance']) }}">
            <div class="relative overflow-hidden rounded-2xl border w-full aspect-square bg-cover bg-no-repeat bg-center p-8" style="background-image:url({{asset('storage/vocal/d11dcef2-f2ad-440e-938e-9f4fff81bb8b.png')}})">
                <div class="absolute inset-0 bg-black opacity-50"></div>
                <div class="relative z-10 text-white">
                    <h2 class="text-3xl font-bold text-white">댄스</h2>
                </div>
            </div>
        </a>
    </div>
</div>