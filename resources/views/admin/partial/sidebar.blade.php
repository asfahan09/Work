 <!-- [ Sidebar Menu ] start -->
 <nav class="pc-sidebar">
   <div class="navbar-wrapper">
     <div class="m-header">
       <a href="{{ route('admin.dashboard') }}" class="b-brand text-primary">
        <h1 class="text-primary">Multi<span class="text-primary">shop</span></h1>
       </a>
     </div>
     <div class="navbar-content">
       <ul class="pc-navbar">
         <li class="pc-item">
           <a href="../dashboard/index.html" class="pc-link">
             <span class="pc-micon"><i class="ti ti-dashboard"></i></span>
             <span class="pc-mtext">Dashboard</span>
           </a>
         </li>

         <li class="pc-item pc-caption">
           <label>pages</label>
           <i class="ti ti-dashboard"></i>
         </li>
         <!-- categories  -->
         <li class="pc-item pc-hasmenu">

           <a href="javascript:void(0);" class="pc-link">
             <span class="pc-micon"><i class="fa fa-th-large text-primary"></i></span>
             <span class="pc-mtext">Categories</span>
           </a>

           <ul class="pc-submenu">
             <li class="pc-item">
               <a href="{{ route('admin.category.create') }}" class="pc-link">Create</a>
             </li>
             <li class="pc-item">
               <a href="{{ route('admin.category.list') }}" class="pc-link">List</a>
             </li>

           </ul>

         </li>
         <!-- categories  -->
         <!-- Sub Category -->
         <li class="pc-item pc-hasmenu">
           <a href="javascript:void(0);" class="pc-link">
             <span class="pc-micon"><i class="fa fa-sitemap text-primary"></i></span>
             <span class="pc-mtext">Sub Category</span>
           </a>

           <ul class="pc-submenu">
             <li class="pc-item">
               <a href="{{ route('admin.subcategory.create') }}" class="pc-link">
                 Create
               </a>
             </li>
             <li class="pc-item">
               <a href="{{ route('admin.subcategory.list') }}" class="pc-link">
                 List
               </a>
             </li>
           </ul>
         </li>
         <!-- brands -->
         <li class="pc-item pc-hasmenu">
           <a href="javascript:void(0);" class="pc-link">
             <span class="pc-micon"><i class="fa fa-tags text-primary"></i></span>
             <span class="pc-mtext">Brands</span>
           </a>

           <ul class="pc-submenu">
             <li class="pc-item">
               <a href="{{ route('admin.brand.create') }}" class="pc-link">
                 <i class="fa fa-plus-circle"></i> Create
               </a>
             </li>
             <li class="pc-item">
               <a href="{{ route('admin.brand.list') }}" class="pc-link">
                 <i class="fa fa-list"></i> List
               </a>
             </li>
           </ul>
         </li>
         <!--  color-->

         <li class="pc-item pc-hasmenu">
           <a href="javascript:void(0);" class="pc-link">

             <span class="pc-micon">
               <i class="fa fa-paint-brush text-primary"></i>
             </span>

             <span class="pc-mtext">Colors</span>
           </a>

           <ul class="pc-submenu">
             <li class="pc-item">
               <a href="{{ route('admin.color.create') }}" class="pc-link">
                 Create
               </a>
             </li>
             <li class="pc-item">
               <a href="{{ route('admin.color.list') }}" class="pc-link">
                 List
               </a>
             </li>
           </ul>
         </li>

         <!-- product -->

         <li class="pc-item pc-hasmenu">
           <a href="javascript:void(0);" class="pc-link">

             <span class="pc-micon">
               <i class="fa fa-box text-primary"></i>
             </span>

             <span class="pc-mtext">products</span>
           </a>

           <ul class="pc-submenu">
             <li class="pc-item">
               <a href="{{ route('admin.product.create') }}" class="pc-link">
                 Create
               </a>
             </li>
             <li class="pc-item">
               <a href="{{ route('admin.product.list') }}" class="pc-link">
                 List
               </a>
             </li>
           </ul>
         </li>


         <li class="pc-item pc-hasmenu">
           <a href="javascript:void(0);" class="pc-link">

             <span class="pc-micon">
               <i class="fa fa-box text-primary"></i>
             </span>

             <span class="pc-mtext">Orders</span>
           </a>

           <ul class="pc-submenu">
             <li class="pc-item">
               <a  href="{{url('admin/order')}}" class="pc-link">
                 List
               </a>
             </li>
          
           </ul>
         </li>

         <li class="pc-item pc-caption">
           <label>Account</label>
           <i class="ti ti-news"></i>
         </li>
         <li class="pc-item">
           <a href="{{ route('admin.logout') }}" class="pc-link">
             <span class="pc-micon"><i class="ti ti-lock"></i></span>
             <span class="pc-mtext">Logout</span>
           </a>
         </li>



       </ul>

     </div>
   </div>
 </nav>
 <!-- [ Sidebar Menu ] end --> <!-- [ Header Topbar ] start -->