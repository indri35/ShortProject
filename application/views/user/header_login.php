<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Business Casual - Start Bootstrap Theme</title>

    <script type="text/javascript">
        function coba(){
            gamgum.value = gamgam.value.substring(12);  
        }
    </script>

    <!-- DataTables -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables/dataTables.bootstrap.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datepicker/datepicker3.css"/>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url() ?>assets/user/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo base_url() ?>assets/user/css/business-casual.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/fonts/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/ionicons.min.css">
    <!-- Select2 -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/select2/select2.min.css">
    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
    <ul class="topnav">
  <li><a  href="<?php echo base_url() ?>UserPage/profil/">Hello <b><?php echo $this->session->userdata('nama'); ?></b></a></li>
  <li><a href="<?php echo base_url() ?>UserPage/my_request">Request Saya</a></li>
  <li class="right"><a href="<?php echo base_url() ?>UserPage/logout">Logout</a></li>
</ul>

    <div class="brand">Layanan Informasi Publik</div>
    <div class="address-bar">Sesuai UU No. 14 Tahun 2008 Tentang KIP - Pemerintah Kota</div>

    <!-- Navigation -->
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
                <a class="navbar-brand" href="index.html">Business Casual</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="<?php echo base_url() ?>">Beranda</a>
                    </li>
                    <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span >Permohonan</span>
                        </a>
                      <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url() ?>UserPage/form_perorangan">Perorangan</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>UserPage/form_berbadan_hukum">Kelompok Berbadan Hukum</a>
                            </li>
                            <li>
                                <a href="<?php echo base_url() ?>UserPage/form_tidak_berbadan_hukum">Kelompok Tidak Berbadan Hukum</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                      <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span>Download</span>
                        </a>
                      <ul class="dropdown-menu">
                            <li>
                                <a href="<?php echo base_url() ?>UserPage/form_keberatan" target="_blank">Form Keberatan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>UserPage/dokumen">Daftar Dokumen</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>UserPage/about">Tentang</a>
                    </li>
                    <li>
                        <a href="<?php echo base_url() ?>UserPage/kontak">Kontak Kami</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>