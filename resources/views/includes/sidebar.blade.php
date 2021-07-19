    <div class="left-side-menu left-side-menu-detached mm-active">
    <div class="leftbar-user">
        <a href="javascript: void(0);">
            <img src="{{ asset('images/ted.jpg') }}" alt="user-image" height="42" class="rounded-circle shadow-sm">
        <span class="leftbar-user-name">{{ Auth::user()->name }}</span>
        </a>
    </div>

    <!--- Sidemenu -->
    <ul class="metismenu side-nav mm-show">

        <li class="side-nav-title side-nav-item">Navigation</li>

        <li class="side-nav-item">
            <a href="{{ route('home') }}" class="side-nav-link">
                <i class="mdi mdi-home"></i>
                <span> Dashboard </span>
            </a>
        </li>

        <li class="side-nav-title side-nav-item">Users</li>

        <li class="side-nav-item">
            <a href="javascript: void(0);" class="side-nav-link">
                <i class="mdi mdi-account-tie"></i>
                <span> Admins </span>
            </a>
        </li>

        {{-- <li class="side-nav-item" id="menuLi" onclick="toggleFunc()">
            <a href="javascript: void(0);" class="side-nav-link" id="menuLiAn" aria-expanded="false">
                <i class="mdi mdi-account-child"></i>
                <span> Pupils </span>
                <span class="menu-arrow"></span>
            </a>
            <ul class="side-nav-second-level mm-collapse" id="menuLiUl" aria-expanded="false" style="height: 0px;">
                <li>
                    <a href="{{ route('pupils.index') }}">Pupils Details</a>
                </li>
                <li>
                    <a href="{{ route('grade-manager') }}">Grade Manager</a>
                </li>
            </ul>
        </li> --}}

        {{-- <li class="side-nav-item mm-active">
            <a href="javascript: void(0);" class="side-nav-link" aria-expanded="true">
                <i class="uil-envelope"></i>
                <span> Email </span>
                <span class="menu-arrow"></span>
            </a>
            <ul id="menuLiUl" class="side-nav-second-level mm-collapse mm-show" aria-expanded="false" style="">
                <li>
                    <a href="apps-email-inbox.html">Inbox</a>
                </li>
                <li>
                    <a href="apps-email-read.html">Read Email</a>
                </li>
            </ul>
        </li> --}}

        {{-- <script>
            function toggleFunc() {
                var liItem = document.getElementById("menuLi");             
                liItem.classList.toggle("mm-active");

                var x = document.getElementById("menuLiAn").getAttribute("aria-expanded"); 
                if (x == "true") 
                {
                x = "false"
                } else {
                x = "true"
                }
                document.getElementById("menuLiAn").setAttribute("aria-expanded", x);
                document.getElementById("menuLiAn").innerHTML = "aria-expanded =" + x;
                }

                var liUlItem = document.getElementById("menuLiUl");
                liUlItem.classList.toggle("mm-show");

                var height = document.getElementById("menuLiUl").style.height;
                if(height == ""){
                    height = "0px";
                }else{
                    height = "";
                }

                document.getElementById("menuLiUl").style.height = height;
              
            }
            </script> --}}

        <li class="side-nav-item">
            <a href="{{ route('pupils.index') }}" class="side-nav-link">
                <i class="mdi mdi-account-child"></i>
                <span> Pupils </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{ route('parents.index') }}" class="side-nav-link">
                <i class="mdi mdi-account-multiple"></i>
                <span> Parents </span>
            </a>
        </li>

        <li class="side-nav-item">
            <a href="{{ route('busoperators.index') }}" class="side-nav-link">
                <i class="mdi mdi-account-outline"></i>
                <span> Bus Operators </span>
            </a>
        </li>
        
    </ul>

    <!-- End Sidebar -->

    <div class="clearfix"></div>
    <!-- Sidebar -left -->
</div>