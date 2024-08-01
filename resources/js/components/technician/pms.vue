<style>
.fort-icon {
    size: 104px !important;
}

.custom-multiselect .multiselect__select {
    height: 20px;
    /* Adjust height as needed */
}

.custom-multiselect .multiselect__tags {
    height: 20px;
    /* Adjust height to match if needed */
}

.custom-multiselect .multiselect__single {
    height: 20px;
    /* Adjust height to match if needed */
}
</style>
<template>
    <div>
        <Header />
        <Sidebar />
        <div id="content" class="content">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item">Services</li>
                <li class="breadcrumb-item active">Preventive Maintenance Service</li>
            </ol>
            <h1 class="page-header">Job Order List</h1>
            <form>
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
                                <h4 class="panel-title">
                                    <font-awesome-icon :icon="['fas', 'circle-info']"
                                        class="fort-icon fa-lg"></font-awesome-icon> To proceed, make sure you have
                                    filled out all the required fields marked with an asterisk (*). All required fields
                                    must be completed before you can submit the form.
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <label class="form-label">Equipment Type</label>

                                        <multiselect v-model="equipment" :options="equipment_list" label="label"
                                            :multiple="false"></multiselect>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <label class="form-label">Client List</label>
                                        <multiselect v-model="client" :options="client_list" label="label"
                                            :multiple="false"></multiselect>
                                    </div>
                                    <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12">
                                        <label class="form-label">Department List</label>
                                        <multiselect v-model="department" :options="department_list" label="label"
                                            :multiple="false"></multiselect>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="control_no" :value="control_no" placeholder=""
                                            label="Control No" :required="true" type="text" :readonly="true" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="address" placeholder="" label="Brand"
                                            :required="true" type="text" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="address" placeholder="" label="Model"
                                            :required="true" type="text" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="address" placeholder="" label="Serial No."
                                            :required="true" type="text" />
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
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
                                <h4 class="panel-title">
                                    Diagnosis
                                </h4>
                            </div>
                            <div class="panel-body">
                                <div class="note note-primary m-b-15">
                                    <div class="note-icon"><i class="fa fa-gear"></i></div>
                                    <div class="note-content">
                                        <h4><b>Status</b></h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Maecenas id gravida libero. Etiam semper id sem a ultricies.
                                        </p>
                                    </div>
                                </div>
                                <div class="note note-warning note-with-right-icon m-b-15">
                                    <div class="note-icon"></div>
                                    <div class="note-content text-right">
                                        <h4><b>Remarks</b></h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Maecenas id gravida libero. Etiam semper id sem a ultricies.
                                        </p>
                                    </div>
                                </div>
                                <div class="note note-success m-b-15">
                                    <div class="note-icon"><i class="fa fa-gear"></i></div>
                                    <div class="note-content">
                                        <h4><b>Verify By</b></h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                            Maecenas id gravida libero. Etiam semper id sem a ultricies.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="panel panel-inverse" data-sortable-id="index-10" style="height:495px;">
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
                                <h4 class="panel-title">
                                    Preventive Maintenance Checklist
                                </h4>
                            </div>
                            <div class="panel-body">
                                <ul class="nav nav-tabs">
                                    <li class="nav-items">
                                        <a href="#default-tab-1" data-toggle="tab" class="nav-link active show">
                                            <span class="d-sm-none">Tab 1</span>
                                            <span class="d-sm-block d-none">Visual Inspection</span>
                                        </a>
                                    </li>
                                    <li class="nav-items">
                                        <a href="#default-tab-2" data-toggle="tab" class="nav-link">
                                            <span class="d-sm-none">Tab 2</span>
                                            <span class="d-sm-block d-none">Cleaning</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#default-tab-3" data-toggle="tab" class="nav-link">
                                            <span class="d-sm-none">Tab 3</span>
                                            <span class="d-sm-block d-none">Battery Maintenance</span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="#default-tab-4" data-toggle="tab" class="nav-link">
                                            <span class="d-sm-none">Tab 3</span>
                                            <span class="d-sm-block d-none">Electrical Safety Test</span>
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <!-- begin tab-pane -->
                                    <div class="tab-pane fade active show" id="default-tab-1"
                                        style="height: 350px; overflow-y: scroll;">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="1%">Visual Inspection</th>
                                                    <th width="10%">Pass</th>
                                                    <th class="text-nowrap">Fail</th>
                                                    <th class="text-nowrap">Not Applicable</th>
                                                    <th class="text-nowrap">Parts Condition</th>
                                                    <th class="text-nowrap">Remarks</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                        <tr v-for="(row, index) in tableData" :key="index">
                                            <td>{{ row.equipment_info }}</td>
                                     
                                        </tr>
                                    </tbody>
                                        </table>
                                    </div>
                                    <!-- end tab-pane -->
                                    <!-- begin tab-pane -->
                                    <div class="tab-pane fade" id="default-tab-2"
                                        style="height: 350px; overflow-y: scroll;">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="1%">Visual Inspection</th>
                                                    <th width="10%">Pass</th>
                                                    <th class="text-nowrap">Fail</th>
                                                    <th class="text-nowrap">Not Applicable</th>
                                                    <th class="text-nowrap">Parts Condition</th>
                                                    <th class="text-nowrap">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(row, index) in tableData" :key="row.id" class="odd gradeX">
                                                    <td>{{ row.equipment_info }}</td>
                                                 
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end tab-pane -->
                                    <!-- begin tab-pane -->
                                    <div class="tab-pane fade" id="default-tab-3"
                                        style="height: 350px; overflow-y: scroll;">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="1%">Battery Maintenance</th>
                                                    <th width="10%">Pass</th>
                                                    <th class="text-nowrap">Fail</th>
                                                    <th class="text-nowrap">Not Applicable</th>
                                                    <th class="text-nowrap">Parts Condition</th>
                                                    <th class="text-nowrap">Remarks</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>n/a</td>
                                                    <td>n/a</td>
                                                    <td>n/a</td>
                                                    <td>n/a</td>
                                                    <td>n/a</td>
                                                    <td>n/a</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane fade" id="default-tab-4"
                                        style="height: 350px; overflow-y: scroll;">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                                <tr>
                                                    <th width="1%">Electrical Safety Test</th>
                                                    <th width="10%">Pass</th>
                                                    <th class="text-nowrap">Fail</th>
                                                    <th class="text-nowrap">Not Applicable</th>
                                                    <th class="text-nowrap">Parts Condition</th>
                                                    <th class="text-nowrap">Remarks</th>

                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>n/a</td>
                                                    <td>n/a</td>
                                                    <td>n/a</td>
                                                    <td>n/a</td>
                                                    <td>n/a</td>
                                                    <td>n/a</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- end tab-pane -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success col-lg-12">Save</button>
            </form>
        </div>
    </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>



