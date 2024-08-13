<style></style>
<template>
    <div>
        <Header />
        <Sidebar />
        <div id="content" class="content">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Servie Report</li>
            </ol>
            <h1 class="page-header">Servie Report</h1>

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
                            <h4 class="panel-title">Service Report Data</h4>
                        </div>
                        <div class="panel-body">
                            <router-link to="/service-report-create" class="btn btn-primary mb-2">Create Service Report
                            </router-link>
                            <table id="data-table-responsive" class="table table-striped table-bordered">
                                <thead>
                                            <tr>
                                                <th rowspan="2">Type of Service</th>
                                                <th rowspan="2">Hospital Name</th>
                                                <th rowspan="2">Address</th>
                                                <th rowspan="2">Date</th>
                                                <th colspan="4">Equipment Details</th>
                                                <th colspan="2">Nature of Problem</th>
                                                <th colspan="3">Service Details</th>
                                            
                                            </tr>
                                            <tr>
                                                <th>Equipment Type</th>
                                                <th>Brand</th>
                                                <th>Model</th>
                                                <th>Serial No./Asset No.</th>
                                                <th>Problem Reported</th>
                                                <th>Location/Department</th>
                                                <th>Service Rendered</th>
                                                <th>Detect(s) Found</th>
                                                <th>Action Taken</th>
                                            </tr>



                                        </thead>
                                <tbody>
                                    
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

library.add(faCircleInfo, faQuestion, faDownload);
export default {
    name: 'Service Report',
    components: {
        Header,
        Sidebar,
        FontAwesomeIcon
    },
    setup() {
        const serviceReportData = ref([]);

        const exportServiceReport = (id) => {
            window.location.href = `./api/export_pms_data/${id}?export=true`;
        };

        const getServiceReport = () => {
            const url = './api/get_pms_data';
            axios.get(url)
                .then(response => {
                    serviceReportData.value = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

        const formatDate = (date) => {
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
            getServiceReport();
        });

        return {
            formatDate,
            serviceReportData,
            exportServiceReport,
            getServiceReport
        };

    }
}

</script>