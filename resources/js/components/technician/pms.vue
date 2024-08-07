<style></style>
<template>
    <div>
        <Header />
        <Sidebar />
        <div id="content" class="content">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Preventive Maintainance Service</li>
            </ol>
            <h1 class="page-header">Preventive Maintainance Service</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-inverse" data-sortable-id="index-10">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default"
                                    data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success"
                                    data-click="panel-reload"><i class="fa fa-redo"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                                    data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger"
                                    data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title">PMS Data</h4>
                        </div>
                        <div class="panel-body">
                            <router-link to="/pms-create" class="btn btn-primary mb-2">Create PMS
                                </router-link>
                            <table id="data-table-responsive" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="1%"></th>
                                        <th width="10%" data-orderable="false">Control #</th>
                                        <th class="text-nowrap">Client</th>
                                        <th class="text-nowrap">Department</th>
                                        <th class="text-nowrap">Equipment</th>
                                        <th class="text-nowrap">Date Started</th>
                                        <th class="text-nowrap">Date Completed</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</template>
<script setup>
// import { ref, onMounted } from 'vue';
import axios from 'axios';
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/sidebar.vue";


</script>