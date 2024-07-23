<template>
    <div>
        <Header />
        <Sidebar />
        <div id="content" class="content">
            <ol class="breadcrumb pull-right">
                <li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
                <li class="breadcrumb-item active">Create Job Order</li>
            </ol>
            <h1 class="page-header">Job Order: Create</h1>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-inverse" data-sortable-id="index-10">
                        <div class="panel-heading">

                            <h4 class="panel-title">JOB ORDER FORM</h4>
                        </div>
                        <div class="panel-body">
                            <form @submit.prevent="form_update()">
                                <div class="row">
                                   
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Control No.</label>
                                            <input type="text" class="form-control" readonly :value="data.control_no">

                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Request Date</label>
                                            <input type="text" class="form-control" readonly
                                                :value="formatDate(data.request_date)">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12"></div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12"></div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Start Date</label>
                                            <input type="text" class="form-control" readonly :value="formatDate(data.start_date)">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Completed Date</label>
                                            <input type="text" class="form-control" readonly
                                               :value="formatDate(data.completed_date)">
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Particulars</label>
                                            <textarea class="form-control" style="height: 236px;resize: none;" readonly
                                               :value="data.particulars"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Prepared By</label>
                                            <input type="text" class="form-control" readonly :value="data.request_by">
                                        </div>
                                    </div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12"></div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12"></div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12"></div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12"></div>
                                    <div class="col-lg-2 col-md-6 col-sm-12 col-xs-12">
                                        <div class="mb-3">
                                            <label class="form-label">Received By</label>
                                            <input type="text" class="form-control" readonly :value="data.received_by">
                                        </div>
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
<script>
import { start } from "@popperjs/core";
import Header from "../../components/layout/header.vue";
import Sidebar from "../../components/layout/sidebar.vue";
export default {
    name: 'Job Order',
    data() {
        return {
            data: {
                control_no: '',
                request_date: '',
                start_date: '',
                completed_date: '',
                particulars: '',
                request_by: '',
                received_by: ''
            }


        }
    },
    components: {
        Header,
        Sidebar
    },
    created() {
        this.get_job_order_data();
    },
    methods: {
        get_job_order_data() {
            let id = this.$route.params.id;
            const url = `../api/get_job_order_list/${id}`;
            axios.get(url)
                .then(response => {
                    if (response.data.data && response.data.data.length > 0) {
                        this.data = response.data.data[0];
                    } else {
                        console.error('No data found for the given ID');
                    }
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        },
        formatDate(date) {
            if (!date || date === '0000-00-00') {
                return null; // Return null if the date is null or '0000-00-00'
            } else {
                const formattedDate = new Date(date).toLocaleString('en-US', {
                    year: 'numeric',
                    month: 'long',
                    day: 'numeric',

                });
                return formattedDate;
            }
        },
    }
}
</script>