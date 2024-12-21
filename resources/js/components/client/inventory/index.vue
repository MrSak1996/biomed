<template>
    <div>
        <Header />
        <Sidebar />
        <div id="content" class="content">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Inventory Management</li>
            </ol>
            <h1 class="page-header">Inventory Management</h1>
            <!-- Quick Statistics -->
            <statistics />
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-inverse" data-sortable-id="index-1">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <button class="btn btn-warning btn-xs">Back</button>
                                <router-link to="/inventory-management"
                                    class="btn btn-success btn-xs">Submit</router-link>

                            </div>
                            <h4 class="panel-title">Asset Management Form</h4>
                        </div>
                        <div class="panel-body">
                            <form @submit.prevent="asset_form">
                                <div class="row">
                                    <!-- Control No -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Control No.</label>
                                            <input type="text" class="form-control" readonly
                                                v-model="client_inv_form.control_no" />
                                        </div>
                                    </div>


                                    <!-- Accountable Person -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Accountable Person</label>
                                            <input type="text" class="form-control"
                                                v-model="client_inv_form.acct_person" />
                                        </div>
                                    </div>

                                    <!-- Sex -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Sex</label>
                                            <select class="form-control" v-model="client_inv_form.sex">
                                                <option value="" disabled>Select</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Employment Type -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Employment Type</label>
                                            <select class="form-control" v-model="client_inv_form.employmentType">
                                                <option value="" disabled>Select</option>
                                                <option value="Permanent">Permanent</option>
                                                <option value="Contractual">Contractual</option>
                                                <option value="Temporary">Temporary</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Equipment Type</label>
                                            <select class="form-control" v-model="client_inv_form.equipment">
                                                <option v-for="e in equipments" :key="e.id" :value="e.id">
                                                    {{ e.value }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- Brand -->


                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Brand</label>
                                            <input type="text" class="form-control" v-model="client_inv_form.brand" />
                                        </div>
                                    </div>

                                    <!-- Model -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Model</label>
                                            <input type="text" class="form-control" v-model="client_inv_form.model" />
                                        </div>
                                    </div>

                                    <!-- Property No -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Property No.</label>
                                            <input type="text" class="form-control"
                                                v-model="client_inv_form.property_no" />
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <!-- Serial No -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Serial No.</label>
                                            <input type="text" class="form-control"
                                                v-model="client_inv_form.serial_no" />
                                        </div>
                                    </div>
                                     <!-- Acquisition Cost -->
                                     <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Acquisition Cost</label>
                                            <input type="number" class="form-control"
                                                v-model="client_inv_form.acquisition_cost" />
                                        </div>
                                    </div>

                                    <!-- Year Acquired -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Year Acquired</label>
                                            <input type="text" class="form-control"
                                                v-model="client_inv_form.year_acquired" />
                                        </div>
                                    </div>
                                     <!-- Division -->
                                     <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Division</label>
                                            <select class="form-control" v-model="client_inv_form.division_id">
                                                <option v-for="department in departments" :key="department.id"
                                                    :value="department.id">
                                                    {{ department.value }}
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <!-- Division -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select class="form-control" v-model="client_inv_form.status">
                                                <option value="Serviceable">Serviceable</option>
                                                <option value="Unserviceable">Unserviceable</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- Remarks -->
                                    <div class="col-lg-3 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Remarks</label>
                                            <textarea class="form-control" v-model="client_inv_form.remarks"
                                                rows="2"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <!-- Submit Button -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import axios from 'axios';
import Header from "../../../components/layout/header.vue";
import Sidebar from "../../../components/layout/client_sidebar.vue";
import Statistics from "../statistics.vue";
import { ref, onMounted } from 'vue';
import { useForm } from '@/composables/useForm'
import { useApi } from '@/composables/useApi'


const { client_inv_form } = useForm()
const { getControlNo, departments, equipments, get_equipment, get_department } = useApi()
const userId = localStorage.getItem('userId');
const errors = ref({})


const asset_form = async () => {
    try {
        errors.value = {}

        const requestData = {
            ...client_inv_form,
            client_id: userId
        }
        const response = await axios.post('/api/post_asset', requestData)
        setTimeout(() => {
            const id = response.data.id
            router.push({
                name: 'Client Dashboard',
                query: { api_token: localStorage.getItem('api_token') }
            })
        }, 1000)
    } catch (error) {
        console.log(error)
    }
}


onMounted(() => {
    departments,
        equipments,
        getControlNo(client_inv_form, userId),
        get_department(),
        get_equipment()
});

</script>