<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="{{ asset('admin/dist/img/user2-160x160.jpg') }}" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p>ADMINISTRATOR</p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->

    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li class="header">MAIN NAVIGATION</li>
      <li class="treeview">
        <a href="{{ url('/') }}">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>

      </li>

      <li class="treeview active">
        <a href="#">
          <i class="fa fa-edit"></i> <span>Transaksi</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li class="active"><a href="{{ url('masuk') }}"><i class="fa fa-circle-o"></i> Kas Masuk</a></li>
          <li><a href="{{ url('keluar') }}"><i class="fa fa-circle-o"></i> Kas Keluar</a></li>

        </ul>
      </li>
      <li class="treeview ">
        <a href="#">
          <i class="fa fa-table"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="?page=penjualan"><i class="fa fa-circle-o"></i> Penerimaan</a></li>
          <li><a href="?page=pengeluaran"><i class="fa fa-circle-o"></i> Pengeluaran</a></li>
          <li><a href="{{ url('ppkas') }}"><i class="fa fa-circle-o"></i> Penerimaan dan Pengeluaran</a></li>
          <li><a href="{{ url('aruskas') }}"><i class="fa fa-circle-o"></i> Arus Kas</a></li>

        </ul>
      </li>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-database"></i> <span> Data Master</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="{{ url('pelanggan') }}"><i class="fa fa-circle-o"></i> Data Pelanggan</a></li>
          <li><a href="{{ url('pengeluaran') }}"><i class="fa fa-circle-o"></i> Data Pengeluaran</a></li>
          <li><a href="{{ url('barang') }}"><i class="fa fa-circle-o"></i> Data Barang</a></li>


        </ul>
      </li>




      <li class="header">LABELS</li>
      <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
      <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
