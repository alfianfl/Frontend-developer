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
@include('pages.components.submissions.abstract')
@include('pages.components.submissions.fullPaper')
@endsection

{{-- link js buat submissions participant--}}
@section('link_js')
<script>
  // @if(session('Failed upload'))
  //       $('#addProofPayments').modal('show');
  // @endif
  
  // update  payments 
  $('.edit-payment').on('click',function(event){
    console.log($(this).data('id'))
    
    let id = $(this).data('id')
    let conference = $(this).data('nama')
   
 
    $('#modal-edit').modal('show')
    $('#modal-edit').find('#custom-text3').text(`${conference}`)
    $('#modal-edit').find('#editForm').attr('action',`/Payments/${id}/Edit`)
    // $.ajax({
      //   url:`/Payments/${id}/Edit`,
      //   method : "GET",
      //   datatype: "json",
      //   success: function(data){
        //     console.log(data)
        // $('#payment-modal').html(data)
        //   },
        //   error: function(error){
          //   console.log(error)
          
          //   }
          
          // })
        })
        // $('.btn-upload-payment').on('click',function(){
        //   console.log($(this).data('id'))
        //   let id = $(this).data('id')
        //   let formData= $('#editForm').serialize()
        //   $('#modal-edit').find('#editForm').attr('action',`/Payments/${id}/Update`)
        //   $.ajax({
        //       url:`/Payments/${id}/Update`,
        //       method : "POST",
        //       datatype: "json",
        //       data: formData,
        //       success: function(data){
        //           console.log(data)
        //       $('#modal-edit').modal('hide')
        //         },
        //         error: function(error){
        //           console.log(error)
                
        //           }
                
        //         })
        //       })
              //delete payments
              $('.trash-payments').on('click',function(){
                console.log($(this).data('id'))
                let id = $(this).data('id')

                $('#modal-delete').modal('show')
                $('#modal-delete').find('#deletePayments').attr('action',`/Payments/${id}/delete`)
              })
              // update abstract
              $('.edit-abstract').on('click',function(){
                console.log($(this).data('id'))
                let id = $(this).data('id')
                let file = $(this).data('file')
                let title = $(this).data('title')
                let author = $(this).data('author')
                $('#modal-edit-abstract').modal('show')
                $('#modal-edit-abstract').find('#custom-text5').text(`${file}`)
                $('#modal-edit-abstract').find('.title-abstract').val(title)
                $('#modal-edit-abstract').find('.author').val(author)
                $('#modal-edit-abstract').find('#editAbstract').attr('action',`/Abstract/${id}/Edit`)
              })
              // delete abstract
              $('.delete-abstract').on('click',function(){
                console.log($(this).data('id'))
                let id = $(this).data('id')
                $('#modal-delete-abstract').modal('show')
                $('#modal-delete-abstract').find('#deleteAbstract').attr('action',`/Abstract/${id}/delete`)
              })
              // update papers
              $('.edit-paper').on('click',function(){
                console.log($(this).data('id'))
             
                let id = $(this).data('id')
                let file = $(this).data('file')
                let title = $(this).data('title')
                let author = $(this).data('author')
                $('#modal-edit-paper').modal('show')
                $('#modal-edit-paper').find('#custom-text7').text(`${file}`)
                $('#modal-edit-paper').find('.title-paper').val(title)
                $('#modal-edit-paper').find('.author-paper').val(author)
                $('#modal-edit-paper').find('#editPapers').attr('action',`/papers/${id}/Edit`)
              })
              
 // delete papers
 
 $('.delete-paper').on('click',function(){
   console.log($(this).data('id'))
   let id = $(this).data('id')
   $('#modal-delete-papers').modal('show')
   $('#modal-delete-papers').find('#deletePapers').attr('action',`/papers/${id}/delete`)
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
  
  // downloads
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

<script src="{{url('./assets/js/browsefile.js')}}">
</script>
<script>
</script>

@endsection