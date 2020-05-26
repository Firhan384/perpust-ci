var method = null;
var table = null;

$("#btnAddUser").click(function(){
    method = 'add';
    $("#modalUser").modal('show');
    $("#userModalLabel").text("Add User");
});