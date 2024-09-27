<!DOCTYPE html>
<html lang="en">
<head>
    <link media="print" rel="Alternate" href="<?= base_url("file/".$file) ?>">
    <style>
        @media print {
            @page {
                size: A4 landscape;   
                margin: 0mm;  
                margin: 2cm;
            }

            .printThisFull {
                width:100%;
                height:100%;
                page-break-after:always
            }

        }

    </style>
</head>
<body>
    <iframe src="<?= base_url("file/".$file) ?>" alt="<?= base_url("file/".$file) ?>"></iframe>
</body>
<script type="text/javascript">
    window.print();
    // window.close();
</script>
</html>