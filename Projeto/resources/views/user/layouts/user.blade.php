<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>IFRN-Lib. | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Styles -->
    <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('public/dist/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{asset('public/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.7/css/all.css">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
        <!-- img src="https://doc-0g-64-docs.googleusercontent.com/docs/securesc/83rkc0qngerc2idihic52qqt2gcomid7/652mhc9lk7unqgpt4edr9fgd7anrkf1o/1648074675000/01663964981097955388/01663964981097955388/1pcMHNKaIhAkzbSk8fBleIfnP7VITfZMb?e=download&ax=ACxEAsYSMK_pm2GreQZtBYG30rtSj79CF96xOW990gKqxPJKbGe7WGFptYl7OsiiSdfkpluAwzkapTe2mXedNFij4VAODc3wVg3LJmkxFNyLBLITHZhdi95G4MUeznG8Ic0g996f8p7u8Im_lIAD7j-ZyydBP2UbfEorZ9_sZs1GT_MODbmu2up_pOw5e58y6qLI3LIf_VApTSc-DkljYKUmGTQ5Zb2mnd6rJXffNju5mjPbvnCBunBzgSPHHN9v9engZtOA2tUWBVnzHvpyFbWWkoQECe0t6xAftmtU7_4YuJ4DGzmtcBgfesaZs5Oo0aFuzob1no2V5YHlMyllgMM8TjHVu0-7tdJeeywSmcT5NbVy97mouhRuIXfbrjuDb8pULJy2I8Nr0PpAi55BygrTZc9toWzOCAhvBnVe8GV-aX_0qSu5wV8xop1PMs1itL3jV0ejU9qAg8kTOGTcR-PRXyk9Tdk1uHW2vXt_KxjzOhAEclYiLib4ENd4FAJbcV6Y_Z7HAVbXpDh9XTCSCU5UlkaPLjrqVA5OFT2YYRl6lJ6Eyz4EbkVuoMJx7D0l-vxOLYS48SYCxPx-8OZvJ4RJqDtXRwAn3rI1vFVqRqgrcjTbRIAZ_VyveaZfzlqNHH39_dKl4R1eGMTpY1q5UdxwZCqcfe7hkV2lnZG2vI7qnz_1fDhditkf_BAEDNLVY8jr3do1oNwWnZ-x9ymdI45lz-c3LE5U89HchU1xfohaOo9uXDruh6z93ZvtbKhvIQ0PjRYmQVD6-g1WeVBMGOG_4WS7O-bxuTcrzGNIczVJcDKiBAsauvKDxv8qVurBysXIpGjlXzgMlTB1ykdrmyNJJHzmgo4&authuser=0&nonce=s6oe77l9ilc0e&user=01663964981097955388&hash=f24tuahmag8t4dj2s3b499kdbhtbtr0i" alt="Logo" class="brand-image img-circle elevation-3" 
                style="opacity: .8" -->
        <span class="brand-text font-weight-light">IFRN-Lib.</span>
        </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block">{{Auth::user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
        <li class="nav-item">
            <a href="{{route('userDashboard')}}" class="nav-link">
                <i class="fa fa-home nav-icon"></i>
                <p>Home</p>
            </a>
        </li> 
          <li class="nav-item">
            <a href="{{route('meusEmprestimos')}}" class="nav-link">
              <i class="nav-icon fa fa-bars"></i>
              <p>
                Meus empréstimos
              </p>
            </a>
            <li class="nav-item">
              <a href="{{ route('logout') }}" class="nav-link" 
                        onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        <i class="fa fa-sign-out nav-icon"></i>
                                            <p>{{ __('Sair') }}</p>
              </a>
            </li>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('userDashboard')}}">Home</a></li>
              <li class="breadcrumb-item active">IFRN-Lib.</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">

        @yield('content')
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2022 IFRN-Lib.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Versão</b> 2.0
    </div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- Scripts -->
<script src="{{ asset('public/js/app.js') }}"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- overlayScrollbars -->
<script src="{{asset('public/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('public/dist/js/adminlte.js')}}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{asset('public/dist/js/pages/dashboard.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('public/dist/js/demo.js')}}"></script>

</body>
</html>
