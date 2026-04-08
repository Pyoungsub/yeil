
<div class="">
    <livewire:main-video />
    <livewire:courses />
    <livewire:audition />
    <x-promotion />
    @if(auth()->user()?->admin)
        <livewire:facilities />
    @else
        <x-facilities />
    @endif
    <x-instagram />
    <livewire:components.apply />
    <livewire:components.inquiries />
    <x-map />
    <x-footer.mobile-contact />
    <x-footer.web />
</div>