<style></style>
<template>
    <div>
        <Header/>
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
                                        <th class="text-nowrap">PPM Date</th>
                                        <th class="text-nowrap">PPM End Time</th>
                                        <th class="text-nowrap">Next Due Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(item, index) in pmsData" :key="item.id" class="odd gradeX">
                                        <td style="width: 6%;">
                                            <a href="javascript:;" class="btn btn-success btn-icon btn-md"><i class="fa fa-eye"></i></a>&nbsp;
                                            <button @click="exportPMSData(item.id)" class="btn btn-success btn-icon">
                                                <font-awesome-icon :icon="['fa', 'download']" />
                                            </button>
                                        </td>
                                        <td>{{ item.control_no }}</td>
                                        <td>{{ item.client }}</td>
                                        <td>{{ item.department }}</td>
                                        <td>{{ item.equipment}}</td>
                                        <td>{{ formatDate(item.ppm_date) }}</td>
                                        <td>{{ item.ppm_end_time }}</td>
                                        <td>{{ formatDate(item.next_due_date) }}</td>
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
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCircleInfo, faDownload, faQuestion } from '@fortawesome/free-solid-svg-icons';

library.add(faCircleInfo, faQuestion,faDownload);
    export default {
        name: 'Preventive Maintenance Service',
        components: {
        Header,
        Sidebar,
        FontAwesomeIcon
    },
    setup() {
        const pmsData = ref([]);

        const exportPMSData = (id) => {
            window.location.href = `./api/export_pms_data/${id}?export=true`;
        };

        const getPMSData = () => {
            const url = './api/get_pms_data';
            axios.get(url)
                .then(response => {
                    pmsData.value = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

        const formatDate = (date)=> {
            if (!date || date === '0000-00-00') {
                return null; // Return null if the date is null or '0000-00-00'
            } else {
                const formattedDate = new Date(date).toLocaleString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',

                });
                return formattedDate;
            }
        };

        onMounted(() => {
            getPMSData();
        });

        return {
            formatDate,
            pmsData,
            exportPMSData,
            getPMSData
        };

    }
}

</script>