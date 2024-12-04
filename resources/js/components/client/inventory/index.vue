<template>
    <div>
        <Header />
        <Sidebar />
        <div id="content" class="content">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Inventory Management</li>
            </ol>
            <h1 class="page-header">Inventory Management</h1>
            <!-- Quick Statistics -->
            <statistics />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <button class="btn btn-warning btn-xs">Back</button>

                                <router-link to="/inventory-management" class="btn btn-success btn-xs">Submit</router-link>

                            </div>
                            <h4 class="panel-title">Asset Management Form</h4>
                        </div>
                        <div class="panel-body"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Header from "../../../components/layout/header.vue";
import Sidebar from "../../../components/layout/client_sidebar.vue";
import Statistics from "../statistics.vue";
</script>