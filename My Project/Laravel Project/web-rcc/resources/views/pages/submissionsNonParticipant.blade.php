@extends('layout.base_layout')

{{-- title --}}
@section('title')
submissions participant
@endsection

{{-- link css buat submissions participant --}}
@section('link_css')
<link rel="stylesheet" href="{{ url('./assets/css/submissions.css') }}" crossorigin="anonymous">
<link rel="stylesheet" href="{{ url('./assets/vendor/filepond/dist/filepond.css') }}" crossorigin="anonymous">
@endsection

{{-- content submissions participant --}}
@section('content')
@include('pages.components.submissions.proofOfPayment')
@include('pages.components.submissions.proofOfMember')
@endsection

{{-- link js buat submissions participant--}}
@section('link_js')

<script src="{{url('./assets/js/browsefile.js')}}"></script>
<script>
  $('.edit-payment').on('click',function(event){
    console.log($(this).data('id'))
    let id = $(this).data('id')
    let conference = $(this).data('nama')
    $('#modal-edit').modal('show')
    $('#modal-edit').find('#custom-text3').text(`${conference}`)
    $('#modal-edit').find('#editForm').attr('action',`/Payments/${id}/Edit`)
  
        })
    
               //delete payments
               $('.trash-payments').on('click',function(){
                console.log($(this).data('id'))
                let id = $(this).data('id')

                $('#modal-delete').modal('show')
                $('#modal-delete').find('#deletePayments').attr('action',`/Payments/${id}/delete`)
              })
   // update member
 $('.edit-member').on('click',function(){
   console.log($(this).data('id'))
   let id = $(this).data('id')
   let file = $(this).data('nama')
   $('#modal-edit-members').modal('show')
   $('#modal-edit-members').find('#custom-text1').text(`${file}`)
   $('#modal-edit-members').find('#editMembers').attr('action',`/members/${id}/Edit`)
  })
  // delete members
  $('.delete-member').on('click',function(){
    console.log($(this).data('id'))
    let id = $(this).data('id')
    $('#modal-delete-members').modal('show')
    $('#modal-delete-members').find('#deleteMembers').attr('action',`/members/${id}/delete`)
  })
</script>
<script>
  // Size Max JavaScript
    const uploadField = document.querySelectorAll(".file-max");
    
    uploadField.forEach( function(e) {
      e.onchange = function() {
        if(this.files[0].size > 3097152){
          alert("File size exceeds 3MB");
          this.value = "";
        };
      };
    })
    
</script>
@endsection