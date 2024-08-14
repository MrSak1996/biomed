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
                <li class="breadcrumb-item active">Service Report</li>
            </ol>
            <h1 class="page-header">Service Report</h1>
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
                                filled out all the required fields marked with an asterisk (*). All required fields must
                                be completed before you can submit the form.
                            </h4>
                        </div>
                        <div class="panel-body">
                            <form @submit.prevent="saveForm">
                                <fieldset
                                    style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                    <legend style="font-size: 1.2em; padding: 0 10px;font-weight:bolder;">WHSE
                                        Information</legend>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="serviceType" class="form-label">Type of Service</label>
                                                <select id="serviceType" v-model="form.serviceType"
                                                    class="form-control">
                                                    <option v-for="option in options" :key="option.value"
                                                        :value="option.value">
                                                        {{ option.label }}
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="client_id" class="form-label">Hospital Name</label>

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
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="address"
                                                    v-model="address" />

                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="date" class="form-label">Date</label>
                                                <input type="date" class="form-control" id="date" v-model="form.date">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset
                                    style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                    <legend style="font-size: 1.2em; padding: 0 10px;font-weight:bolder;">Equipment
                                        Details</legend>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="equipmentType" class="form-label">Equipment Type</label>
                                                <input type="text" class="form-control" id="equipmentType"
                                                    v-model="form.equipmentType">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="model" class="form-label">Model</label>
                                                <input type="text" class="form-control" id="model" v-model="form.model">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="brand" class="form-label">Brand</label>
                                                <input type="text" class="form-control" id="brand" v-model="form.brand">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="serialNo" class="form-label">Serial No. / Asset No.</label>
                                                <input type="text" class="form-control" id="serialNo"
                                                    v-model="form.serialNo">
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <fieldset
                                    style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                    <legend style="font-size: 1.2em; padding: 0 10px;font-weight:bolder;">Nature of
                                        Problem</legend>

                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="location" class="form-label">Location/Department</label>
                                                <select id="location" v-model="form.location"
                                                    class="form-control"></select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="problemReported" class="form-label">Problem Reported</label>
                                                <textarea id="problemReported" class="form-control"
                                                    style="height:153px;resize: none;"
                                                    v-model="form.problemReported"></textarea>
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
                                                <label for="serviceRendered" class="form-label">Service Rendered</label>
                                                <textarea id="serviceRendered" class="form-control"
                                                    style="height:153px;resize: none;"
                                                    v-model="form.serviceRendered"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="defectsFound" class="form-label">Defect(s) found</label>
                                                <textarea id="defectsFound" class="form-control"
                                                    style="height:153px;resize: none;"
                                                    v-model="form.defectsFound"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="actionTaken" class="form-label">Action Taken</label>
                                                <textarea id="actionTaken" class="form-control"
                                                    style="height:153px;resize: none;"
                                                    v-model="form.actionTaken"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="statusAfterService" class="form-label">Status after
                                                    service</label>
                                                <textarea id="statusAfterService" class="form-control"
                                                    style="height:153px;resize: none;"
                                                    v-model="form.statusAfterService"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="engineersRemarks" class="form-label">Engineer's
                                                    Remarks</label>
                                                <textarea id="engineersRemarks" class="form-control"
                                                    style="height:153px;resize: none;"
                                                    v-model="form.engineersRemarks"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                <button @click="handleSubmit" class="btn btn-md col-lg-12 btn-success">Save</button>
                            </form>
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
    name: 'PreventiveMaintenanceService',
    components: {
        Header,
        Sidebar,
        FontAwesomeIcon,
        Multiselect
    },
    setup() {
        // Form data
       

        const selectedOption = ref(null);
        const client_list = ref([]);
        const selectedClientId = ref(null);

        const address = ref('');
        const options = ref([
            { label: 'Assessment', value: 1 },
            { label: 'Assessment/Repair', value: 2 },
            { label: 'Repair', value: 3 },
            { label: 'Corrective Maintenance', value: 4 },
            { label: 'PMS Calibration', value: 5 },
        ]);
        const form = ref({
            serviceType: '',
            client_id: selectedClientId,
            address: '',
            date: '',
            equipmentType: '',
            model: '',
            brand: '',
            serialNo: '',
            location: '',
            problemReported: '',
            serviceRendered: '',
            defectsFound: '',
            actionTaken: '',
            statusAfterService: '',
            engineersRemarks: '',
        });
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

        const handleSubmit = async () => {
            try {
                axios.post('/api/post_create_service_details', form.value)
                .then(response => {
                    setTimeout(() => {
                        showSweetAlert('success');
                        location.reload();
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

        watch(selectedClientId, (newClientId) => {
            const selectedClient = client_list.value.find(item => item.value === newClientId) || {};
            address.value = selectedClient.address || '';
        });

        onMounted(() => {
            get_client();
        });

      

        return {
            form,
            selectedClientId,
            address,
            get_client,
            client_list,
            handleSubmit,
            selectedOption,
            showSweetAlert,
            options
        };
    },

}
</script>
<style>
/* Add any necessary styles here */
</style>