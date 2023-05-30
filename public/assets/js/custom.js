$(document).ready(function () {
    $(document).on("click", "#addIndikator", function () {
        $("#indikatorData").trigger("reset");
        $(".modal-title").html("Tambah Indikator");

        $("#updateIndikator").addClass("d-none");
        $("#storeIndikator").removeClass("d-none");

        $(document).on("click", "#storeIndikator", function (e) {
            e.preventDefault();
            var indikatorName = $("#indikatorName").val();
            var variabelId = $("#variabelId").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: "/admin/indikator",
                data: {
                    indikatorName: indikatorName,
                    variabelId: variabelId,
                },
                success: function (response) {
                    $("#indikatorData").trigger("reset");
                    $("#kt_modal_1").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });

    $(document).on("click", "#editIndikator", function (e) {
        $("#storeIndikator").addClass("d-none");
        $("#updateIndikator").removeClass("d-none");
        var indikator_id = $(this).attr("indikator_id");
        // console.log(indikator_id);
        $.get("/admin/indikator/" + indikator_id, function (data) {
            // console.log(data);
            $(".modal-title").html("Ubah Indikator");
            $("#updateIndikator").html("Ubah");
            $("#indikatorId").val(data.data.id);
            $("#indikatorName").val(data.data.nama_indikator);
        });

        $(document).on("click", "#updateIndikator", function (e) {
            e.preventDefault();

            var indikatorId = $("#indikatorId").val();
            var indikatorName = $("#indikatorName").val();
            var variabelId = $("#variabelId").val();

            // console.log(variabelId);

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: "/admin/indikator/" + indikatorId,
                data: {
                    indikatorId: indikatorId,
                    indikatorName: indikatorName,
                    variabelId: variabelId,
                },
                success: function (response) {
                    $("#indikatorData").trigger("reset");
                    $("#kt_modal_1").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });
});
