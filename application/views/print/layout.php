<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .container{
            max-width:400px;
        }
        .row{
            display:flex;
            flex-wrap:wrap;
        }
        .col-50{
            flex-basis:50%;
            max-width:50%;
        }
        .mb-10{
            margin-bottom:10px;
        }
        .content,
        .header{
            border-bottom: 1px solid #ccc;
        }
        .content{
            padding-bottom: 2rem;
        }
        .header,
        .footer{
            text-align: center;
        }
        .footer{
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>PT. Tsuraiya Sahabat Sunnah</h2>
            <h4>Umrah and Hajj Handling Service</h4>
            <p>Jl. Kapas Raya Utara No.823, Kota Semarang. Whatsapp : 085799942323,         Email: info@tsuraiyatourtravel.co.id</p>
            
        </div>
        <div class="content">
            <?php $this->load->view($content); ?>
        </div>
        <footer class="footer">
            <p>Terima kasih atas kepercayaan anda menggunakan layanan kami</p>
        </footer>
    </div>
    <script>
        window.print()
    </script>
</body>
</html>