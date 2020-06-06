var method = null;
var table = null;
var url = null;

$("#btnAddBuku").click(function(){
    method = 'add';
    $("#modalBuku").modal('show');
    $("#BukuModalLabel").text("Add Buku");
    $("#form-buku")[0].reset();
});

$("#submitBukuModal").click(function(){
    var formDataUser = $("#form-buku").serialize();
    if(method == 'add'){
        url = base_url+'/BukuController/addBuku';
    } else {
        url = base_url+'/BukuController/updateBuku';
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

$(".btn-buku-delete").click(function(){
    var id = $(this).attr('id');
    if(confirm("Apakah anda yakin ingin menghapus data ini?")){
        $.ajax({
            data:{id:id},
            type: "GET",
            url: base_url+'/BukuController/deleteBuku',
            success:function(data){
                alert(data);
            }

        })
    }
});

$(".btn-buku-update").click(function(){
    var id = $(this).attr('id');
    $("#modalBuku").modal('show');
    $("#BukuModalLabel").text("Update Buku");
    method = "update";
    $.getJSON(base_url+"/BukuController/getDataBukuById/"+id,function(data){
        $("#judul").val(data[0].judul);
        $("#pengarang").val(data[0].pengarang);
        $("#penerbit").val(data[0].penerbit);
        $("#status").val(data[0].status);
        $("#id_kat_buku").val(data[0].id_kat_bukus);
        $("#id").val(data[0].id_buku);
        
    });
});




    