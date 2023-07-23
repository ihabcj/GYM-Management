<!DOCTYPE html>
<html lang="en">
<head>
  <title>GYM Application</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="jumbotron text-center">
    <h1> Flex GYM</h1>
    <div class="float-right mr-5">
        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add New Member</a>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-2">
        <div class="list-group">
            <a href="/index" class="list-group-item list-group-item-action">Trainer</a>
            <a href="/indexM" class="list-group-item list-group-item-action">Member</a>
        </div>
        </div>
        <div class="col-10">

        <table class="table">
        <thead>
            <tr>
                <td>ID</td>
                <td>Member Name</td>
                <td>Member Phone</td>
                <td>Trainer ID</td>
                <td>Edit</td>
                <td>Delete</td>
            </tr>
        </thead>

        <tbody>
        @foreach($member as $m)

            <tr>
                <td>{{$m->id}}</td>
                <td>{{$m->Member_Name}}</td>
                <td>{{$m->Member_Phone}}</td>
                <td>{{$m->mytrainer[0]->Trainer_Name}}</td>
                <td><a href="javascript:void(0)" class="btn btn-warning editbtn">Edit</a></td>
                <td>
                <form action="destroy/{{$m->id}}">
                <input type="submit" class="btn btn-danger" value="delete">
                </form>
                </td>
            </tr>

        @endforeach
        </tbody>
    </table>

        </div>

    </div>

 

</div>


<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Member</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        
        <form action="store" method="POST" id="form">
            @csrf
            <div class="form-group">
                <label for="">Member Name</label>
                <input type="text" id="Member_Name" name="Member_Name" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Member Phone</label>
                <input type="text" id="Member_Phone" name="Member_Phone" class="form-control">
            </div>

            <div class="form-group">
                <label for="">Trainer</label>
                    <select id="Trainer_id" name="Trainer_id">
                        <option value=" " selected disabled>Select Trainer</option>
                        @foreach($trainer as $t)
                            <option value="{{$t->id}}">{{ $t->Trainer_Name }}</option>
                        @endforeach
                    </select>
            </div>

            <div class="form-group">
                <input type="submit" id="submit" name="submit" class="btn btn-success">
            </div>
        </form>

      </div>

    </div>
  </div>
</div>

<script>
    $('.editbtn').click(function(e){

        trainerid = e.target.parentElement.previousElementSibling.innerText;
        phone = e.target.parentElement.previousElementSibling.previousElementSibling.innerText;
        name = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
        id = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
        console.log(trainerid + phone + name)

        $('#Trainer_id').val(trainerid);
        $('#Member_Phone').val(phone);
        $('#Member_Name').val(name);

        $('#form').attr('action','update/'+id);
        $('#form').append("<input type='hidden' name='_method' value='PUT'>");

        $('#myModal').modal('show');
    })
</script>
  

</body>
</html>