<script>
import { ref, onMounted, watch } from 'vue';

import axios from 'axios';
import Multiselect from 'vue-multiselect';
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/sidebar.vue";
import TextInput from "../../components/layout/textinput.vue";
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCircleInfo, faQuestion } from '@fortawesome/free-solid-svg-icons';

library.add(faCircleInfo, faQuestion);

export default {
    name: 'PreventiveMaintenanceService',
    components: {
        Header,
        Sidebar,
        FontAwesomeIcon,
        TextInput,
        Multiselect
    },
    setup() {
        const equipment = ref(null);
        const department = ref(null);
        const client = ref(null);
        const address = ref(null);
        const control_no = ref(null);

        const equipment_list = ref([]);
        const client_list = ref([]);
        const department_list = ref([]);
        const tableData = ref([]);


        const get_equipment = () => {
            const url = './api/get_equipment';
            axios.get(url)
                .then(response => {
                    equipment_list.value = response.data.map(item => ({
                        label: item.equipment,
                        value: item.id,
                        equipment_id: item.id
                    }));
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

        const get_client = () => {
            const url = './api/get_client';
            axios.get(url)
                .then(response => {
                    client_list.value = response.data.map(item => ({
                        label: `${item.client} (${item.control_no})`, // Customize the label as needed
                        value: item.id,
                        control_no: item.control_no
                    }));
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

        const get_department = () => {
            const url = './api/get_department';
            axios.get(url)
                .then(response => {
                    department_list.value = response.data.map(item => ({ label: item.department, value: item.id }));
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

        const get_equipment_info = (id) => {
            const url = `./api/get_equipment_info/${id}`;
            axios.get(url)
                .then(response => {
                  tableData.value = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

    


        watch(client, (newClient) => {
            if (newClient) {
                const selectedClient = client_list.value.find(item => item.value === newClient.value);
                if (selectedClient) {
                    control_no.value = selectedClient.control_no;
                    console.log(control_no.value);
                }
            }
        });

        watch(equipment, (newEquipment) => {
            if (newEquipment) {
                get_equipment_info(newEquipment.equipment_id);
            }
        });


        onMounted(() => {
            get_equipment();
            get_client();
            get_department();

        });

        return {
            equipment,
            department,
            client,
            control_no,
            address,
            equipment_list,
            client_list,
            department_list,
            tableData,
            get_equipment,
            get_client,
            get_department,
            get_equipment_info
        };
    }
}
</script>

<style>
/* Add any necessary styles here */
</style>
