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
                                    filled out all the required fields marked with an asterisk (*). All required fields
                                    must be completed before you can submit the form.
                                </h4>
                            </div>
                            <div class="panel-body">
                                <fieldset
                                    style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                    <legend style="font-size: 1.2em; padding: 0 10px;font-weight:bolder;">WHSE Information</legend>

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Type of Service</label>
                                                <select id="serviceType" v-model="selectedOption" class="form-control">
                                                <option v-for="option in options" :key="option.value" :value="option.value">
                                                    {{ option.label }}
                                                </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="warehouseOwnerName" class="form-label">Hospital Name</label>
                                                <input type="text" class="form-control" id="warehouseOwnerName"
                                                    aria-describedby="warehouseOwnerNameHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Address</label>
                                                <input type="text" class="form-control" id="warehouseName"
                                                    aria-describedby="warehouseNameHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Date</label>
                                                <input type="text" class="form-control" id="warehouseName"
                                                    aria-describedby="warehouseNameHelp">
                                            </div>
                                        </div>

                                    </div>
                                </fieldset>
                                <fieldset
                                    style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                    <legend style="font-size: 1.2em; padding: 0 10px;font-weight:bolder;">Equipment Details</legend>

                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Equipment Type</label>
                                                <input type="text" class="form-control" id="warehouseName"
                                                    aria-describedby="warehouseNameHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Model</label>
                                                <input type="text" class="form-control" id="warehouseName"
                                                    aria-describedby="warehouseNameHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Brand</label>
                                                <input type="text" class="form-control" id="warehouseName"
                                                    aria-describedby="warehouseNameHelp">
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Serial No. / Asset No.</label>
                                                <input type="text" class="form-control" id="warehouseName"
                                                    aria-describedby="warehouseNameHelp">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </fieldset>
                                <fieldset
                                    style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                    <legend style="font-size: 1.2em; padding: 0 10px;font-weight:bolder;">Nature of Problem</legend>
                                
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Location/Department</label>
                                                <select class="form-control"></select>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Problem Reported</label>
                                                <textarea class="form-control" style="height:153px;resize: none;"> </textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </fieldset>
                                <fieldset
                                    style="width: 100%; border: 1px solid #ddd; padding: 10px; margin-bottom: 20px;">
                                    <legend style="font-size: 1.2em; padding: 0 10px;font-weight: bolder;">Service Details</legend>
                                
                                    <div class="row">
                                      
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Service Rendered</label>
                                                <textarea class="form-control" style="height:153px;resize: none;"> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Defect(s) found</label>
                                                <textarea class="form-control" style="height:153px;resize: none;"> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Action Taken</label>
                                                <textarea class="form-control" style="height:153px;resize: none;"> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Status after service</label>
                                                <textarea class="form-control" style="height:153px;resize: none;"> </textarea>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="mb-3">
                                                <label for="warehouseName" class="form-label">Engineer's Remarks</label>
                                                <textarea class="form-control" style="height:153px;resize: none;"> </textarea>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </fieldset>
                                <button @click="showModal"  class="btn btn-md col-lg-12 btn-success">Save</button>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

        <!-- Modal Component -->
        <ModalRecommendation :visible="isModalVisible" @close="isModalVisible = false" />
    </div>
</template>

<style src="vue-multiselect/dist/vue-multiselect.css"></style>



<script>
import { ref } from 'vue';

import Multiselect from 'vue-multiselect';
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/sidebar.vue";
import ModalRecommendation from "../technician/modal/modal_add_recommendation.vue";
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
        Multiselect,
        ModalRecommendation
    },
    setup() {
    const isModalVisible = ref(false);
    const selectedOption = ref(null);

    const options = ref([
      { label: 'Assessment', value: 1 },
      { label: 'Assessment/Repair', value: 2 },
      { label: 'Repair', value: 3 },
      { label: 'Corrective Maintenance', value: 4 },
      { label: 'PMS Calibration', value: 5 },
    ]);


    const showModal = () => {
      isModalVisible.value = true;
    };

    return {
      isModalVisible,
      showModal,
      selectedOption,
      options
    };
  },

}
</script>
<style>
/* Add any necessary styles here */
</style>