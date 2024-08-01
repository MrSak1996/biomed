<template>
    <div>
        <Header />
        <Sidebar />
        <div id="content" class="content">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Job Order</li>
            </ol>
            <h1 class="page-header">Job Order List</h1>

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
                            <h4 class="panel-title">List of Job Order</h4>
                        </div>
                        <div class="panel-body">
                            <router-link to="/job-order-create" class="btn btn-primary mb-2">Create Job Order</router-link>
                            <table id="data-table-responsive"  class="table table-striped table-bordered" >
                                <thead>
                                    <tr>
                                    	<th width="1%"></th>
                                    	<th width="10%" data-orderable="false">Order #</th>
                                        <th class="text-nowrap">Employee Name</th>
                                        <th class="text-nowrap">Particulars</th>
                                        <th class="text-nowrap">Requested Date</th>
                                        <th class="text-nowrap">Date Started</th>
                                        <th class="text-nowrap">Date Completed</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(job, index) in jobOrderData" :key="job.id" class="odd gradeX">
                                    	<td width="1%" class="f-s-600 text-inverse">{{ job.id }}</td>
                                    	<td width="11%" class="with-img">{{ job.control_no }}</td>
                                        <td>{{ job.request_by }}</td>
                                        <td>{{ job.particulars }}</td>
                                        <td>{{ job.request_date }}</td>
                                        <td>{{ job.start_date }}</td>
                                        <td>{{ job.completed_date }}</td>
                                        <td>
                                            <router-link :to="'/job-order-view/' + job.id" class="btn btn-success btn-icon btn-circle"><i class="fa fa-eye"></i></router-link>&nbsp;
                                            <a href="javascript:;" class="btn btn-danger btn-icon btn-circle"><i class="fa fa-times"></i></a>&nbsp;
                                            <button @click="exportJobOrder(job.id)" class="btn btn-warning btn-icon btn-circle"><i class="fa-solid fa-download"></i></button>&nbsp;

                                        </td>
                                    </tr>
                                    
                                  
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/sidebar.vue";

export default {
    name: 'JobOrder',
    components: {
        Header,
        Sidebar
    },
    setup() {
        const jobOrderData = ref([]);

        const exportJobOrder = (id) => {
            window.location.href = `./api/export_job_order/${id}?export=true`;
        };

        const getJobOrderList = () => {
            const url = './api/get_job_order_list';
            axios.get(url)
                .then(response => {
                    jobOrderData.value = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

        onMounted(() => {
            getJobOrderList();
        });

        return {
            jobOrderData,
            exportJobOrder,
            getJobOrderList
        };
    }
}
</script>