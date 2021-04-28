        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url(/assets/images/background/logo-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> 
                        @if(isset(Auth()->user()->usr_profile_picture))
                        <img src="{{ asset('usr_profile_picture/'.Auth()->user()->usr_profile_picture)}}" alt="null" /> 
                        @else
                        <img src="{{ asset('usr_profile_picture/avatar-2.png')}}" alt="null" />
                        @endif
                    </div>
                    <!-- User profile text-->
                   
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> 
                        <a class="waves-effect waves-dark" href="{{URL::to('admin/dashboard')}}" aria-expanded="false">
                                <i class="mdi mdi-home"></i>
                                <span class="hide-menu">Dashboard</span>
                        </a>
                        </li>

                        <li>
                         <a class="has-arrow waves-effect waves-dark" href="" aria-expanded="false">
                                <i class="mdi mdi-bank"></i>
                            <span class="hide-menu">Asset</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('categoryAsset')}}">Kelola Kategori Asset</a></li>
                                <li><a href="{{URL::to('typeAsset')}}">Kelola Tipe Asset</a></li>
                                <li><a href="{{URL::to('asset')}}">Kelola Asset</a></li>
                            </ul>
                        </li>

                        <li>
                            <a class="waves-effect waves-dark" href="{{URL::to('asset-location')}}" aria-expanded="false">
                                <i class="mdi mdi-google-maps"></i>
                                <span class="hide-menu">Lokasi Asset</span>
                            </a>
                        </li>

                        <li>
                            <a class="waves-effect waves-dark" href="{{URL::to('admin/user')}}" aria-expanded="false">
                                <i class="mdi mdi-account"></i>
                                <span class="hide-menu">Kelola User</span>
                            </a>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-cart-plus"></i>
                            <span class="hide-menu">Peminjaman</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('lists-borrow')}}">Daftar Peminjaman</a></li>
                                <li><a href="{{URL::to('borrows-asset')}}">Pinjam Barang</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-loop"></i>
                            <span class="hide-menu">Pengembalian</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('return/list-return')}}">Daftar Pengembalian</a></li>
                                <li><a href="{{URL::to('return/history')}}">Histori Pengembalian</a></li>
                            </ul>
                        </li>

                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-printer"></i>
                            <span class="hide-menu">Report Inventaris</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('/report-asset')}}">Asset</a></li>
                                <li><a href="{{URL::to('report-borrow')}}">Pinjam dan Kembali</a></li>
                            </ul>
                        </li>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <!-- End Bottom points-->
        </aside>








                               