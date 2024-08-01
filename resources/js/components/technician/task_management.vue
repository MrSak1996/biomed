<template>
  <div>
    <Header />
    <Sidebar />
    <div id="content" class="content">
      <ol class="breadcrumb pull-right">
        <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
        <li class="breadcrumb-item active">Task Management</li>
      </ol>
      <h1 class="page-header">Task Management</h1>
      <div class="row">
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
          <div class="widget widget-stats bg-red">
            <div class="stats-icon"><i class="fa fa-desktop"></i></div>
            <div class="stats-info">
              <h4>TOTAL CREATED</h4>
              <p>3,291,922</p>
            </div>
            <div class="stats-link">
              <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
          <div class="widget widget-stats bg-orange">
            <div class="stats-icon"><i class="fa fa-link"></i></div>
            <div class="stats-info">
              <h4>ONGOING</h4>
              <p>20.44%</p>
            </div>
            <div class="stats-link">
              <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
          <div class="widget widget-stats bg-custom">
            <div class="stats-icon"><i class="fa fa-users"></i></div>
            <div class="stats-info">
              <h4>FOR CHECKING</h4>
              <p>1,291,922</p>
            </div>
            <div class="stats-link">
              <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- end col-3 -->
        <!-- begin col-3 -->
        <div class="col-lg-3 col-md-6">
          <div class="widget widget-stats bg-green">
            <div class="stats-icon"><i class="fa fa-clock"></i></div>
            <div class="stats-info">
              <h4>DONE</h4>
              <p>00:12:23</p>
            </div>
            <div class="stats-link">
              <a href="javascript:;">View Detail <i class="fa fa-arrow-alt-circle-right"></i></a>
            </div>
          </div>
        </div>
        <!-- end col-3 -->
      </div>
      <div class="row">
        <div class="col-lg-3">
          <div class="panel panel-inverse" data-sortable-id="index-10">
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
              <h4 class="panel-title">Client Hospitals</h4>
            </div>
            <div class="panel-body" style="height: 970px">
              <div id="accordion" class="card-accordion">
                <!-- begin card -->
                <div class="card">
                  <div class="card-header bg-black text-white pointer-cursor collapsed" data-toggle="collapse"
                    data-target="#collapseOne" aria-expanded="false">
                    Collapsible Group Item #1
                  </div>
                  <div id="collapseOne" class="collapse" data-parent="#accordion" style="">
                    <div class="card-body">
                      <ul class="fa-ul">
                        <li style="display: block; margin-left: 3%">
                          <a class="program_activity"
                            href="base_planner_subtasks.html.php?event_planner_id=1000&amp;username=masacluti&amp;division=1"
                            style="color: black; font-weight: normal" onhover="changeColor(this)">
                            <span class="fa-li"><i class="fa fa-circle text-yellow"></i></span>
                            <div class="row ddd_list">
                              <div class="col-md-7" style="padding-bottom: 5px">
                                <div style="border-right: 1px solid #dbdbdb">
                                  Regional Training of Trainers on Barangay Development
                                  Planning
                                </div>
                              </div>
                              <div class="col-md-5">May 21 to 26, 2023</div>
                            </div>
                          </a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
                <!-- end card -->
                <!-- begin card -->
                <div class="card">
                  <div class="card-header bg-black text-white pointer-cursor collapsed" data-toggle="collapse"
                    data-target="#collapseTwo">
                    Collapsible Group Item #2
                  </div>
                  <div id="collapseTwo" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                      terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                      skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                      Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                      single-origin coffee nulla assumenda shoreditch et. Nihil anim
                      keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                      sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                      occaecat craft beer farm-to-table, raw denim aesthetic synth
                      nesciunt you probably haven't heard of them accusamus labore
                      sustainable VHS.
                    </div>
                  </div>
                </div>
                <!-- end card -->
                <!-- begin card -->
                <div class="card">
                  <div class="card-header bg-black text-white pointer-cursor collapsed" data-toggle="collapse"
                    data-target="#collapseThree">
                    Collapsible Group Item #3
                  </div>
                  <div id="collapseThree" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                      terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                      skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                      Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                      single-origin coffee nulla assumenda shoreditch et. Nihil anim
                      keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                      sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                      occaecat craft beer farm-to-table, raw denim aesthetic synth
                      nesciunt you probably haven't heard of them accusamus labore
                      sustainable VHS.
                    </div>
                  </div>
                </div>
                <!-- end card -->
                <!-- begin card -->
                <div class="card">
                  <div class="card-header bg-black text-white pointer-cursor collapsed" data-toggle="collapse"
                    data-target="#collapseFour">
                    Collapsible Group Item #4
                  </div>
                  <div id="collapseFour" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                      terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                      skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                      Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                      single-origin coffee nulla assumenda shoreditch et. Nihil anim
                      keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                      sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                      occaecat craft beer farm-to-table, raw denim aesthetic synth
                      nesciunt you probably haven't heard of them accusamus labore
                      sustainable VHS.
                    </div>
                  </div>
                </div>
                <!-- end card -->
                <!-- begin card -->
                <div class="card">
                  <div class="card-header bg-black text-white pointer-cursor collapsed" data-toggle="collapse"
                    data-target="#collapseFive">
                    Collapsible Group Item #5
                  </div>
                  <div id="collapseFive" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                      terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                      skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                      Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                      single-origin coffee nulla assumenda shoreditch et. Nihil anim
                      keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                      sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                      occaecat craft beer farm-to-table, raw denim aesthetic synth
                      nesciunt you probably haven't heard of them accusamus labore
                      sustainable VHS.
                    </div>
                  </div>
                </div>
                <!-- end card -->
                <!-- begin card -->
                <div class="card">
                  <div class="card-header bg-black text-white pointer-cursor collapsed" data-toggle="collapse"
                    data-target="#collapseSix">
                    Collapsible Group Item #6
                  </div>
                  <div id="collapseSix" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                      terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                      skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                      Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                      single-origin coffee nulla assumenda shoreditch et. Nihil anim
                      keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                      sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                      occaecat craft beer farm-to-table, raw denim aesthetic synth
                      nesciunt you probably haven't heard of them accusamus labore
                      sustainable VHS.
                    </div>
                  </div>
                </div>
                <!-- end card -->
                <!-- begin card -->
                <div class="card">
                  <div class="card-header bg-black text-white pointer-cursor collapsed" data-toggle="collapse"
                    data-target="#collapseSeven">
                    Collapsible Group Item #7
                  </div>
                  <div id="collapseSeven" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus
                      terry richardson ad squid. 3 wolf moon officia aute, non cupidatat
                      skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod.
                      Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid
                      single-origin coffee nulla assumenda shoreditch et. Nihil anim
                      keffiyeh helvetica, craft beer labore wes anderson cred nesciunt
                      sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings
                      occaecat craft beer farm-to-table, raw denim aesthetic synth
                      nesciunt you probably haven't heard of them accusamus labore
                      sustainable VHS.
                    </div>
                  </div>
                </div>
                <!-- end card -->
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-9">
          <div class="panel panel-inverse" data-sortable-id="index-10">
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
              <h4 class="panel-title">Calendar of Task and Activities</h4>
            </div>
            <div class="panel-body" style="height: 970px">
              <table class="table table-striped table-bordered" id="data-table-task">
                <thead>
                  <tr>
                    <th width="1%"></th>
                    <th width="1%" data-orderable="false">Control #</th>
                    <th class="text-nowrap">Activity Title</th>
                    <th class="text-nowrap">Client</th>
                    <th class="text-nowrap">Technician</th>
                    <th class="text-nowrap">Status</th>
                    <th class="text-nowrap">Date Started</th>
                    <th class="text-nowrap">Date Completed</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr v-for="(data, index) in tastMngData" :key="data.id" class="odd gradeX">
                    <td>{{ index }}</td>
                    <td>ORDER-2024-01-01</td>
                    <td width="1%" class="f-s-600 text-inverse">{{ data.title }}</td>
                    <td width="11%" class="with-img">{{ data.client_id }}</td>
                    <td>{{ data.technician_id }}</td>
                    <td>{{ data.status }}</td>
                    <td>{{ data.start_date }}</td>
                    <td>{{ data.completed_date }}</td>
                    <td>
                      <router-link :to="'/job-order-view/' + data.id" class="btn btn-success btn-icon btn-circle"><i
                          class="fa fa-eye"></i></router-link>

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
</template>
<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/sidebar.vue";

export default {
  name: 'JobOrder',
  components: {
    Header,
    Sidebar
  },
  setup() {
    const tastMngData = ref([]);

    // const exportJobOrder = (id) => {
    //     window.location.href = `./api/export_job_order/${id}?export=true`;
    // };

    const getTaskDataList = () => {
      const url = './api/get_taskdata_list';
      axios.get(url)
        .then(response => {
          tastMngData.value = response.data;
          console.log(tastMngData.value);
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    };

    onMounted(() => {
      getTaskDataList();
    });

    return {
      tastMngData,
      getTaskDataList
    };
  }
}
</script>

<style scoped></style>
