<template>
  <div>
    <Header />
    <Sidebar />
    <div id="content" class="content">
      <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <h1 class="page-header">Dashboard</h1>
      <!-- Quick Statistics -->
      <statistics
      :total_equipment="total_item"
        :total_serviceable_count="serviceable_count"
        :total_unserviceable_count="unserviceable_count"
        :outdated_equipment="outdated_count"
      />
      <div class="row">
        <div class="col-lg-4">
          <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
              <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                    class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                    class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                    class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                    class="fa fa-times"></i></a>
              </div>
              <h4 class="panel-title">Schedule of Activities</h4>
            </div>
            <div class="panel-body">
              <!-- <div id="interactive-chart" class="height-sm"></div> -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Activity</th>
                      <th>Date Scheduled</th>
                      <th>Client</th>
                      <th>Scheduled By</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in activities_opts" :key="item.id" class="odd gradeX">
                      <td>{{ item.title }}</td>
                      <td>{{ item.start_date }}</td>
                      <td>{{ item.client }}</td>
                      <td>{{ item.technician_id }}</td>
                      <td>{{ item.scheduled_by }}</td>
                      <td>
                        <button class="btn btn-sm btn-primary">View</button>
                      </td>
                    </tr>
                  </tbody>
                </table>

              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">

          <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
              <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                    class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                    class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                    class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                    class="fa fa-times"></i></a>
              </div>
              <h4 class="panel-title">Created Job Order</h4>
            </div>
            <div class="panel-body">
              <!-- <div id="interactive-chart" class="height-sm"></div> -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th>Order No.</th>
                    <th>Employee Name</th>
                    <th>Particulars</th>
                    <th>Requested Date</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in job_order_opts" :key="item.id" class="odd gradeX">
                      <td>{{ item.control_no }}</td>
                      <td>{{ item.name }}</td>
                      <td>{{ item.particulars }}</td>
                      <td>{{ item.request_date }}</td>
                      <td>
                        <button class="btn btn-sm btn-primary">View</button>

                      </td>
                     
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">

          <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
              <div class="panel-heading-btn">
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                    class="fa fa-expand"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                    class="fa fa-redo"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i
                    class="fa fa-minus"></i></a>
                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i
                    class="fa fa-times"></i></a>
              </div>
              <h4 class="panel-title">Inventory Summary</h4>
            </div>
            <div class="panel-body">
              <!-- <div id="interactive-chart" class="height-sm"></div> -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th>Total No. of Equipment</th>
                    <th>Client</th>
                    <th>Licensed No.</th>
                    <th>Requested Date</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <tr>

                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Asset Preview -->
      <div class="row">
        <div class="col-lg-12">
          <div class="panel panel-inverse" data-sortable-id="index-1">
            <div class="panel-heading">
              <div class="panel-heading-btn">

                <router-link to="/inventory-management" class="btn btn-primary btn-xs">Add Asset</router-link>

              </div>
              <h4 class="panel-title">Assets List</h4>
            </div>
            <div class="panel-body">
              <!-- <div id="interactive-chart" class="height-sm"></div> -->
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <th>Control Number</th>
                    <th>Serial Number</th>
                    <th>Property Number</th>
                    <th>Accountable Person</th>
                    <th>Employment Type</th>
                    <th>Division</th>
                    <th>Type of Equipment</th>
                    <th>Year Acquired</th>
                    <th>Brand & Model</th>
                    <th>Remarks</th>
                    <th>Current Status</th>
                    <th>Action</th>
                  </thead>
                  <tbody>
                    <tr v-for="(item, index) in asset_opts" :key="item.id" class="odd gradeX">
                      <td>{{ item.control_no }}</td>
                      <td>{{ item.serial_no }}</td>
                      <td>{{ item.property_no }}</td>
                      <td>{{ item.name }}</td>
                      <td>{{ item.employmentType }}</td>
                      <td>{{ item.department }}</td>
                      <td>{{ item.equipment }}</td>
                      <td>{{ item.year_acquired }}</td>
                      <td>Brand:{{ item.brand }} Model:{{ item.model }}</td>
                      <td>{{ item.remarks }}</td>
                      <td>{{ item.status }}</td>
                      <td>
                        <button class="btn btn-primary btn-xs mr-2">View</button>
                        <button class="btn btn-warning btn-xs mr-2">Update</button>
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
  </div>
</template>

<script setup lang="ts">
import axios from 'axios';
import { ref, onMounted } from 'vue';
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/client_sidebar.vue";
import Statistics from "./statistics.vue";

// Reactive data to store activities
const activities_opts = ref([]);
const job_order_opts = ref([]);
const asset_opts = ref([]);
const total_item = ref(0);
const serviceable_count = ref(0);
const unserviceable_count = ref(0);
const outdated_count = ref(0);

// Retrieve the user ID from localStorage
const userId = localStorage.getItem('userId');
const client_id = localStorage.getItem('client_id');

// Function to fetch data from the API
const fetchData = async () => {
  try {
    const response = await axios.get('/api/getClientActivities', {
      params: { client_id: client_id } // Pass user_id as query params
    });
    activities_opts.value = response.data; // Assign fetched data to the reactive variable
  } catch (error) {
    console.error('Error fetching activities:', error); // Log errors for debugging
  }
};

const get_client_jo = async () => {
  try {
    const response = await axios.get('/api/get_client_jo', {
      params: { user_id: userId } // Pass user_id as query params
    });
    job_order_opts.value = response.data; // Assign fetched data to the reactive variable
  } catch (error) {
    console.error('Error fetching job order:', error); // Log errors for debugging
  }
};

const get_assets = async () => {
  try {
    const response = await axios.get('/api/get_assets', {
      params: { user_id: userId } // Pass user_id as query params
    });
    total_item.value = Number(response.data.count) // Set the count if it exists

    asset_opts.value = response.data.data; // Assign fetched data to the reactive variable
  } catch (error) {
    console.error('Error fetching job order:', error); // Log errors for debugging
  }
};

const getCountStatus = async () => {
  const response = await axios.get(`/api/getCountStatus?userId=${userId}`)
  console.log('a')
  serviceable_count.value = response.data.serviceable_count // Set the count if it exists
  unserviceable_count.value = Number(response.data.unserviceable_count) // Set the count if it exists
}

const getOutdatedEquipment = async () => {
  const response = await axios.get(`/api/getOutdatedEquipment?userId=${userId}`)
  outdated_count.value = Number(response.data.count) // Set the count if it exists
}

// Fetch data when the component is mounted
onMounted(() => {
  fetchData();
  get_client_jo();
  get_assets();
  getCountStatus();
  getOutdatedEquipment();
});
</script>
