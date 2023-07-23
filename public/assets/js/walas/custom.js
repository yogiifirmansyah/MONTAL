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
                const anak_ke = data.siswa.anak_ke.split(",");
                $("#modalContent").html(`
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="/assets/images/photos/siswa/${
                                data.siswa.foto
                            }" class="img-fluid" />
                        </div>
                        <div class="col-md">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <h4>${data.siswa.nama_depan} ${
                    data.siswa.nama_belakang
                }</h4>
                                </li>
                                <li class="list-group-item"><strong>Email: </strong>${
                                    data.user.email
                                } | Password: </strong> ${data.siswa.nisn}</li>
                                <li class="list-group-item"><strong>NISN: </strong>${
                                    data.siswa.nisn
                                }</li>
                                <li class="list-group-item"><strong>TTL/Usia: </strong>${
                                    data.siswa.tempat_lahir
                                }, ${data.siswa.tanggal_lahir} / ${
                    data.usia
                }</li>
                                <li class="list-group-item"><strong>Jenis Kelamin: </strong>${
                                    data.siswa.jenis_kelamin === "L"
                                        ? "Laki-Laki"
                                        : "Perempuan"
                                }</li>
                                <li class="list-group-item"><strong>Agama: </strong>${
                                    data.siswa.agama
                                }</li>
                                <li class="list-group-item"><strong>Telp: </strong>${
                                    data.siswa.telp
                                }</li>
                                <li class="list-group-item"><strong>Nama Orang Tua: </strong>${
                                    data.siswa.nama_orang_tua
                                }</li>
                                <li class="list-group-item"><strong>Pekerjaan Orang Tua: </strong>${
                                    data.siswa.pekerjaan_orang_tua
                                }</li>
                                <li class="list-group-item"><strong>Anak ke dari jumlah saudara: </strong> ke ${
                                    anak_ke[0]
                                } dari ${anak_ke[1]} bersaudara</li>
                                <li class="list-group-item"><strong>Alamat Lengkap: </strong>${
                                    data.siswa.alamat
                                }</li>
                                <li class="list-group-item"><strong>Tanggal Masuk: </strong>${
                                    data.siswa.tanggal_masuk
                                }</li>
                                <li class="list-group-item"><strong>Tanggal Keluar: </strong>${
                                    data.siswa.tanggal_keluar != null ? "" : "-"
                                }</li>
                                <li class="list-group-item"><strong>Status: </strong>${
                                    data.siswa.status === 1
                                        ? "Aktif"
                                        : "Tidak Aktif"
                                }</li>
                            </ul>
                        </div>
                    </div>
                </div>
                `);
            },
        });
    });

    // --------------------Laporan Perkembangan-------------------- //

    // Store Laporan Perkembangan
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

    // --------------------Pertanyaan Umum-------------------- //

    // Delete Pertanyaan Umum
    $(document).on("click", "#deletePertanyaanUmum", function (e) {
        e.preventDefault();
        var PertanyaanUmum_id = $(this).attr("PertanyaanUmum_id");
        $(document).on("click", "#destroyPertanyaanUmum", function (e) {
            e.preventDefault();
            // console.log(indikatorId);
            $.ajax({
                type: "get",
                url: "/instrumen/delete/" + PertanyaanUmum_id,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });

    // --------------------Instrumen 2-------------------- //

    // Delete Instrumen 2
    $(document).on("click", "#deleteInstrumen2", function (e) {
        e.preventDefault();
        var Instrumen2_id = $(this).attr("Instrumen2_id");
        $(document).on("click", "#destroyInstrumen2", function (e) {
            e.preventDefault();
            // console.log(indikatorId);
            $.ajax({
                type: "get",
                url: "/instrumen-2/delete/" + Instrumen2_id,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });

    // --------------------Pertanyaan Lanjutan-------------------- //

    // Delete Pertanyaan Lanjutan
    $(document).on("click", "#deletePertanyaanLanjutan", function (e) {
        e.preventDefault();
        var PertanyaanLanjutan_id = $(this).attr("PertanyaanLanjutan_id");
        $(document).on("click", "#destroyPertanyaanLanjutan1", function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url:
                    "/instrumen-1/pertanyaan-lanjutan-1/delete/" +
                    PertanyaanLanjutan_id,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });

        $(document).on("click", "#destroyPertanyaanLanjutan2", function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url:
                    "/instrumen-1/pertanyaan-lanjutan-2/delete/" +
                    PertanyaanLanjutan_id,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });

        $(document).on("click", "#destroyPertanyaanLanjutan3", function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url:
                    "/instrumen-1/pertanyaan-lanjutan-3/delete/" +
                    PertanyaanLanjutan_id,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });

        $(document).on("click", "#destroyPertanyaanLanjutan4", function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url:
                    "/instrumen-1/pertanyaan-lanjutan-4/delete/" +
                    PertanyaanLanjutan_id,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });

        $(document).on("click", "#destroyPertanyaanLanjutan5", function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url:
                    "/instrumen-1/pertanyaan-lanjutan-5/delete/" +
                    PertanyaanLanjutan_id,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });

        $(document).on("click", "#destroyPertanyaanLanjutan6", function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url:
                    "/instrumen-1/pertanyaan-lanjutan-6/delete/" +
                    PertanyaanLanjutan_id,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });

        $(document).on("click", "#destroyPertanyaanLanjutan7", function (e) {
            e.preventDefault();
            $.ajax({
                type: "get",
                url:
                    "/instrumen-1/pertanyaan-lanjutan-7/delete/" +
                    PertanyaanLanjutan_id,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });
});
