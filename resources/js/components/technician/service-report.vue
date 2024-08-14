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
                                                <th rowspan="2"></th>
                                                <th rowspan="2">Type of Service</th>
                                                <th rowspan="2">Hospital Name</th>
                                                <th rowspan="2">Address</th>
                                                <th rowspan="2">Date</th>
                                                <th colspan="4">Equipment Details</th>
                                                <th colspan="2">Nature of Problem</th>
                                                <th colspan="5">Service Details</th>
                                            
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
                                                <th>Status After Service</th>
                                                <th>Engineer's Remarks</th>
                                            </tr>
                                        </thead>
                                <tbody>
                                        <tr v-for="(item, index) in serviceReportData" :key="item.id" class="odd gradeX">
                                            <td style="width: 8%;">
                                            <a href="javascript:;" class="btn btn-warning btn-icon btn-md"><i class="fa fa-eye"></i></a>&nbsp;
                                            <button  @click="export_service_report(item.id)" class="btn btn-success btn-icon">
                                                <font-awesome-icon :icon="['fa', 'download']" />
                                            </button>&nbsp;
                                            
                                            <button  class="btn btn-success btn-icon" @click="showModal(item.id)">
                                                <font-awesome-icon :icon="['fa', 'circle-info']" />
                                            </button>
                                        </td>
                                            <td>{{ item.service_type}}</td>
                                            <td>{{ item.client}}</td>
                                            <td>{{ item.address }}</td>
                                            <td>{{ item.date}}</td>
                                            <td>{{ item.equipment_type}}</td>
                                            <td>{{ item.brand}}</td>
                                            <td>{{ item.model}}</td>
                                            <td>{{ item.serial_no}}</td>
                                            <td>{{ item.problem_reported}}</td>
                                            <td>{{ item.location}}</td>
                                            <td>{{ item.service_rendered}}</td>
                                            <td>{{ item.defects_found}}</td>
                                            <td>{{ item.action_taken}}</td>
                                            <td>{{ item.status_after_service}}</td>
                                            <td>{{ item.engineers_remarks}}</td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <ModalRecommendation :selectedClientId="selectedClientId" :visible="isModalVisible" @close="isModalVisible = false" />

    </div>

</template>
<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/sidebar.vue";
import ModalRecommendation from "./modal/modal_add_recommendation.vue"

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCircleInfo, faDownload, faQuestion} from '@fortawesome/free-solid-svg-icons';

library.add(faCircleInfo, faQuestion, faDownload);
export default {
    name: 'Service Report',
    components: {
        Header,
        Sidebar,
        FontAwesomeIcon,
        ModalRecommendation
    },
    setup() {
        const serviceReportData = ref([]);
        const isModalVisible = ref(false);
        const selectedClientId = ref(null);


       

        const getServiceReport = () => {
            const url = './api/get_service_details';
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

        const showModal = (id) => {
            selectedClientId.value = id;
            isModalVisible.value = true;
        };

        const export_service_report = (id) => {
            window.location.href = `./api/export_service_report/${id}?export=true`;
        };

        onMounted(() => {
            getServiceReport();
        });

        return {
            formatDate,
            showModal,
            ModalRecommendation,
            isModalVisible,
            selectedClientId,
            serviceReportData,
            export_service_report,
            getServiceReport,
            
        };

    }
}

</script>