@extends('layout.base_layout')

{{-- title --}}
@section('title')
Download
@endsection

{{-- link css buat download --}}
@section('link_css')
<link rel="stylesheet" href="{{ url('./assets/css/paper_template.css') }}" crossorigin="anonymous">
@endsection

{{-- download commitee --}}
@section('content')
@include('pages.components.download.paperTemplate')
@if(empty($audience) || $certificate->status == "off")
@else

@if(Auth::check() && $audience->conference_id == $conference->conference_id )
@if(empty($payment) || $payment->status != 1)
@else
@include('pages.components.download.certificate')
@endif
@else
@endif
@endif
@endsection

{{-- link js buat page download --}}
@section('link_js')
<script>
    const canvas = document.getElementById("canvas");
        const ctx = canvas.getContext("2d");
        const nameInput = document.getElementById("names");
        const downloadBtn = document.getElementById("download-btn");
        const image = new Image();
        image.src = "{{'../assets/img/sertif.jpg'}}";
        image.onload = function () {
        drawImage();
        };
        function drawImage() {
        // ctx.clearRect(0, 0, canvas.width, canvas.height)
        // Create a red line in position 150
        ctx.drawImage(image, 0, 0, canvas.width, canvas.height);
     
        // ctx.fillStyle = "black";
        // ctx.textAlign = "center";  
        // ctx.fillText(nameInput.value,335, 380);
        ctx.stroke();
        ctx.font = "85px monotype corsiva";
        ctx.textAlign='center';
        ctx.fillText(nameInput.value,545,350);
        }
        nameInput.addEventListener("input", function () {
        drawImage();
        });
        downloadBtn.addEventListener("click", function () {
        downloadBtn.href = canvas.toDataURL("image/jpg");
        downloadBtn.download = "Certificate - " + nameInput.value;
        });
</script>
@endsection