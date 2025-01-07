<template>
    <div id="header" class="header navbar-default">
        <!-- begin navbar-header -->
        <div class="navbar-header">
            <a href="index.html" class="navbar-brand"><span class="navbar-logo"></span> <b>BIOMED</b> Admin</a>
            <button type="button" class="navbar-toggle" data-click="sidebar-toggled">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <!-- end navbar-header -->

        <!-- begin header-nav -->
        <ul class="navbar-nav navbar-right">
            <li>
                <form class="navbar-form">
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter keyword">
                        <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </li>
            <li class="dropdown">
                <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                    <i class="fa fa-bell"></i>
                    <span class="label">5</span>
                </a>
                <ul class="dropdown-menu media-list dropdown-menu-right">
                    <li class="dropdown-header">NOTIFICATIONS (5)</li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left">
                                <i class="fa fa-bug media-object bg-silver-darker"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">Server Error Reports <i
                                        class="fa fa-exclamation-circle text-danger"></i></h6>
                                <div class="text-muted f-s-11">3 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left">
                                <img :src="user1" class="media-object" alt="">
                                <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">John Smith</h6>
                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                <div class="text-muted f-s-11">25 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left">
                                <img :src="user2" class="media-object" alt="">
                                <i class="fab fa-facebook-messenger text-primary media-object-icon"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading">Olivia</h6>
                                <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                <div class="text-muted f-s-11">35 minutes ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left">
                                <i class="fa fa-plus media-object bg-silver-darker"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading"> New User Registered</h6>
                                <div class="text-muted f-s-11">1 hour ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="media">
                        <a href="javascript:;">
                            <div class="media-left">
                                <i class="fa fa-envelope media-object bg-silver-darker"></i>
                                <i class="fab fa-google text-warning media-object-icon f-s-14"></i>
                            </div>
                            <div class="media-body">
                                <h6 class="media-heading"> New Email From John</h6>
                                <div class="text-muted f-s-11">2 hour ago</div>
                            </div>
                        </a>
                    </li>
                    <li class="dropdown-footer text-center">
                        <a href="javascript:;">View more</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown navbar-user">
                <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                    <img :src="user3" alt="">
                    <span class="d-none d-md-inline">Adam Schwartz</span> <b class="caret"></b>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:;" class="dropdown-item">Edit Profile</a>
                    <a href="javascript:;" class="dropdown-item"><span class="badge badge-danger pull-right">2</span>
                        Inbox</a>
                    <a href="javascript:;" class="dropdown-item">Calendar</a>
                    <a href="javascript:;" class="dropdown-item">Setting</a>
                    <div class="dropdown-divider"></div>
                    <a @click.prevent="logout" href="javascript:;" class="dropdown-item">Log Out</a>
                </div>
            </li>
        </ul>
        <!-- end header navigation right -->
    </div>
</template>
<script>
import { useRouter } from 'vue-router';
import img1 from "../../../../public/assets/img/user/user-1.jpg";
import img2 from "../../../../public/assets/img/user/user-2.jpg";
import img3 from "../../../../public/assets/img/user/user-13.jpg";
import axios from 'axios';
export default {
    name: 'Header',
    data() {
        return {
            user:null,
            user1: img1,
            user2: img2,
            user3: img3
        }
    },
    async mounted() {
        try {
            this.user = await this.$fetchCurUser();
            console.log(this.user);
        } catch (error) {
            console.error('Error fetching user:', error);
        }
    },
    
    methods:{
        
        logout() {
            console.log(localStorage.getItem('api_token'))
            axios.post('/api/logout', null, {
                headers: {
                    'Authorization': 'Bearer ' + localStorage.getItem('api_token')
                }
            })
                .then(() => {
                    // Clear local storage and any other cached data
                    localStorage.removeItem('api_token');

                    // Redirect to the login page or another appropriate page
                    // For example, if using Vue Router:
                    this.$router.push('/');
                })
                .catch(error => {
                    console.error('Logout failed:', error);
                });
        }

    }
}
</script>