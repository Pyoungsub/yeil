@props(['id', 'maxWidth', 'model', 'path'])

@php
$id = $id ?? md5($attributes->wire('model'));
$path = $path ?? asset('/store/image');
$maxWidth = [
    'sm' => 'sm:max-w-sm',
    'md' => 'sm:max-w-md',
    'lg' => 'sm:max-w-lg',
    'xl' => 'sm:max-w-xl',
    '2xl' => 'sm:max-w-2xl',
    '3xl' => 'sm:max-w-3xl',
    '4xl' => 'sm:max-w-4xl',
    '5xl' => 'sm:max-w-5xl',
    '6xl' => 'sm:max-w-6xl',
    '7xl' => 'sm:max-w-7xl',
][$maxWidth ?? '2xl'];
@endphp
@push('scripts')
    <!-- Jquery -->
    <script src="{{asset('storage/froala/jquery-3.7.1.min.js')}}"></script>
    <!-- Style -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/codemirror/5.25.0/codemirror.min.css" rel="stylesheet" />
    <!-- Froala editor -->
    <script src="{{asset('storage/froala/froala.min.js')}}"></script>
    <script src="{{asset('storage/froala/ko.js')}}"></script>
    <!--Froala editor style. -->
    <link href="{{asset('storage/froala/froala.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('storage/froala/froala_style.min.css')}}" rel="stylesheet" type="text/css" />
@endpush
<div class="rounded-md min-h-fit border shadow-sm {{ $maxWidth }}" wire:ignore>
    <textarea
        id="{{ $id }}"
    >{{ $slot }}</textarea>
</div>
<script>
    $(document).ready(function(){
        var oldcontent;
        $('#{{ $id }}').froalaEditor({
            key: 'gB2F2B1I2xC4B3B3E4B5A1D1E4F1C2sd1Te1LXe1URVJe1DWXG==',
            language: 'ko',
            heightMin: 800,
            toolbarButtons: ['fullscreen', 'bold', 'italic', 'underline', 'subscript', 'superscript', '|', 'fontFamily', 'fontSize', 'color', '|', 'paragraphFormat', 'align', 'outdent', 'indent', '-', 'insertLink', 'insertImage', 'insertVideo', 'insertTable', '|', 'specialCharacters', 'insertHR', 'selectAll', 'clearFormatting', '|', 'print', 'help', 'html', '|', 'undo', 'redo'],
            imageInsertButtons: ['imageBack', '|', 'imageUpload', 'imageByURL'],
            imageDefaultWidth: 0,
            imageMaxSize: 30 * 1024 * 1024,
            imageUploadURL: "{{ $path }}",
            requestHeaders:{
                'x-csrf-token': '{{ csrf_token() }}'
            },
            imageUploadMethod: 'POST',
            requestWithCORS: true,
            videoUpload: false,
            fontFamily: {
                'MalgunGothic,sans-serif': '맑은고딕',
                'Gulim,sans-serif': '굴림',
                'Batang,serif': '바탕',
                'Dotum,sans-serif': '돋움',
                'Gungsuh,serif': '궁서',
                'Arial,Helvetica,sans-serif': 'Arial',
                'Georgia,serif': 'Georgia',
                'Impact,Charcoal,sans-serif': 'Impact',
                'Tahoma,Geneva,sans-serif': 'Tahoma',
                'Times New Roman,Times,serif,-webkit-standard': 'Times New Roman',
                'Verdana,Geneva,sans-serif': 'Verdana'
            },
            htmlAllowedStyleProps: ['font-family', 'font-size', 'background', 'color', 'width', 'height', 'text-align', 'vertical-align', 'background-color']
        }).on('froalaEditor.focus', function (e, editor, error, response){
            oldcontent = editor.html.get();
        }).on('froalaEditor.blur', function (e, editor)
        {
            if(oldcontent != editor.html.get())
            {
                // Do something here.
                @this.set('{{$model}}', editor.html.get());
            }
        }).on('froalaEditor.image.error', function (e, editor, error, response){
            console.log(error);
        });
    });
    // Listen for the Livewire event to insert the image
    document.addEventListener('livewire:init', function () {
        // Listen for the 'my-event' dispatched from Livewire
        Livewire.on('imageSelected', (data) => {
            if (data && data[0] && data[0]['url']) {
                $('#{{ $id }}').froalaEditor('html.insert', '<p><span class="fr-img-caption fr-fic fr-dib" style="width: 694px;"><span class="fr-img-wrap"><img src="' + data[0]['url'] + '" alt="Pixabay Image"><span class="fr-inner">출처 : 픽사베이</span></span></span></p>');
            } else {
                console.log('No image URL received'); // Output this if data is not as expected
            }
        });
    });
</script>