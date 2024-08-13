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

.chk_box {
    width: 50px;
    height: 50px;
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
                                        <TextInput class="mt-3" v-model="brand" :value="brand" placeholder=""
                                            label="Brand" :required="true" type="text" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="model" :value="model" placeholder=""
                                            label="Model" :required="true" type="text" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="serial_no" :value="serial_no" placeholder=""
                                            label="Serial No." :required="true" type="text" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="other_info1" :value="other_info1" placeholder=""
                                            label="Other Information" :required="true" type="text" />
                                    </div>
                                   
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="ppm_date" :value="ppm_date" placeholder=""
                                            label="PPM Date" :required="true" type="date" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="ppm_end_time" :value="ppm_end_time" placeholder=""
                                            label="PPM End Time" :required="true" type="time" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="next_due_date" :value="next_due_date" placeholder=""
                                            label="Next Due Date" :required="true" type="date" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="other_info2" :value="other_info2" placeholder=""
                                            label="Other Information" :required="true" type="text" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="other_info3" :value="other_info3" placeholder=""
                                            label="Other Information" :required="true" type="text" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="other_info4" :value="other_info4" placeholder=""
                                            label="Other Information" :required="true" type="text" />
                                    </div>
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="other_info5" :value="other_info5" placeholder=""
                                            label="Other Information" :required="true" type="text" />
                                    </div>
                               
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <TextInput class="mt-3" v-model="other_info6" :value="other_info6" placeholder=""
                                            label="Other Information" :required="true" type="text" />
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
                                                <tr v-for="(row, index) in visualData" :key="index">
                                                    <td>{{ row.equipment_info }}</td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            v-model="row.pass" :value="row.id" :checked="row.pass"
                                                            @change="handleCheckboxClick(index, 'pass')" /> </td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            v-model="row.fail" :value="row.id" :checked="row.fail"
                                                            @change="handleCheckboxClick(index, 'fail')" /> </td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            v-model="row.na" :value="row.id" :checked="row.na"
                                                            @change="handleCheckboxClick(index, 'na')" /> </td>
                                                    <td> <input type="text" class="form-control" /></td>
                                                    <td> <input type="text" class="form-control" /></td>
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
                                                    <th width="1%">Cleaning</th>
                                                    <th width="10%">Pass</th>
                                                    <th class="text-nowrap">Fail</th>
                                                    <th class="text-nowrap">Not Applicable</th>
                                                    <th class="text-nowrap">Parts Condition</th>
                                                    <th class="text-nowrap">Remarks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr v-for="(row, index) in cleaningData" :key="row.id"
                                                    class="odd gradeX">
                                                    <td>{{ row.equipment_info }}</td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            v-model="row.pass" :value="row.id" :checked="row.pass"
                                                            @change="handleCleaningCheck(index, 'pass')" /> </td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            v-model="row.fail" :value="row.id" :checked="row.fail"
                                                            @change="handleCleaningCheck(index, 'fail')" /> </td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            v-model="row.na" :value="row.id" :checked="row.na"
                                                            @change="handleCleaningCheck(index, 'na')" /> </td>
                                                    <td> <input type="text" class="form-control" /></td>
                                                    <td> <input type="text" class="form-control" /></td>
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
                                                <tr v-for="(row, index) in batteryMainData" :key="row.id"
                                                    class="odd gradeX">
                                                    <td>{{ row.equipment_info }}</td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            :value="row.id" :checked="row.pass"
                                                            @change="handleBatteryCheck(index, 'pass')" /> </td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            :value="row.id" :checked="row.fail"
                                                            @change="handleBatteryCheck(index, 'fail')" /> </td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            :value="row.id" :checked="row.na"
                                                            @change="handleBatteryCheck(index, 'na')" /> </td>
                                                    <td> <input type="text" class="form-control" /></td>
                                                    <td> <input type="text" class="form-control" /></td>
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
                                                <tr v-for="(row, index) in estData" :key="row.id" class="odd gradeX">
                                                    <td>{{ row.equipment_info }}</td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            :value="row.id" :checked="row.pass"
                                                            @change="handleEstCheck(index, 'pass')" /> </td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            :value="row.id" :checked="row.fail"
                                                            @change="handleEstCheck(index, 'fail')" /> </td>
                                                    <td> <input type="checkbox" class="form-control chk_box"
                                                            :value="row.id" :checked="row.na"
                                                            @change="handleEstCheck(index, 'na')" /> </td>
                                                    <td> <input type="text" class="form-control" /></td>
                                                    <td> <input type="text" class="form-control" /></td>
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
                <button type="button" @click="handleSubmit" class="btn btn-success col-lg-12">Save</button>
            </form>
        </div>
    </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>



<script>
import { ref, onMounted, watch, computed } from 'vue';

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
        const brand = ref('');
        const model = ref('');
        const serial_no = ref('');
        const ppm_date = ref('');
        const ppm_end_time = ref('');
        const next_due_date = ref('');
        const other_info1 = ref('');
        const other_info2 = ref('');
        const other_info3 = ref('');
        const other_info4 = ref('');
        const other_info5 = ref('');
        const other_info6 = ref('');
        const visual_is_pass = ref(null);
        const visual_is_fail = ref(null);
        const visual_is_na = ref(null);
        const is_pass = ref(null);
        const condition = ref(null);
        const remarks = ref(null);
        const selectedCheckbox = ref(null);

        const equipment_list = ref([]);
        const client_list = ref([]);
        const department_list = ref([]);
        const visualData = ref([]);
        const cleaningData = ref([]);
        const batteryMainData = ref([]);
        const estData = ref([]);


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

        const get_visual_equipment_info = (id) => {
            const url = `./api/get_equipment_info/${id}?equipment_cat=1`;
            axios.get(url)
                .then(response => {
                    visualData.value = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

        const get_cleaning_equipment_info = (id) => {
            const url = `./api/get_equipment_info/${id}?equipment_cat=2`;
            axios.get(url)
                .then(response => {
                    cleaningData.value = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

        const get_batmain_equipment_info = (id) => {
            const url = `./api/get_equipment_info/${id}?equipment_cat=3`;
            axios.get(url)
                .then(response => {
                    batteryMainData.value = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

        const get_est_equipment_info = (id) => {
            const url = `./api/get_equipment_info/${id}?equipment_cat=4`;
            axios.get(url)
                .then(response => {
                    estData.value = response.data.data;
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        };

        const handleCheckboxClick = (colIndex, type) => {
            const item = visualData.value[colIndex];

            if (item) {
                item.pass = type === 'pass';
                item.fail = type === 'fail';
                item.na = type === 'na';
            } else {
                console.error(`Invalid column index: ${colIndex}`);
            }
        };

        const handleCleaningCheck = (colIndex, type) => {
            const item = cleaningData.value[colIndex];

            if (item) {
                item.pass = type === 'pass';
                item.fail = type === 'fail';
                item.na = type === 'na';
            } else {
                console.error(`Invalid column index: ${colIndex}`);
            }
        };

        const handleBatteryCheck = (colIndex, type) => {
            const item = batteryMainData.value[colIndex];

            if (item) {
                item.pass = type === 'pass';
                item.fail = type === 'fail';
                item.na = type === 'na';
            } else {
                console.error(`Invalid column index: ${colIndex}`);
            }
        };

        const handleEstCheck = (colIndex, type) => {
            const item = estData.value[colIndex];

            if (item) {
                item.pass = type === 'pass';
                item.fail = type === 'fail';
                item.na = type === 'na';
            } else {
                console.error(`Invalid column index: ${colIndex}`);
            }
        };

        const handleSubmit = () => {
            const visualChecklist = visualData.value.filter(row => row.category);
            const cleaningChecklist = cleaningData.value.filter(row => row.category);
            const bmChecklist = batteryMainData.value.filter(row => row.category);
            const estChecklist = estData.value.filter(row => row.category);


            const formData = {
                equipment: equipment.value.value,
                department: department.value.value,
                client: client.value.value,
                control_no: control_no.value,
                brand: brand.value,
                model: model.value,
                serial_no: serial_no.value,
                ppm_date:ppm_date.value,
                ppm_end_time:ppm_end_time.value,
                next_due_date:next_due_date.value,
                other_info1:other_info1.value,
                other_info2:other_info2.value,
                other_info3:other_info3.value,
                other_info4:other_info4.value,
                other_info5:other_info5.value,
                other_info6:other_info6.value,
                visual_checklist: visualChecklist,
                cleaning_checklist: cleaningChecklist,
                bm_checklist: bmChecklist,
                est_checklist: estChecklist
            };

            axios.post('./api/post_preventive_maintenance', formData)
                .then(response => {
                    // console.log('Form submitted successfully:', response.data);
                    // this.showToatSuccess('Successfully created!');
                    setTimeout(() => {
                        showSweetAlert('success');
                        location.reload();
                    }, 1000); // Adjust the delay as needed
                })
                .catch(error => {
                    console.error('Error submitting form:', error);
                });
        };

        const passCount = computed(() => {
            return visualData.value.filter(row => row.pass).length;
        });

        const showSweetAlert = (type) => {
            let options = {
                title: 'Successfully saved!',
                text: 'Your data has been saved successfully.',
                icon: type === 'success' ? 'success' : 'info',
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn btn-default",
                        closeModal: true
                    },
                    confirm: {
                        text: type.charAt(0).toUpperCase() + type.slice(1),
                        value: true,
                        visible: true,
                        className: `btn btn-${type}`,
                        closeModal: true
                    }
                }
            };

            if (type === 'success') {
                options = {
                    title: "Successfully save",
                    text: "",
                    icon: "success"
                };
            } else if (type === 'danger') {
                options.icon = 'error';
            } else if (type === 'warning') {
                options.icon = 'warning';
            }

            swal(options);
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
                get_visual_equipment_info(newEquipment.equipment_id);
                get_cleaning_equipment_info(newEquipment.equipment_id);
                get_batmain_equipment_info(newEquipment.equipment_id);
                get_est_equipment_info(newEquipment.equipment_id);
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
            brand,
            model,
            serial_no,
            ppm_date,
            ppm_end_time,
            next_due_date,
            other_info1,
            other_info2,
            other_info3,
            other_info4,
            other_info5,
            other_info6,
            is_pass,
            condition,
            remarks,
            address,
            visual_is_pass,
            visual_is_fail,
            visual_is_na,
            equipment_list,
            client_list,
            department_list,
            visualData,
            cleaningData,
            batteryMainData,
            estData,
            passCount,
            get_equipment,
            get_client,
            get_department,
            get_visual_equipment_info,
            get_cleaning_equipment_info,
            get_batmain_equipment_info,
            get_est_equipment_info,
            selectedCheckbox,
            handleCheckboxClick,
            handleCleaningCheck,
            handleBatteryCheck,
            handleEstCheck,
            handleSubmit,
            showSweetAlert

        };
    }
}
</script>

<style>
/* Add any necessary styles here */
</style>