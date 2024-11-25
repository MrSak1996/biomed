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
      <statistics/>
        <div class="row">
          <div class="col-lg-4">
            <div class="panel panel-inverse" data-sortable-id="index-1">
              <div class="panel-heading">
                <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                      class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                      class="fa fa-redo"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                    data-click="panel-collapse"><i class="fa fa-minus"></i></a>
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
                      <th>Activity</th>
                      <th>Date Scheduled</th>
                      <th>Client</th>
                      <th>Scheduled By</th>
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
          <div class="col-lg-4">

            <div class="panel panel-inverse" data-sortable-id="index-1">
              <div class="panel-heading">
                <div class="panel-heading-btn">
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i
                      class="fa fa-expand"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i
                      class="fa fa-redo"></i></a>
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                    data-click="panel-collapse"><i class="fa fa-minus"></i></a>
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
                      <tr>

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
                  <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning"
                    data-click="panel-collapse"><i class="fa fa-minus"></i></a>
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
                  
                    <button class="btn btn-primary btn-xs">Add Asset</button>

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
                      <th>Position</th>
                      <th>Division</th>
                      <th>Type of Equipment</th>
                      <th>Year Acquired</th>
                      <th>Brand & Model</th>
                      <th>Remarks</th>
                      <th>Current Status</th>
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
    </div>
  </div>
</template>

<script>
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/client_sidebar.vue";
import statistics from "./statistics.vue";
import Statistics from "./statistics.vue";
export default {
  name: "Dashboard",
  components: {
    Header,
    Sidebar,
    statistics

  },
};
</script>