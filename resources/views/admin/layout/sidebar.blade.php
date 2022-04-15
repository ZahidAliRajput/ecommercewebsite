       <!--start sidebar -->
       <aside class="sidebar-wrapper" data-simplebar="true">
        <div class="sidebar-header">
          <div>
            <img src="{{ asset('admin/assets/images/logo-icon-2.png')}}" class="logo-icon" alt="logo icon">
          </div>
          <div>
            <h4 class="logo-text">SYN-UI</h4>
          </div>
          <div class="toggle-icon ms-auto"><ion-icon name="menu-sharp"></ion-icon>
          </div>
        </div>
        <!--navigation-->
        <ul class="metismenu" id="menu">
          <li>
            <a href="{{ route('dashboard') }}">
              <div class="parent-icon"><ion-icon name="home-sharp"></ion-icon>
              </div>
              <div class="menu-title">Dashboard</div>
            </a>
          </li>
          <li>
            <a href="{{ route('users') }}">
              <div class="parent-icon"><ion-icon name="newspaper-sharp"></ion-icon>
              </div>
              <div class="menu-title">Users</div>
            </a>
          </li>
          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="parent-icon"><ion-icon name="bag-handle-sharp"></ion-icon>
              </div>
              <div class="menu-title">Ecomm</div>
            </a>
            <ul>
              <li> <a href="{{ route('categories') }}"><ion-icon name="ellipse-outline"></ion-icon>Categories</a>
              </li>
              <li> <a href="{{ route('managesubcategory') }}"><ion-icon name="ellipse-outline"></ion-icon>Sub Categories</a>
              </li>
              <li> <a href="{{ route('products') }}"><ion-icon name="ellipse-outline"></ion-icon>Products</a>
              </li>
            </ul>
          </li>
          <li>
            <a href="javascript:;" class="has-arrow">
              <div class="parent-icon"><ion-icon name="bag-handle-sharp"></ion-icon>
              </div>
              <div class="menu-title">Spatie</div>
            </a>
            <ul>
              <li><a href="{{ route('permissions') }}"><ion-icon name="ellipse-outline"></ion-icon>Permissions</a>
              </li>
              <li><a href="{{ route('roles') }}"><ion-icon name="ellipse-outline"></ion-icon>Roles</a>
              </li>
            </ul>
          </li>
        </ul>
        <!--end navigation-->
     </aside>
     <!--end sidebar -->