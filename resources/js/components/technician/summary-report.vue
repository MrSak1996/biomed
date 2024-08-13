<template>
    <div>
        <Header />
        <Sidebar />
        <div id="content" class="content">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item">Services</li>
                <li class="breadcrumb-item active">Summary Report</li>
            </ol>
            <h1 class="page-header">Summary Report</h1>
            <div class="row">
                <div class="col-lg-12">
                    <div
                        class="panel panel-inverse"
                        data-sortable-id="index-10"
                    >
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a
                                    href="javascript:;"
                                    class="btn btn-xs btn-icon btn-circle btn-default"
                                    data-click="panel-expand"
                                    ><i class="fa fa-expand"></i
                                ></a>
                                <a
                                    href="javascript:;"
                                    class="btn btn-xs btn-icon btn-circle btn-success"
                                    data-click="panel-reload"
                                    ><i class="fa fa-redo"></i
                                ></a>
                                <a
                                    href="javascript:;"
                                    class="btn btn-xs btn-icon btn-circle btn-warning"
                                    data-click="panel-collapse"
                                    ><i class="fa fa-minus"></i
                                ></a>
                                <a
                                    href="javascript:;"
                                    class="btn btn-xs btn-icon btn-circle btn-danger"
                                    data-click="panel-remove"
                                    ><i class="fa fa-times"></i
                                ></a>
                            </div>
                            <h4 class="panel-title">
                                <font-awesome-icon
                                    :icon="['fas', 'circle-info']"
                                    class="fort-icon fa-lg"
                                ></font-awesome-icon>
                                Information
                            </h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-lg-12">
                                <table
                                    class="table table-striped table-bordered"
                                >
                                    <thead>
                                        <tr>
                                            <th>No. of Items</th>
                                            <th>Department</th>
                                            <th>Equipment</th>
                                            <th>Brand</th>
                                            <th>Model</th>
                                            <th>Serial No.</th>
                                            <th>Control No.</th>
                                            <th>Remarks</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
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
import { ref } from "vue";

import Multiselect from "vue-multiselect";
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/sidebar.vue";
import { FontAwesomeIcon } from "@fortawesome/vue-fontawesome";
import { library } from "@fortawesome/fontawesome-svg-core";
import { faCircleInfo, faQuestion } from "@fortawesome/free-solid-svg-icons";

library.add(faCircleInfo, faQuestion);

export default {
    name: "Summary report",
    components: {
        Header,
        Sidebar,
        FontAwesomeIcon,
        Multiselect,
    },
};
</script>
