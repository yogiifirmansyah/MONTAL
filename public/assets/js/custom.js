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

    // -------------------------------------------------------- //

    // Delete Wali kelas
    $(document).on("click", "#deleteWaliKelas", function (e) {
        e.preventDefault();
        var waliKelasId = $(this).attr("waliKelas_id");
        $(document).on("click", "#destroyWaliKelas", function (e) {
            e.preventDefault();
            // console.log(waliKelasId);
            $.ajax({
                type: "get",
                url: "/admin/wali-kelas/delete/" + waliKelasId,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });

    // Show Wali Kelas With Modal
    $(document).on("click", "#showWaliKelas", function (e) {
        e.preventDefault();
        var waliKelasId = $(this).attr("waliKelas_id");

        $.ajax({
            type: "get",
            url: "/admin/wali-kelas/show/" + waliKelasId,
            success: function (data) {
                $("#modalContent").html(`
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-3">
                            <img src="/assets/images/photos/${
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
                                <li class="list-group-item"><strong>NIP: </strong>${
                                    data.nip
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
                                <li class="list-group-item"><strong>Email: </strong>${
                                    data.email
                                }</li>
                                <li class="list-group-item"><strong>Alamat Lengkap: </strong>${
                                    data.alamat
                                }, ${data.desa}, ${data.kecamatan}, ${
                    data.kabupaten
                }, ${data.provinsi}</li>
                                <li class="list-group-item"><strong>Kode Pos: </strong>${
                                    data.kode_pos
                                }</li>
                            </ul>
                        </div>
                    </div>
                </div>
                `);
            },
        });
    });

    // -------------------------------------------------------- //

    // Store Kelas
    $(document).on("click", "#addKelas", function () {
        $("#kelasData").trigger("reset");
        $(".modal-title").html("Tambah Kelas");

        $("#updateKelas").addClass("d-none");
        $("#storeKelas").removeClass("d-none");

        $(document).on("click", "#storeKelas", function (e) {
            e.preventDefault();

            var kelasName = $("#kelasName").val();
            var waliKelasId = $("#waliKelasId").val();

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: "/admin/kelas",
                data: {
                    kelasName: kelasName,
                    waliKelasId: waliKelasId,
                },
                success: function (response) {
                    $("#kelasData").trigger("reset");
                    $("#myModal").modal("hide");
                    window.location.reload(true);
                },
                error: function (error) {
                    let errorMessage = error.responseJSON.message;
                    // console.log(errorMessage);
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

    // Update Kelas
    $(document).on("click", "#editKelas", function (e) {
        e.preventDefault();

        $("#storeKelas").addClass("d-none");
        $("#updateKelas").removeClass("d-none");

        var kelas_id = $(this).attr("kelas_id");
        // console.log(kelas_id);
        $.get("/admin/kelas/" + kelas_id, function (data) {
            // console.log(data);
            $(".modal-title").html("Ubah Kelas");
            $("#kelasId").val(data.id);
            $("#kelasName").val(data.nama_kelas);
        });

        $(document).on("click", "#updateKelas", function (e) {
            e.preventDefault();

            var kelasId = $("#kelasId").val();
            var kelasName = $("#kelasName").val();
            var waliKelasId = $("#waliKelasId").val();

            // console.log(kelasId);

            $.ajax({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                type: "POST",
                url: "/admin/kelas/" + kelasId,
                data: {
                    kelasId: kelasId,
                    kelasName: kelasName,
                    waliKelasId: waliKelasId,
                },
                success: function (response) {
                    $("#kelasData").trigger("reset");
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

    // Delete Kelas
    $(document).on("click", "#deleteKelas", function (e) {
        e.preventDefault();
        var kelasId = $(this).attr("kelas_id");
        $(document).on("click", "#destroyKelas", function (e) {
            e.preventDefault();
            // console.log(kelasId);
            $.ajax({
                type: "get",
                url: "/admin/kelas/delete/" + kelasId,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });

    // -------------------------------------------------------- //

    // Delete Siswa
    $(document).on("click", "#deleteSiswa", function (e) {
        e.preventDefault();
        var siswaId = $(this).attr("siswa_id");
        $(document).on("click", "#destroySiswa", function (e) {
            e.preventDefault();
            // console.log(siswaId);
            $.ajax({
                type: "get",
                url: "/admin/siswa/delete/" + siswaId,
                success: function () {
                    $("#myModalDelete").modal("hide");
                    window.location.reload(true);
                },
            });
        });
    });

    // Show Siswa With Modal
    $(document).on("click", "#showSiswa", function (e) {
        e.preventDefault();
        var siswaId = $(this).attr("siswa_id");

        $.ajax({
            type: "get",
            url: "/admin/siswa/show/" + siswaId,
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
});
