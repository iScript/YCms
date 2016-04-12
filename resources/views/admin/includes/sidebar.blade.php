<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="/assets/AdminLTE/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->username}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
      <span class="input-group-btn">
        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
      </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="#"><i class="fa fa-link"></i> <span>控制台</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>内容管理</span></a>

                <ul class="treeview-menu">
                    <li><a href="/admin/article" >文章列表</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-link"></i> <span>产品管理</span></a>

                <ul class="treeview-menu">
                    <li><a href="/admin/category" >分类</a></li>
                    <li><a href="/admin/product" >产品列表</a></li>
                </ul>
            </li>
            <li><a href="#"><i class="fa fa-link"></i> <span>会员管理</span></a>

                <ul class="treeview-menu">
                    <li><a href="/admin/user" >会员列表</a></li>

                </ul>
            </li>


            <li class="treeview">
                <a href="#"><i class="fa fa-link"></i> <span>网站日志</span> <i
                            class="fa fa-angle-left pull-right"></i></a>
                <ul class="treeview-menu">
                    <li><a href="/admin/log-viewer" target="_blank">网站日志</a></li>

                </ul>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>
