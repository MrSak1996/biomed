<template>
<div id="sidebar" class="sidebar">
    <!-- begin sidebar scrollbar -->
    <div data-scrollbar="true" data-height="100%">
        <!-- begin sidebar user -->
        <ul class="nav">
            <li class="nav-profile">
                <a href="#" data-toggle="nav-profile">
                    <div class="cover with-shadow"></div>
                    <div class="image">
                        <img :src="user13" alt="" />
                    </div>
                    <div class="info">
                        <b class="caret pull-right"></b>
                        User
                        <small>Front end developer</small>
                    </div>
                </a>
            </li>
            <li>
                <ul class="nav nav-profile">
                    <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                    <li><a href="#"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                    <li><a href="#"><i class="fa fa-question-circle"></i> Helps</a></li>
                </ul>
            </li>
        </ul>
        <!-- end sidebar user -->
        <!-- begin sidebar nav -->
        <ul class="nav">
            <li class="nav-header">Navigation</li>
            <li :class="{ active: isActive('/') }" class="has-sub">
                <router-link to ="/">
                    <i class="fa fa-th-large"></i>
                    <span>Dashboard</span>
                </router-link>
            </li>
            <li :class="{ active: isActive('/job-order') }" class="has-sub">
                <router-link to="/job-order">
                    <span class="badge pull-right">10</span>
                    <i class="fa fa-hdd"></i>
                    <span>Orders</span>
                </router-link>

            </li>
            <li :class="{ active: isActive('/task-sched') }" class="has-sub">
                <a>
                    <b class="caret"></b>
                    <i class="fa fa-calendar"></i>
                    <span>Calendar of Schedule</span>
                </a>
                <ul class="sub-menu">
                    <li><router-link to="/task-sched">Activities and Task</router-link></li>
                    <li><router-link to="/task-management">Task Management</router-link></li>
                    <li><router-link to="#">Conflict Schedule</router-link></li>
                    <li><router-link to="#">Report Generator</router-link></li>
                </ul>
            </li>
            <li>
                <router-link to="/inventory">
                    <div class="icon-img">
                        <img :src="logo" alt="" />
                    </div>
                    <span>Inventory <span class="label label-theme m-l-5">NEW</span></span>
                </router-link>
            </li>

            <li class="has-sub">
                <a href="#">
                    <b class="caret"></b>
                    <i class="fa fa-table"></i>
                    <span>Technicians</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="table_basic.html">Basic Tables</a></li>
                    <li class="has-sub">
                        <a href="#"><b class="caret pull-right"></b> Managed Tables</a>
                        <ul class="sub-menu">
                            <li><a href="table_manage.html">Default</a></li>
                            <li><a href="table_manage_autofill.html">Autofill</a></li>
                            <li><a href="table_manage_buttons.html">Buttons</a></li>
                            <li><a href="table_manage_colreorder.html">ColReorder</a></li>
                            <li><a href="table_manage_fixed_columns.html">Fixed Column</a></li>
                            <li><a href="table_manage_fixed_header.html">Fixed Header</a></li>
                            <li><a href="table_manage_keytable.html">KeyTable</a></li>
                            <li><a href="table_manage_responsive.html">Responsive</a></li>
                            <li><a href="table_manage_rowreorder.html">RowReorder</a></li>
                            <li><a href="table_manage_scroller.html">Scroller</a></li>
                            <li><a href="table_manage_select.html">Select</a></li>
                            <li><a href="table_manage_combine.html">Extension Combination</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="#">
                    <b class="caret"></b>
                    <i class="fa fa-star"></i>
                    <span>Customers</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="../../../frontend/template/template_one_page_parallax/index.html" target="_blank">One Page Parallax</a></li>
                    <li><a href="../../../frontend/template/template_blog/index.html" target="_blank">Blog</a></li>
                    <li><a href="../../../frontend/template/template_forum/index.html" target="_blank">Forum</a></li>
                    <li><a href="../../../frontend/template/template_e_commerce/index.html" target="_blank">E-Commerce</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="#">
                    <b class="caret"></b>
                    <i class="fa fa-envelope"></i>
                    <span>Services</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="email_system.html">Repair</a></li>
                    <li><router-link to="/pms">PMS</router-link></li>
                    <li><a href="email_newsletter.html">Callibration</a></li>
                    <li><a href="email_newsletter.html">Refurbishing</a></li>
                    <li><a href="email_newsletter.html">Installation</a></li>
                    <li><a href="email_newsletter.html">Delivery</a></li>
                </ul>
            </li>
             <li class="has-sub">
                <a href="#">
                    <b class="caret"></b>
                    <i class="fa fa-chart-pie"></i>
                    <span>Create Request</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="chart-flot.html">Flot Chart</a></li>
                    <li><a href="chart-morris.html">Morris Chart</a></li>
                    <li><a href="chart-js.html">Chart JS</a></li>
                    <li><a href="chart-d3.html">d3 Chart</a></li>
                </ul>
            </li>
            <li class="has-sub">
                <a href="#">
                    <b class="caret"></b>
                    <i class="fa fa-chart-pie"></i>
                    <span>Account Settings</span>
                </a>
                <ul class="sub-menu">
                    <li><a href="chart-flot.html">Flot Chart</a></li>
                    <li><a href="chart-morris.html">Morris Chart</a></li>
                    <li><a href="chart-js.html">Chart JS</a></li>
                    <li><a href="chart-d3.html">d3 Chart</a></li>
                </ul>
            </li>

            <!-- begin sidebar minify button -->
            <li><a href="#" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a></li>
            <!-- end sidebar minify button -->
        </ul>
        <!-- end sidebar nav -->
    </div>
    <!-- end sidebar scrollbar -->
</div>
<div class="sidebar-bg"></div>
</template>

<script>
import img3 from "../../../../public/assets/img/user/user-13.jpg";
import logobs4 from "../../../../public/assets/img/logo/logo-bs4.png";

export default {
    name: 'Sidebar',
    data() {
        return {
            user13: img3,
            logo: logobs4
        }
    },
    computed: {
        currentRoute() {
            return this.$route.path;
        }
    },
    methods: {
        isActive(path) {
            return this.currentRoute === path;
        }
    }
}
</script>
