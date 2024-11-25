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
                        <li><a href="javascript:;"><i class="fa fa-cog"></i> Settings</a></li>
                        <li><a href="javascript:;"><i class="fa fa-pencil-alt"></i> Send Feedback</a></li>
                        <li><a href="javascript:;"><i class="fa fa-question-circle"></i> Helps</a></li>
                    </ul>
                </li>
            </ul>
            <!-- end sidebar user -->
            <!-- begin sidebar nav -->
            <ul class="nav">
                <li class="nav-header">Navigation</li>
                <li :class="{ active: isActive('/client-dashboard') }" class="has-sub">
                    <a :href="`/client-dashboard?api_token=${apiToken}`">

                        <i class="fa fa-th-large"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <!-- <li :class="{ active: isActive('/job-order') }" class="has-sub">
                    <a :href="$router.resolve({path: '/job-order'}).href">
                        <span class="badge pull-right">10</span>
                        <i class="fa fa-hdd"></i>
                        <span>Job Orders</span>
                    </a>
    
                </li> -->


                <!-- begin sidebar minify button -->
                <li><a href="#" class="sidebar-minify-btn" data-click="sidebar-minify"><i
                            class="fa fa-angle-double-left"></i></a></li>
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
            logo: logobs4,
            apiToken: this.$route.query.api_token
        
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