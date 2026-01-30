<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Surat Lamaran</title>

    <!-- CSS Vendor -->
    <link rel="stylesheet" href="../../../app-assets/css/bootstrap.min.css">

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: #eef1f5;
        }

        /* CENTER WRAPPER */
        .wrapper {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            padding: 30px;
        }

        /* MAIN CONTAINER */
        .container-dua {
            display: flex;
            width: 1600px;     
            max-width: 95vw;    
            gap: 24px;
        }


        /* FORM PANEL */
        .panel {
            width: 45%;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            overflow-y: auto;
            box-shadow: 0 5px 15px rgba(0,0,0,.1);
        }

        .panel h3 {
            margin-bottom: 15px;
        }

        .panel label {
            font-weight: 600;
            margin-top: 12px;
            display: block;
        }

        .panel input,
        .panel textarea {
            width: 100%;
            padding: 10px;
            margin-top: 6px;
            border-radius: 6px;
            border: 1px solid #ccc;
        }

        .panel button {
            margin-top: 12px;
            padding: 10px;
            width: 100%;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        .btn-print { background: #0d6efd; }
        .btn-clear { background: #dc3545; }
        .btn-save  { background: #198754; }

        /* PREVIEW */
        .preview {
            width: 55%;
            background: #d1d5db;
            padding: 20px;
            border-radius: 10px;
            display: flex;
            justify-content: center;
        }

        .paper {
            background: white;
            width: 21cm;
            min-height: 29.7cm;
            padding: 3cm;
            box-shadow: 0 0 20px rgba(0,0,0,.25);
        }

        .paper h2 {
            text-align: center;
            text-decoration: underline;
        }

        .right {
            text-align: right;
        }

        /* RESPONSIVE */
        @media (max-width: 992px) {
            .container-dua {
                flex-direction: column;
            }

            .panel,
            .preview {
                width: 100%;
            }
        }
    </style>
</head>

<body>

<div class="wrapper">
    <div class="container-dua">

        <!-- FORM -->
        <div class="panel">
            <h3>📄 Data Surat Lamaran</h3>

            <label>Kota</label>
            <input id="kota" placeholder="Kota">

            <label>Subjek Surat</label>
            <input id="subjek" placeholder="Lamaran Pekerjaan">

            <label>Penerima & Alamat</label>
            <textarea id="alamat" rows="3"
                placeholder="HRD Manager&#10;PT Aan Technology"></textarea>

            <label>Paragraf Pembukaan</label>
            <textarea id="pembukaan" rows="3"></textarea>

            <label>Paragraf Isi</label>
            <textarea id="isi" rows="4"></textarea>

            <label>Paragraf Penutup</label>
            <textarea id="penutup" rows="3"></textarea>

            <button class="btn-print" onclick="window.print()">🖨 Cetak</button>
            <button class="btn-clear" onclick="clearForm()">🧹 Clear</button>
            <button class="btn-save">💾 Simpan ke Database</button>
        </div>

        <!-- PREVIEW -->
        <div class="preview">
            <div class="paper">
                <h2>SURAT LAMARAN KERJA</h2>

                <p class="right">
                    <span id="pv-kota">Kota</span>
                </p>

                <p><b>Hal:</b> <span id="pv-subjek">Lamaran Pekerjaan</span></p>

                <p>
                    Kepada Yth,<br>
                    <span id="pv-alamat">HRD Manager<br>Nama Perusahaan</span>
                </p>

                <p id="pv-pembukaan"></p>
                <p id="pv-isi"></p>
                <p id="pv-penutup"></p>

                <br><br>
                <p>Hormat saya,</p>
                <br><br>
                <p><b>(Nama Lengkap)</b></p>
            </div>
        </div>

    </div>
</div>

<script>
function live(input, preview, fallback = "") {
    const i = document.getElementById(input);
    const p = document.getElementById(preview);

    const update = () => {
        p.innerHTML = i.value.replace(/\n/g, "<br>") || fallback;
    };

    i.addEventListener("input", update);
    update();
}

live("kota", "pv-kota", "Kota");
live("subjek", "pv-subjek", "Lamaran Pekerjaan");
live("alamat", "pv-alamat", "HRD Manager<br>Nama Perusahaan");
live("pembukaan", "pv-pembukaan");
live("isi", "pv-isi");
live("penutup", "pv-penutup");

function clearForm() {
    ["kota","subjek","alamat","pembukaan","isi","penutup"]
        .forEach(id => {
            document.getElementById(id).value = "";
            document.getElementById(id).dispatchEvent(new Event("input"));
        });
}
</script>

</body>
</html>
