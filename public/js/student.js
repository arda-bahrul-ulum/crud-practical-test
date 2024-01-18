$(function () {
    // get data
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    var table = $("#tableStudent").DataTable({
        // scrollX: true,
        // serverSide: true,
        processing: true,
        ajax: routeIndex,
        columns: [
            {
                data: "DT_RowIndex",
                name: "DT_RowIndex",
                searchable: false,
            },
            {
                data: "action",
                name: "Action",
                // orderable: false,
                searchable: false,
            },
            {
                data: "fullname",
                name: "Full Name",
            },
            {
                data: "date_of_birth",
                name: "Date of Birth",
            },
            {
                data: "gender",
                name: "Gender",
            },
            {
                data: "mobile_phone",
                name: "Mobile Phone",
            },
            {
                data: "address",
                name: "Address",
            },
        ],
    });

    $("#tambahStudent").click(function () {
        $("#id_student").val();
        $("#formStudent").trigger("reset");
        $("#modalHeading").html("Tambah Data Student");
        $("#modalStudent").modal("show");
    });

    // simpan data
    $("#btnSimpan").click(function (e) {
        e.preventDefault();

        var data = $("#formStudent").serialize();

        $.ajax({
            data: data,
            url: routeSimpan,
            type: "POST",
            dataType: "json",
            success: function (data) {
                $("#formStudent").trigger("reset");
                $("#modalStudent").modal("hide");
                table.ajax.reload();

                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Data berhasil disimpan",
                    showConfirmButton: false,
                    timer: 1500,
                });
            },
            error: function (data) {
                console.log("Error: " + data);
                $("#btnSimpan").html("Simpan");
            },
        });
    });

    // hapus data
    $("body").on("click", ".hapusStudent", function () {
        var idStudent = $(this).data("id");
        Swal.fire({
            title: "Apakah kamu yakin?",
            text: "Anda tidak akan dapat mengembalikan data ini!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            confirmButtonText: "Ya, hapus",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: routeSimpan + "/" + idStudent,
                    success: function (data) {
                        table.ajax.reload();

                        Swal.fire(
                            "Terhapus!",
                            "Data anda telah dihapus.",
                            "success"
                        );
                    },
                    error: function (data) {
                        console.log("Error: " + data);
                    },
                });
            }
        });
    });

    // edit data
    $("body").on("click", ".editStudent", function () {
        var idStudent = $(this).data("id");
        $.get(routeIndex + "/" + idStudent + "/edit", function (data) {
            $("#modalHeading").html("Edit Data Student");
            $("#modalStudent").modal("show");
            // data
            $("#id_student").val(data.id);
            $("#fullname").val(data.fullname);
            $("#date_of_birth").val(data.date_of_birth);
            $("#gender").val(data.gender);
            $("#mobile_phone").val(data.mobile_phone);
            $("#address").val(data.address);
        });
    });
});
