        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User profile -->
                <div class="user-profile" style="background: url(/assets/images/background/logo-info.jpg) no-repeat;">
                    <!-- User profile image -->
                    <div class="profile-img"> <img src="{{URL::to('assets/images/users/avatar.png')}}" alt="user" /> </div>
                    <!-- User profile text-->
                   
                </div>
                <!-- End User profile text-->
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> 
                        <a class="waves-effect waves-dark" href="{{URL::to('user/dashboard')}}" aria-expanded="false">
                                <i class="mdi mdi-home"></i>
                                <span class="hide-menu">Dashboard</span>
                        </a>
                        </li>
                        
                        <li> 
                        <a class="waves-effect waves-dark" href="{{URL::to('user/lists-borrow')}}" aria-expanded="false">
                                <i class="mdi mdi-cart-plus"></i>
                                <span class="hide-menu">Daftar Peminjaman</span>
                        </a>
                        </li>
                        

                        <li> 
                        <a class="waves-effect waves-dark" href="{{URL::to('user/return/history')}}" aria-expanded="false">
                                <i class="mdi mdi-loop"></i>
                                <span class="hide-menu">Histori Pengembalian</span>
                        </a>
                        </li>
                      
                                            
                       <!--  <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-server"></i>
                        <span class="hide-menu">Peminjaman</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{URL::to('borrows-asset')}}">Pinjam Barang</a></li>
                            </ul> -->

                       
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
            <!-- Bottom points-->
            <!-- End Bottom points-->
        </aside>








                               