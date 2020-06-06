var method = null;
var table = null;
var url = null;

$("#btnAddUser").click(function(){
    method = 'add';
    $("#modalUser").modal('show');
    $("#userModalLabel").text("Add User");
    $("#password").show();
    $("[for='password']").show();
    $("#form-user")[0].reset();
});

$("#submitUserModal").click(function(){
    var formDataUser = $("#form-user").serialize();
    if(method == 'add'){
        url = base_url+'/UserController/AddUser';
    } else {
        url = base_url+'/UserController/updateUser';
    }
    $.ajax({
        data:formDataUser,
        type:"POST",
        url: url,
        success:function(data){
            console.log(data);
        }
    })
});

$(".btn-user-delete").click(function(){
    var id = $(this).attr('id');
    if(confirm("Apakah anda yakin ingin menghapus data ini?")){
        $.ajax({
            data:{id:id},
            type: "GET",
            url: base_url+'/UserController/deleteUser',
            success:function(data){
                alert(data);
            }

        })
    }
});

$(".btn-user-update").click(function(){
    var id = $(this).attr('id');
    $("#modalUser").modal('show');
    $("#userModalLabel").text("Update User");
    $("#password").hide();
    $("[for='password']").hide();
    method = "update";
    $.getJSON(base_url+"/UserController/getDataUserById/"+id,function(data){
        $("#username").val(data[0].nama_user);
        $("#role").val(data[0].role);
        $("#status").val(data[0].status);
        $("#id").val(data[0].id_user);
        
    });
});




    