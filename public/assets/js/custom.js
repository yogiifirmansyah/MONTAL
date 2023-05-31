$(document).ready(function () {
    // Store Variabel
    $(document).on("click", "#addVariabel", function () {
        $("#variabelData").trigger("reset");
        $(".modal-title").html("Tambah Variabel");

        $("#updateVariabel").addClass("d-none");
        $("#storeVariabel").removeClass("d-none");

        $(document).on("click", "#storeVariabel", function (e) {
            e.preventDefault();

            var variabelName = $("#variabelName").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: "/admin/variabel",
                data: {
                    variabelName: variabelName,
                },
                success: function (response) {
                    $("#variabelData").trigger("reset");
                    $("#myModal").modal("hide");
                    window.location.reload(true);
                },
                error: function (error) {
                    const errorMessage = error.responseJSON.message;
                    $("#errorMessage").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>
                            <li>${errorMessage}</li>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                },
            });
        });
    });

    // Update Variabel
    $(document).on("click", "#editVariabel", function (e) {
        e.preventDefault();

        $("#storeVariabel").addClass("d-none");
        $("#updateVariabel").removeClass("d-none");

        var variabel_id = $(this).attr("variabel_id");
        // console.log(variabel_id);
        $.get("/admin/variabel/" + variabel_id, function (data) {
            // console.log(data);
            $(".modal-title").html("Ubah Variabel");
            $("#variabelId").val(data.id);
            $("#variabelName").val(data.nama_variabel);
        });

        $(document).on("click", "#updateVariabel", function (e) {
            e.preventDefault();

            var variabelId = $("#variabelId").val();
            var variabelName = $("#variabelName").val();

            // console.log(variabelId);

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: "/admin/variabel/" + variabelId,
                data: {
                    variabelId: variabelId,
                    variabelName: variabelName,
                },
                success: function (response) {
                    $("#variabelData").trigger("reset");
                    $("#myModal").modal("hide");
                    window.location.reload(true);
                },
                error: function (error) {
                    const errorMessage = error.responseJSON.message;
                    $("#errorMessage").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>
                            <li>${errorMessage}</li>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                },
            });
        });
    });

    // Delete Variabel
    $(document).on("click", "#deleteVariabel", function (e) {
        e.preventDefault();
        var variabelId = $(this).attr("variabel_id");
        $(document).on("click", "#destroyVariabel", function (e) {
            e.preventDefault();
            // console.log(variabelId);
            $.ajax({
                type: "get",
                url: "/admin/variabel/delete/" + variabelId,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });

    // -------------------------------------------------------- //

    // Store Indikator
    $(document).on("click", "#addIndikator", function () {
        $("#indikatorData").trigger("reset");
        $(".modal-title").html("Tambah Indikator");

        $("#updateIndikator").addClass("d-none");
        $("#storeIndikator").removeClass("d-none");

        $(document).on("click", "#storeIndikator", function (e) {
            e.preventDefault();

            var variabelId = $("#variabelId").val();
            var indikatorName = $("#indikatorName").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: "/admin/indikator",
                data: {
                    variabelId: variabelId,
                    indikatorName: indikatorName,
                },
                success: function (response) {
                    $("#indikatorData").trigger("reset");
                    $("#myModal").modal("hide");
                    window.location.reload(true);
                },
                error: function (error) {
                    const errorMessage = error.responseJSON.message;
                    $("#errorMessage").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>
                            <li>${errorMessage}</li>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                },
            });
        });
    });

    // Update Indikator
    $(document).on("click", "#editIndikator", function (e) {
        e.preventDefault();

        $("#storeIndikator").addClass("d-none");
        $("#updateIndikator").removeClass("d-none");

        var indikator_id = $(this).attr("indikator_id");
        // console.log(indikator_id);
        $.get("/admin/indikator/" + indikator_id, function (data) {
            console.log(data);
            $(".modal-title").html("Ubah Indikator");
            $("#indikatorId").val(data.id);
            $("#indikatorName").val(data.nama_indikator);
        });

        $(document).on("click", "#updateIndikator", function (e) {
            e.preventDefault();

            var indikatorId = $("#indikatorId").val();
            var indikatorName = $("#indikatorName").val();
            var variabelId = $("#variabelId").val();

            // console.log(indikatorId);

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: "/admin/indikator/" + indikatorId,
                data: {
                    variabelId: variabelId,
                    indikatorName: indikatorName,
                },
                success: function (response) {
                    $("#indikatorData").trigger("reset");
                    $("#myModal").modal("hide");
                    window.location.reload(true);
                },
                error: function (error) {
                    const errorMessage = error.responseJSON.message;
                    $("#errorMessage").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Error!</strong>
                            <li>${errorMessage}</li>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `);
                },
            });
        });
    });

    // Delete Indikator
    $(document).on("click", "#deleteIndikator", function (e) {
        e.preventDefault();
        var indikatorId = $(this).attr("indikator_id");
        $(document).on("click", "#destroyIndikator", function (e) {
            e.preventDefault();
            // console.log(indikatorId);
            $.ajax({
                type: "get",
                url: "/admin/indikator/delete/" + indikatorId,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });
});
