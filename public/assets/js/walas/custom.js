$(document).ready(function () {
    // --------------------Show Detail Siswa-------------------- //
    $(document).on("click", "#showSiswa", function (e) {
        e.preventDefault();
        var siswaId = $(this).attr("siswa_id");
        $(".modal-title").html("Detail Siswa");

        $.ajax({
            type: "get",
            url: "/laporan-perkembangan/show/" + siswaId,
            success: function (data) {
                $("#modalContent").html(`
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="/assets/images/photos/siswa/${
                                data.foto
                            }" class="img-fluid" />
                        </div>
                        <div class="col-md">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h4>${data.nama_depan} ${
                    data.nama_belakang
                }</h4>
                                </li>
                                <li class="list-group-item"><strong>NISN: </strong>${
                                    data.nisn
                                }</li>
                                <li class="list-group-item"><strong>TTL: </strong>${
                                    data.tempat_lahir
                                }, ${data.tanggal_lahir}</li>
                                <li class="list-group-item"><strong>Jenis Kelamin: </strong>${
                                    data.jenis_kelamin === "L"
                                        ? "Laki-Laki"
                                        : "Perempuan"
                                }</li>
                                <li class="list-group-item"><strong>Telp: </strong>${
                                    data.telp
                                }</li>
                                <li class="list-group-item"><strong>Nama Orang Tua: </strong>${
                                    data.nama_orang_tua
                                }</li>
                                <li class="list-group-item"><strong>Alamat Lengkap: </strong>${
                                    data.alamat
                                }</li>
                                <li class="list-group-item"><strong>Tanggal Masuk: </strong>${
                                    data.tanggal_masuk
                                }</li>
                                <li class="list-group-item"><strong>Tanggal Keluar: </strong>${
                                    data.tanggal_keluar != null ? "" : "-"
                                }</li>
                                <li class="list-group-item"><strong>Status: </strong>${
                                    data.status === 1 ? "Aktif" : "Tidak Aktif"
                                }</li>
                            </ul>
                        </div>
                    </div>
                </div>
                `);
            },
        });
    });

    // --------------------Bimbingan Fisik-------------------- //

    // Store Bimbingan Fisik
    $(document).on("click", "#addLaporanPerkembangan", function () {
        $("#LaporanPerkembanganData").trigger("reset");
        $(".modal-title").html("Tambah Laporan");

        $("#updateLaporanPerkembangan").addClass("d-none");
        $("#storeLaporanPerkembangan").removeClass("d-none");

        $("#siswaStore").removeClass("d-none");
        $("#indikatorStore").removeClass("d-none");
        $("#siswaUpdate").addClass("d-none");
        $("#indikatorUpdate").addClass("d-none");

        $(document).on("click", "#storeLaporanPerkembangan", function (e) {
            e.preventDefault();

            var siswaId = $("#siswaId").val();
            var indikatorId = $("#indikatorId").val();
            var nilai = $("#nilai").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: "/laporan-perkembangan",
                data: {
                    siswaId: siswaId,
                    indikatorId: indikatorId,
                    nilai: nilai,
                },
                success: function (response) {
                    $("#indikatorData").trigger("reset");
                    $("#myModal").modal("hide");
                    window.location.reload(true);
                },
                error: function (error) {
                    const errorMessage = error.responseJSON.message;
                    console.log(errorMessage);
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

    // Update Laporan Perkembangan
    $(document).on("click", "#editLaporanPerkembangan", function (e) {
        e.preventDefault();

        $("#storeLaporanPerkembangan").addClass("d-none");
        $("#updateLaporanPerkembangan").removeClass("d-none");

        $("#siswaStore").addClass("d-none");
        $("#indikatorStore").addClass("d-none");
        $("#siswaUpdate").removeClass("d-none");
        $("#indikatorUpdate").removeClass("d-none");

        var LaporanPerkembangan_id = $(this).attr("LaporanPerkembangan_id");
        // console.log(indikator_id);
        $.get(
            "/laporan-perkembangan/" + LaporanPerkembangan_id,
            function (data) {
                // console.log(data);
                $(".modal-title").html("Ubah Laporan");
                $("#namaSiswa").val(
                    data.siswa.nama_depan + " " + data.siswa.nama_belakang
                );
                $("#namaIndikator").val(data.indikator);
                $("#LaporanPerkembanganId").val(data.laporan.id);
                $("#nilai").val(data.laporan.nilai);
            }
        );

        $(document).on("click", "#updateLaporanPerkembangan", function (e) {
            e.preventDefault();

            var LaporanPerkembanganId = $("#LaporanPerkembanganId").val();
            console.log(LaporanPerkembanganId);
            var nilai = $("#nilai").val();

            // console.log(indikatorId);

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: "/laporan-perkembangan/" + LaporanPerkembanganId,
                data: {
                    nilai: nilai,
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

    // Delete Laporan Perkembangan
    $(document).on("click", "#deleteLaporanPerkembangan", function (e) {
        e.preventDefault();
        var LaporanPerkembangan_id = $(this).attr("LaporanPerkembangan_id");
        $(document).on("click", "#destroyLaporanPerkembangan", function (e) {
            e.preventDefault();
            // console.log(indikatorId);
            $.ajax({
                type: "get",
                url: "/laporan-perkembangan/delete/" + LaporanPerkembangan_id,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });
});
