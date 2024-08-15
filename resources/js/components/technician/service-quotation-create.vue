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
                <li class="breadcrumb-item active">Service Quotation Create</li>
            </ol>
            <h1 class="page-header">Service Quotation Create</h1>
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
                                <font-awesome-icon :icon="['fas', 'circle-info']"
                                    class="fort-icon fa-lg"></font-awesome-icon> To proceed, make sure you have
                                filled out all the required fields marked with an asterisk (*). All required fields must
                                be completed before you can submit the form.
                            </h4>
                        </div>
                        <div class="panel-body">
                            <form @submit.prevent="saveForm">
                                <fieldset
                                    style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                    <legend style="font-size: 1.2em; padding: 0 10px;font-weight:bolder;">Service
                                        Quotation Details</legend>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="client" class="form-label">Control No.</label>

                                                <input type="text" class="form-control" v-model="form.control_no" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">

                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="client" class="form-label">Client</label>

                                                <select id="serviceType" v-model="selectedClientId"
                                                    class="form-control">
                                                    <option v-for="client in client_list" :key="client.value"
                                                        :value="client.value">
                                                        {{ client.label }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="client_id" class="form-label">Date</label>

                                                <input type="date" class="form-control" id="date" v-model="form.date" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <textarea class="form-control" id="address"
                                                    v-model="address"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset
                                    style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                    <legend style="font-size: 1.2em; padding: 0 10px;font-weight:bolder;">Type of
                                        Service</legend>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="service_type" class="form-label">Service Type</label>
                                                <select id="client" v-model="selectedService" class="form-control">
                                                    <option v-for="option in options" :key="option.value"
                                                        :value="option.value">
                                                        {{ option.label }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset
                                    style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                    <legend style="font-size: 1.2em; padding: 0 10px;font-weight: bolder;">Service
                                        Details</legend>

                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="work_done" class="form-label">Work Done</label>
                                                <textarea id="work_done" class="form-control"
                                                    style="height:130px;resize: none;"
                                                    v-model="form.work_done"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="remarks" class="form-label">Remarks</label>
                                                <textarea id="remarks" class="form-control"
                                                    style="height:130px;resize: none;"
                                                    v-model="form.remarks"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="assessed_by" class="form-label">Assessed by:</label>
                                                <input type="text" id="assessed_by" class="form-control"
                                                    v-model="form.assessed_by" />
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>

                                <button @click="handleSubmit" class="btn btn-md col-lg-12 btn-success">Save</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
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
                                filled out all the required fields marked with an asterisk (*). All required fields must
                                be completed before you can submit the form.
                            </h4>
                        </div>
                        <div class="panel-body">
                            <fieldset style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                <legend style="font-size: 1.2em; padding: 0 10px;font-weight:bolder;">Equipment
                                    Details</legend>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="equipment_type" class="form-label">Equipment Type</label>
                                            <select id="equipment_type" v-model="selectedEquipment"
                                                class="form-control">
                                                <option v-for="option in equipment_list" :key="option.value"
                                                    :value="option.value">
                                                    {{ option.label }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="brand" class="form-label">Brand</label>
                                            <input type="text" id="brand" class="form-control" v-model="form.brand" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="serial_no" class="form-label">Serial No.</label>
                                            <input type="text" id="serial_no" class="form-control"
                                                v-model="form.serial_no" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="model" class="form-label">Model</label>
                                            <input type="text" id="model" class="form-control" v-model="form.model" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="department" class="form-label">Department</label>
                                            <select id="department" v-model="selectedDepartment" class="form-control">
                                                <option v-for="option in department_list" :key="option.value"
                                                    :value="option.value">
                                                    {{ option.label }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="complaint" class="form-label">Complaint</label>
                                            <input type="text" id="complaint" class="form-control"
                                                v-model="form.complaint" />
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="mb-3">
                                            <label for="findings" class="form-label">Defects/Findings</label>
                                            <input type="text" id="findings" class="form-control"
                                                v-model="form.defects" />
                                        </div>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    </div>
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
                                    class="fort-icon fa-lg"></font-awesome-icon> Information
                            </h4>
                        </div>
                        <div class="panel-body">
                            <table class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th width="1%"></th>
                                        <th width="10%" data-orderable="false">Quantity</th>
                                        <th class="text-nowrap">Unit</th>
                                        <th class="text-nowrap">Description</th>
                                        <th class="text-nowrap">Labor/Service</th>
                                        <th class="text-nowrap">Parts</th>
                                        <th class="text-nowrap">Total Cost</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(row, index) in rows" :key="index">
                                        <td style="width: 10%;">
                                            <button type="button" class="btn btn-success btn-icon"
                                                @click="removeRow(index)">
                                                <i class="fa fa-minus"></i>
                                            </button>&nbsp;
                                            <button type="button" class="btn btn-danger btn-icon" @click="addRow">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                        <td><input type="text" class="form-control" v-model="row.quantity" /></td>
                                        <td><input type="text" class="form-control" v-model="row.unit" /></td>
                                        <td><input type="text" class="form-control" v-model="row.description" /></td>
                                        <td><input type="text" class="form-control" v-model="row.laborService" /></td>
                                        <td><input type="text" class="form-control" v-model="row.parts" /></td>
                                        <td><input type="text" class="form-control" v-model="row.totalCost" /></td>
                                    </tr>
                                </tbody>
                            </table>
                            <button class="btn btn-success" @click="saveRows">Save</button>"
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal Component -->
    </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>



<script>
import { ref, onMounted, watch } from 'vue';

import Multiselect from 'vue-multiselect';
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/sidebar.vue";
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome';
import { library } from '@fortawesome/fontawesome-svg-core';
import { faCircleInfo, faQuestion } from '@fortawesome/free-solid-svg-icons';

library.add(faCircleInfo, faQuestion);

export default {
    name: 'Service Quotation Create',
    components: {
        Header,
        Sidebar,
        FontAwesomeIcon,
        Multiselect
    },
    setup() {
        // Form data


        const client_list = ref([]);
        const equipment_list = ref([]);
        const department_list = ref([]);
        const selectedClientId = ref(null);
        const selectedService = ref(null);
        const selectedDepartment = ref(null);
        const selectedEquipment = ref(null);


        const address = ref('');
        const service = ref('');
        const equipment = ref('');
        const department = ref('');

        const options = ref([
            { label: 'Assessment', value: 1 },
            { label: 'Assessment/Repair', value: 2 },
            { label: 'Repair', value: 3 },
            { label: 'Corrective Maintenance', value: 4 },
            { label: 'PMS Calibration', value: 5 },
        ]);

        const rows = ref([
            {
                quantity: '',
                unit: '',
                description: '',
                laborService: '',
                parts: '',
                totalCost: ''
            }
        ]);

        const form = ref({
            serviceType: selectedService,
            client_id: selectedClientId,
            equipmentType: selectedEquipment,
            department: selectedDepartment,
            control_no: '',
            address: '',
            date: '',
            model: '',
            brand: '',
            serial_no: '',
            çomplaint: '',
            defects: '',
            work_done: '',
            remarks: '',
            assessed_by: ''

        });

        const addRow = () => {
            rows.value.push({
                quantity: '',
                unit: '',
                description: '',
                laborService: '',
                parts: '',
                totalCost: ''
            });
        };

        const removeRow = (index) => {
            if (rows.value.length > 1) {
                rows.value.splice(index, 1);
            } else {
                alert("At least one row must remain.");
            }
        };

        const get_client = async () => {
            try {
                const { data } = await axios.get('./api/get_client');
                client_list.value = data.map(({ client, control_no, id, address }) => ({
                    label: `${client} (${control_no})`, // Customize the label as needed
                    value: id,
                    control_no,
                    address,
                }));
            } catch (error) {
                console.error('Error fetching data:', error);
            }
        };

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

        const handleSubmit = async () => {
            try {
                await axios.post('/api/post_create_service_quotation', form.value)
                    .then(response => {
                        setTimeout(() => {
                            showSweetAlert('success');
                            // location.reload();
                        }, 1000);
                    })
                    .catch(error => {
                        console.error('Error submitting form:', error);
                    });

            } catch (error) {
                console.error('Error saving form:', error);
                // Handle error, e.g., show an error message
            }
        };

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

        const saveRows = async () => {
            try {
                const response = await axios.post('/api/post_save_quotation', {
                    rows: rows.value
                });
                if (response.status === 200) {
                    alert('Rows saved successfully');
                } else {
                    alert('Failed to save rows');
                }
            } catch (error) {
                console.error('Error saving rows:', error);
                alert('An error occurred while saving rows');
            }
        };

        watch(selectedClientId, (newClientId) => {
            const selectedClient = client_list.value.find(item => item.value === newClientId) || {};
            address.value = selectedClient.address || '';
        });

        watch(selectedService, (newService) => {
            const selectedServiceType = client_list.value.find(item => item.value === newService) || {};
            service.value = selectedServiceType.value || '';
        });

        watch(selectedEquipment, (newEquipment) => {
            const selectedEquipmentType = client_list.value.find(item => item.value === newEquipment) || {};
            equipment.value = selectedEquipmentType.value || '';
        });

        watch(selectedDepartment, (newDepartment) => {
            const selDepartment = client_list.value.find(item => item.value === newDepartment) || {};
            department.value = selDepartment.value || '';
        });

        onMounted(() => {
            get_client();
            get_equipment();
            get_department();
        });



        return {
            form,
            rows,
            addRow,
            removeRow,
            selectedClientId,
            selectedEquipment,
            selectedService,
            selectedDepartment,
            address,
            department,
            equipment,
            get_client,
            get_equipment,
            get_department,
            saveRows,
            client_list,
            equipment_list,
            department_list,
            handleSubmit,
            showSweetAlert,
            options
        };
    },

}
</script>
<style>
/* Add any necessary styles here */
</style>