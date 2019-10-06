<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<link rel="shortcut icon" href="assets/media/favicons/favicon.png">
    <link rel="icon" type="image/png" sizes="192x192" href="<?php echo base_url('assets/media/favicons/favicon-192x192.png');?>">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/media/favicons/apple-touch-icon-180x180.png');?>">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Muli:300,400,400i,600,700">	
    <link rel="stylesheet" id="css-main" href="<?php echo base_url('assets/css/codebase.min.css');?>">
    <link rel="stylesheet" id="css-main" href="<?php echo base_url('assets/css/custom.css');?>">
    <script src="https://kit.fontawesome.com/f7ffb177cb.js" crossorigin="anonymous"></script>
	
</head>
<body>
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-glass page-header-inverse main-content-boxed">
            <!-- Side Overlay-->
            <aside id="side-overlay">
                <!-- Side Header -->
                <div class="content-header content-header-fullrow">
                    <div class="content-header-section align-parent">
                        <!-- Close Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary align-v-r" data-toggle="layout" data-action="side_overlay_close">
                            <i class="fa fa-times text-danger"></i>
                        </button>
                        <!-- END Close Side Overlay -->
                        <!-- User Info -->
                        <div class="content-header-item">
                            <a class="img-link mr-5" href="be_pages_generic_profile.html">
                                <img class="img-avatar img-avatar32" src="assets/media/avatars/avatar15.jpg" alt="">
                            </a>
                            <a class="align-middle link-effect text-primary-dark font-w600" href="be_pages_generic_profile.html">Mi carrito</a>
                        </div>
                        <!-- END User Info -->
                    </div>
                </div>
                <!-- END Side Header -->
                <!-- Side Content -->
                <div class="content-side">
                    <div class="block pull-r-l">
                        <div class="block-content">
                            <p v-if="quantityProducts == 0"> No hay productos agregados </p>
                            <ul class="nav-users push">
                                <li v-for="(item, index) in cartContent" class="mt-2">
                                    <span v-html="item.name"></span>
                                    <span class="badge badge-primary badge-pill ml-1" v-html="item.quantity"></span>              
                                    <span class="ml-1" v-html="item.price"></span> <b>$</b> (c/u)
                                </li>                                
                            </ul>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-12 text-center">
                            <a href="<?php echo $this->config->item('url_link') . 'checkout'?>" class="btn btn-success">Finalizar compra</a>
                        </div>
                    </div>

                </div>
                <!-- END Side Content -->
            </aside>
            <!-- END Side Overlay -->
            <!-- Sidebar -->
            <!--
                Helper classes

                Adding .sidebar-mini-hide to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
                Adding .sidebar-mini-show to an element will make it visible (opacity: 1) when the sidebar is in mini mode
                    If you would like to disable the transition, just add the .sidebar-mini-notrans along with one of the previous 2 classes

                Adding .sidebar-mini-hidden to an element will hide it when the sidebar is in mini mode
                Adding .sidebar-mini-visible to an element will show it only when the sidebar is in mini mode
                    - use .sidebar-mini-visible-b if you would like to be a block when visible (display: block)
            -->
            <nav id="sidebar">
                <div class="alert alert-success">
                    Bienvenidos! Disfrute de nuestros productos 
                </div>                
            </nav>
            <!-- END Sidebar -->
            <!-- Header -->
            <header id="page-header">
                <!-- Header Content -->
                <div class="content-header">
                    <!-- Left Section -->
                    <div class="content-header-section">
                        <!-- Toggle Sidebar -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="sidebar_toggle">
                            <i class="fa fa-navicon"></i>
                        </button>
                        <!-- END Toggle Sidebar -->
                    </div>
                    <!-- END Left Section -->

                    <!-- Right Section -->
                    <div class="content-header-section">
                        <!-- Toggle Side Overlay -->
                        <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                        <button type="button" class="btn btn-circle btn-dual-secondary" data-toggle="layout" data-action="side_overlay_toggle">
                            <i class="fa fa-shopping-cart"></i>
                        </button>
                        <!-- END Toggle Side Overlay -->
                    </div>
                    <!-- END Right Section -->
                </div>
                <!-- END Header Content -->
                <!-- Header Search -->
                <div id="page-header-search" class="overlay-header">
                    <div class="content-header content-header-fullrow">
                        <form action="be_pages_generic_search.html" method="post">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <!-- Close Search Section -->
                                    <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
                                    <button type="button" class="btn btn-secondary" data-toggle="layout" data-action="header_search_off">
                                        <i class="fa fa-times"></i>
                                    </button>
                                    <!-- END Close Search Section -->
                                </div>
                                <input type="text" class="form-control" placeholder="Search or hit ESC.." id="page-header-search-input" name="page-header-search-input">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-secondary">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- END Header Search -->
                <!-- Header Loader -->
                <!-- Please check out the Activity page under Elements category to see examples of showing/hiding it -->
                <div id="page-header-loader" class="overlay-header bg-primary">
                    <div class="content-header content-header-fullrow text-center">
                        <div class="content-header-item">
                            <i class="fa fa-sun-o fa-spin text-white"></i>
                        </div>
                    </div>
                </div>
                <!-- END Header Loader -->
            </header>
            <!-- END Header -->
            <!-- Main Container -->
            <main id="main-container">
                <!-- Hero -->
                <div class="bg-primary">
                    <div class="bg-pattern bg-black-op-25" style="background-image: url('assets/media/various/bg-pattern.png');">
                        <div class="content content-top text-center">
                            <div class="py-50">
                                <h1 class="font-w700 text-white mb-10">Kubo shopping cart</h1>
                                <h2 class="h4 font-w400 text-white-op" v-html="author"></h2>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Hero -->
                <!-- Page Content -->
                <div class="content content-full">
                <div class="row">
                    <div class="col-8 col-md-8 col-sm-12">
                        <div class="block">
                            <div class="block-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-vcenter">
                                        <thead class="classic-table-head">
                                            <tr>
                                                <th class="text-center">Producto</th>
                                                <th class="text-center">Precio (unidad) </th>
                                                <th class="text-center">Cantidad</th>                                                
                                            </tr>
                                        </thead>
                                        <tbody v-if="quantityProducts > 0">
                                            <tr v-for="(item, index) in cartContent">
                                                <td v-html="item.name" class="text-center"></td>
                                                <td v-html="item.price" class="text-center"></td>
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-outline-danger" @click="decrementQuantity(index)" > - </button>
                                                    <span v-html="item.quantity" class="ml-1 mr-1"></span>
                                                    <button type="button" class="btn btn-outline-danger" @click="incrementQuantity(index)" > + </button>
                                                </td>                                                                                    
                                            </tr>                                
                                        </tbody>
                                        <tbody v-else>
                                            <tr>
                                                <td colspan="4"> No hay Productos agregados </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-sm-12">
                        <div class="block">
                            <div class="block-content">
                                <div class="table-responsive">
                                    <table class="table table-striped table-vcenter">
                                        <thead class="classic-table-head">
                                            <tr>
                                                <th class="text-center" colspan="2">Total del Carrito</th>                                    
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="text-center">
                                                    <span>Subtotal:</span>
                                                </td>
                                                <td class="text-center">
                                                    <div v-html="totalAmountInCart"></div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">
                                                    Iva: 
                                                </td>
                                                <td class="text-center">
                                                    0.00
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="text-center">   
                                                    <span class="font-bold">Total:</span>
                                                </td>
                                                <td class="text-center">
                                                    <div v-html="totalAmountInCart"></div>
                                                </td>
                                            </tr>
                                            <tr class="text-center">
                                                <td class="text-center" colspan="2">
                                                    <a href="#" @click="finishPurchase" class="btn btn-rounded btn-danger">
                                                        Finalizar compra
                                                    </a>
                                                </td>                                    
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div v-if="purchasedSuccess" class="alert alert-success">                                        
                                        Compra realizada exitosamente
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
                                
            </main>
            <!-- END Main Container -->
            <!-- Footer -->
            <footer id="page-footer" class="opacity-0">
                <div class="content py-20 font-size-xs clearfix">
                    <div class="float-right">
                            2019 - Dimitri Avila
                    </div>                    
                </div>
            </footer>
            <!-- END Footer -->
        </div>

    

        <script src="<?php echo base_url('assets/js/codebase.core.min.js');?>"></script>
        <script src="<?php echo base_url('assets/js/codebase.app.min.js');?>"></script>
        <!-- axios -->
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <!-- vuejs -->
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <!-- main instance of vuejs -->
        <script src="<?php echo base_url('assets/js/vue/main-instance.js');?>"></script>
</body>
</html>