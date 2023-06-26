$(document).ready(function () {
    // Show Siswa With Modal
    $(document).on("click", "#showSiswa", function (e) {
        e.preventDefault();
        var siswaId = $(this).attr("siswa_id");

        $.ajax({
            type: "get",
            url: "/siswa/detail-nilai/" + siswaId,
            success: function (data) {
                let content = "";
                data.map((data) => {
                    return (content += `
                        <tr>
                            <td>${
                                data.indikator_id == 1
                                    ? "Olahraga"
                                    : "" || data.indikator_id == 2
                                    ? "Pemelihararan Kesehatan"
                                    : "" || data.indikator_id == 3
                                    ? "Keagamaan"
                                    : "" || data.indikator_id == 4
                                    ? "Kedisiplinan"
                                    : "" || data.indikator_id == 5
                                    ? "Sosial Perseorangan"
                                    : "" || data.indikator_id == 6
                                    ? "Sosial Kemasyarakatan"
                                    : "" || data.indikator_id == 7
                                    ? "Activity Daily Living"
                                    : "" || data.indikator_id == 8
                                    ? "Kemampuan Berelasi"
                                    : "" || data.indikator_id == 9
                                    ? "Berdiri Sendiri"
                                    : "" || data.indikator_id == 10
                                    ? "Mengendalikan Emosi"
                                    : "" || data.indikator_id == 11
                                    ? "Memecahkan Masalah"
                                    : "" || data.indikator_id == 12
                                    ? "Menyesuaikan Diri"
                                    : "" || data.indikator_id == 13
                                    ? "Kepercayaan Diri"
                                    : "" || data.indikator_id == 14
                                    ? "Mengambil Keputusan"
                                    : "" || data.indikator_id == 15
                                    ? "Bertanggung Jawab"
                                    : ""
                            }</td>
                            <td>${data.nilai}</td>
                        </tr>                 
                    `);
                });
                $("#modalContent").html(
                    `
                    <p>Indikator yang sudah terisi (${data.length}/15)</p>
                    <table class="table table-bordered">
                        <tr>
                            <th>Indikator</th>
                            <th>Nilai</th>
                        </tr>
                    ` +
                        content +
                        `</table>`
                );
            },
        });
    });
});
