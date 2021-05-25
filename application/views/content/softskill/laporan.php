<!DOCTYPE html>
<html>

<head>
    <title>Report Table</title>
    <style type="text/css">
    #outtable {
        padding: 20px;
        border: 1px solid #e3e3e3;
        width: 600px;
        border-radius: 5px;
    }

    .short {
        width: 50px;
    }

    .normal {
        width: 150px;
    }

    table {
        border-collapse: collapse;
        font-family: arial;
        color: #5E5B5C;
        table-layout: fixed;
        width: 100%;
    }

    thead th {
        text-align: left;
        padding: 10px;
    }

    tbody td {
        border-top: 1px solid #e3e3e3;
        padding: 10px;
    }

    tbody tr:nth-child(even) {
        background: #F6F5FA;
    }

    tbody tr:hover {
        background: #EAE9F5
    }
    </style>
</head>

<body>
    <div id="outtable">
        <table>
            <caption>Report Softskill</caption>
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIM Mahasiswa</th>
                    <th>Nama Mahasiswa</th>
                    <th>Total Poin</th>

                </tr>
            </thead>
            <tbody>
                <?php
$no = 1;
foreach ($daftarSoftskil as $row) {?>
                <tr>
                    <td><?=$no++?></td>
                    <td><?=$row->nim?></td>
                    <td><?=$row->nama?></td>
                    <td><?=$row->total?></td>

                </tr>
                <?php
}
?>
            </tbody>
        </table>
    </div>
</body>

</html>