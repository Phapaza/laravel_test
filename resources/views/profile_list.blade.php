@extends('layouts.app')

@section('content')
<div class="container">
<table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Firstname</th>
      <th scope="col">Lastname</th>
      <th scope="col">Email</th>
      <th scope="col">Mobile</th>
      <th scope="col">Setting</th>
    </tr>
  </thead>
  <tbody>
    <?php $i = 0; ?>
    @foreach($profile as $pf)
    <?php $i = $i+1; ?>
    <tr>
      <th scope="row">{{$i}}</th>
      <td>{{$pf->first_name}}</td>
      <td>{{$pf->last_name}}</td>
      <td>{{$pf->email}}</td>
      <td>{{$pf->mobile}}</td>
      <td><button class="btn btn-danger" onclick='delProfile("<?php echo $pf->id ?>")'>DELETE</button></td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
@endsection

<script>
   function delProfile(id,first_name) {

Swal.fire({
  title: 'Are you sure?',
  text: "You won't be able to revert this!",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, delete it!'
}).then((result) => {

  if (result.isConfirmed) {
    $.post('delProfile', {id:id}, function(response){
        Swal.fire(
        'Deleted!',
        'Your file has been delet.',
        'success'
          ).then((result)=>{
              location.reload();
          })
          });
      }
    })
  }
    <a href="formProfile">Create Profile</a>
</script>